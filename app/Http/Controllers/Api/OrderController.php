<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Cart;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public $totalCart;

    public function index()
    {
        return response()->json(['message' => 'Orders Reservations Retrieved Successfully', 'orders' => OrderResource::collection(auth()->user()->orders()->get())]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOrderHistory($sort)
    {
        if($sort == 1)
        {
            return response()->json(['message' => 'Upcoming Orders Retrieved Successfully', 'status' => 200, 'orders' => OrderResource::collection(auth()->user()->orders()->whereStatusId(1)->get())], 200);
        }else if($sort == 2){

            return response()->json(['message' => 'History Orders Retrieved Successfully', 'status' => 200, 'orders' => OrderResource::collection(auth()->user()->orders()->whereStatusId(5)->get())], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->totalCart = $this->calculateTotal();

        $cart = auth()->user()->cart()->get();

        $order = auth()->user()->orders()->create(['user_id' => auth()->user()->id, 'sub_total' => $this->totalCart['subTotal'], 'delivery_fees' => $this->totalCart['deliveryFees'] , 'total' => $this->totalCart['total'],  'status_id' => 1]);

        foreach ($cart as $item) {
            $order->items()->create(['meal_id' => $item->meal->id, 'size_id' => $item->size->id, 'options' => $item->options, 'drinks' => $item->drinks, 'sides' => $item->sides, 'qty' => $item->qty, 'price' => $item->meal->price, 'total_price' => $item->meal->price*$item->qty]);
        }

        auth()->user()->cart()->delete();

        return response()->json(['message' => 'order Added Successfully', 'status' => 200], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order = $order->with('driver','status','user')->first();

        return response()->json(['message' => 'order retrieved Successfully', 'status' => 200, 'data' => new OrderResource($order)], 200);
    }

    public function assignToDriver(Request $request, Order $order)
    {
        $order->update(['driver_id' => $request->driver_id]);

        return response()->json(['message' => 'order Assigned To Driver Successfully', 'status' => 200, 'data' => $order], 200);
    }

    public function getOrderDeliveryTime(Request $request, Order $order)
    {
        $getDistanceAndTimeBetweenTwoPoints = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins='.auth()->user()->addresses()->whereDefault(1)->first()->lat.','.auth()->user()->addresses()->whereDefault(1)->first()->lat.'&destinations='.$request->driver_lat.','.$request->driver_lng.'&departure_time=now&key=AIzaSyA2obCxpDHFCwyBJe7z5EyrBTgdI1vm8RE';

        //  Initiate curl
        $ch = curl_init();
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL,$getDistanceAndTimeBetweenTwoPoints);
        // Execute
        $result =json_decode(curl_exec($ch) , true);

        $delivery_time = $result['rows']['0']['elements']['0']['duration_in_traffic']['text'];

        return response()->json(['message' => 'order Delivery Time Retrieved Successfully', 'status' => 200, 'data' => $delivery_time], 200);
    }


    public function calculateTotal()
    {
        $cart = auth()->user()->cart()->get();

        $subTotals = [];
        $deliveryFees = [];

        foreach ($cart as $cartItem) {
            // Get Price
            $price = $cartItem->meal->price;

            // Get Price Size
            $size_price = $cartItem->size->price;

            // Get prices Options
            if ($cartItem->options != NULL) {
                $option_prices = collect(Cart::getOptions($cartItem->options))->sum('price');
            }else {
                $option_prices = 0;
            }

            // Get prices drinks
            if ($cartItem->drinks != NULL) {
                $drink_prices = collect(Cart::getDrinks($cartItem->drinks))->sum('price');
            }else {
                $drink_prices = 0;
            }

            // Get prices sides
            if ($cartItem->sides != NULL) {
                $side_prices = collect(Cart::getSides($cartItem->sides))->sum('price');
            } else {
                $side_prices = 0;
            }

            // Get Total Meal Price From "Meal Price , Options, Drinks, Sides"
            $total_meal_price = $price + $size_price + $option_prices + $drink_prices + $side_prices;

            // push into cart Subtotals
            array_push($subTotals, $total_meal_price);

            // push delivery fees Item
            array_push($deliveryFees, $cartItem->meal->restaurant->delivery_fees);
        }

        $subTotal = array_sum($subTotals);
        $deliveryFees = $deliveryFees[0];
        $total = $subTotal + $deliveryFees;

        return ['subTotal' => $subTotal, 'deliveryFees' => $deliveryFees, 'total' => $total];
    }
}
