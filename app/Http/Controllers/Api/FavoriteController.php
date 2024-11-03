<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MealResource;
use App\Http\Resources\RestaurantResource;
use App\Models\Meal;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index($sort)
    {
        if($sort == 'meal')
        {
            $mealFavorites = auth()->user()->mealFavorites()->get();

            return MealResource::collection($mealFavorites);

        }else
        {
            $restaurantFavorites = auth()->user()->restaurantFavorites()->get();

            return RestaurantResource::collection($restaurantFavorites);
        }
    }
}
