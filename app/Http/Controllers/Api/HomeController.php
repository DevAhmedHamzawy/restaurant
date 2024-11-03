<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\MealResource;
use App\Http\Resources\OfferResource;
use App\Http\Resources\RestaurantResource;
use App\Models\Category;
use App\Models\Meal;
use App\Models\Offer;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        // Get Nearest Restaurants
        $nearestRestaurants = Restaurant::select("restaurants.id","restaurants.name","restaurants.address","restaurants.description","restaurants.image","restaurants.cover","restaurants.delivery_time","restaurants.delivery_fees"
        ,DB::raw("6371 * acos(cos(radians(" . request()->header('lat') . "))
        * cos(radians(restaurants.lat))
        * cos(radians(restaurants.lng) - radians(" . request()->header('lng') . "))
        + sin(radians(" . request()->header('lat') . "))
        * sin(radians(restaurants.lat))) AS distance"))
        ->groupBy("restaurants.id","restaurants.lat","restaurants.lng","restaurants.name","restaurants.address","restaurants.description","restaurants.image","restaurants.cover","restaurants.delivery_time","restaurants.delivery_fees")
        ->OrderBy('distance')
        ->get();


        return response()->json(['message' => 'Data Retrieved Successfully',
                                'status' => 200,
                                'data' => [
                                    'offers' => OfferResource::collection(Offer::all()),
                                    'categories' => CategoryResource::collection(Category::all()),
                                    'popular_restaurants' => RestaurantResource::collection(Restaurant::withAvg('reviews', 'rating')->orderByDesc('reviews_avg_rating')->get()),
                                    'recommended_meals' => MealResource::collection(Meal::withAvg('reviews', 'rating')->orderByDesc('reviews_avg_rating')->get()),
                                    'fast_delivery' => RestaurantResource::collection(Restaurant::orderBy('delivery_time')->get()),
                                    'restaurants_near_by_you' => RestaurantResource::collection($nearestRestaurants),
                                    'reservations' => null
                                ]
                                ], 200);
    }
}
