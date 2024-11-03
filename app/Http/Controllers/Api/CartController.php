<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public $totalCart;

    public function index()
    {
        if(auth()->user()->cart()->get()->isEmpty()) { return response()->json(['message' => 'cart is empty', 'status' => 200]);  }

        $this->totalCart = $this->calculateTotal();

        return response()->json([
            'message' => 'Cart Retrieved Successfully',
            'status' => 200,
            'data' => [
                'cart' => CartResource::collection(auth()->user()->cart()->get()) ,
                'sub_total' => $this->totalCart['subTotal'].' EGP',
                'delivery_fees' => $this->totalCart['deliveryFees'].' EGP',
                'total' => $this->totalCart['total'].' EGP',
                ]
            ]);
    }

    public function store(Request $request)
    {
        return auth()->user()->cart()->create($request->all()) ? response()->json(['message' => 'Meal Stored Successfully', 'status' => 200]) : response()->json(['message' => 'something wrong please try again' , 'status' => 401], 401);
    }

    public function updateQty(Request $request)
    {
        return auth()->user()->cart()->whereId($request->cart_id)->update(['qty' => $request->qty]) ? response()->json(['message' => 'item updated Successfully', 'status' => 200]) : response()->json(['message' => 'something wrong please try again' , 'status' => 401], 401);
    }

    public function destroy(Cart $cart)
    {
        return $cart->delete() ? response()->json(['message' => 'item deleted Successfully', 'status' => 200]) : response()->json(['message' => 'something wrong please try again' , 'status' => 401], 401);
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
