<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    public function index(Category $category)
    {
        return response()->json(['message' => 'Restaurants Retrieved Successfully', 'status' => 200, 'data' => RestaurantResource::collection(Restaurant::whereCategoryId($category->id)->get())], 200);
    }

    public function show(Restaurant $restaurant)
    {
        $restaurant = Restaurant::whereId($restaurant->id)->with(['tags','reviews','weekHours'])->first();

        return response()->json(['message' => 'Restaurant Retrieved Successfully', 'status' => 200, 'data' => new RestaurantResource($restaurant)], 200);
    }

    public function popularRestaurants()
    {
        return response()->json(['message' => 'Popular Restaurants Retrieved Successfully', 'data' => RestaurantResource::collection(Restaurant::withAvg('reviews', 'rating')->orderByDesc('reviews_avg_rating')->get())]);
    }

    public function fastDelivery()
    {
        return response()->json(['message' => 'Fast Delivery Retrieved Successfully', 'data' => RestaurantResource::collection(Restaurant::orderBy('delivery_time')->get())]);
    }

    public function nearestRestaurants()
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

        return response()->json(['message' => 'Nearest Restaurants Retrieved Successfully', 'data' => RestaurantResource::collection($nearestRestaurants)]);

    }

    public function addToFavorite(Restaurant $restaurant)
    {
        if ($restaurant->favorites()->whereUserId(auth()->user()->id)->exists()) {
            $restaurant->favorites()->whereUserId(auth()->user()->id)->delete();
            return response()->json(['message' => 'Favorite Deleted Successfully'], 200);
        } else {
            $restaurant->favorites()->whereUserId(auth()->user()->id)->create(['user_id' => auth()->user()->id]);
            return response()->json(['message' => 'Favorite Added Successfully'], 200);
        }

    }
}
