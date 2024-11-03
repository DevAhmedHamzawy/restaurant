<?php

namespace App\Http\Resources;

use App\Models\Cart;
use App\Models\Drink;
use App\Models\Option;
use App\Models\Side;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $array = [
            'id' => $this->id,
            'meal_name' => $this->meal->name,
            'meal_description' => $this->meal->description,
            'meal_image' => $this->meal->img_path,
            'size' => new SizeResource($this->size),
            'price' => $this->meal->price.' EGP',
            'qty' => $this->qty,
        ];

        // Get Price Size
        $size_price = $this->size->price;

        if($this->options != NULL) {
            // Get prices Options
            $option_prices = collect(Cart::getOptions($this->options))->sum('price');
            $array['options'] = OptionResource::collection($this->getOptions($this->options));
        }else {
            $option_prices = 0;
            $array['options'] = null;
        }

        if($this->drinks != NULL) {
            // Get prices drinks
            $drink_prices = collect(Cart::getDrinks($this->drinks))->sum('price');
            $array['drinks'] = DrinkResource::collection($this->getDrinks($this->drinks));
        }else {
            $drink_prices = 0;
            $array['drinks'] = null;
        }

        if($this->sides != NULL){
            // Get prices sides
            $side_prices = collect(Cart::getSides($this->sides))->sum('price');
            $array['sides'] = SideResource::collection($this->getSides($this->sides));
        }else {
            $side_prices = 0;
            $array['sides'] = null;
        }


        // Get Total Meal Price From "Meal Price , Options, Drinks, Sides"
        $total_meal_price = $this->meal->price + $size_price + $option_prices + $drink_prices + $side_prices;

        $array['total_price'] = $total_meal_price.' EGP';

        return $array;

    }
}
