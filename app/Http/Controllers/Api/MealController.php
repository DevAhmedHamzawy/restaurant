<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MealResource;
use App\Http\Resources\OfferResource;
use App\Models\Category;
use App\Models\Meal;
use App\Models\Offer;
use App\Models\Restaurant;
use App\Models\Tag;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function index(Restaurant $restaurant, Tag $subTag)
    {
        return response()->json(['message' => 'Meals Retrieved Successfully', 'status' => 200, 'data' => MealResource::collection(Meal::whereRestaurantId($restaurant->id)->where('tag_id', $subTag->id)->get())], 200);
    }

    public function show(Meal $meal)
    {
        return response()->json(['message' => 'Meal Retrieved Successfully', 'status' => 200, 'data' => new MealResource(Meal::whereId($meal->id)->with(['features','ingredients','sizes','options','drinks','sides'])->first())], 200);
    }

    public function popularMeals()
    {
        return response()->json(['message' => 'Popular Meals Retrieved Successfully', 'data' => MealResource::collection(Meal::withAvg('reviews', 'rating')->orderByDesc('reviews_avg_rating')->get())]);
    }

    public function recommended(Category $category)
    {
        $restaurants = Restaurant::whereCategoryId($category->id)->get();

        foreach ($restaurants as $restaurant) {
            $recommendedMealsByRestaurant = Meal::whereRestaurantId($restaurant->id)->withAvg('reviews', 'rating')->orderByDesc('reviews_avg_rating')->get();
        }

        return response()->json(['message' => 'Meals Retrieved Successfully', 'status' => 200, 'data' => MealResource::collection($recommendedMealsByRestaurant)], 200);
    }

    public function mealOffers(Category $category)
    {
        return response()->json(['message' => 'Offers Retrieved Successfully', 'status' => 200, 'data' =>
            OfferResource::collection(Offer::whereCategoryId($category->id)->get())
        ], 200);
    }

    public function addToFavorite(Meal $meal)
    {
        if ($meal->favorites()->whereUserId(auth()->user()->id)->exists()) {
            $meal->favorites()->whereUserId(auth()->user()->id)->delete();
            return response()->json(['message' => 'Favorite Deleted Successfully'], 200);
        } else {
            $meal->favorites()->whereUserId(auth()->user()->id)->create(['user_id' => auth()->user()->id]);
            return response()->json(['message' => 'Favorite Added Successfully'], 200);
        }

    }
}
