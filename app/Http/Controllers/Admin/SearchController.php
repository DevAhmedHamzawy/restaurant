<?php

namespace App\Http\Controllers\Admin;

use App\Filters\BestRatingFilter;
use App\Filters\MostFavoriteFilter;
use App\Filters\MostMealsFilter;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getFilters()
    {
        $restaurants = Restaurant::filter($this->filters())->withAvg('reviews','rating')->withCount('favorites')->withCount('meals')->get();

        $html = view('admin.restaurants.partials.indextwo.restaurants', compact('restaurants'))->render();

        return response()->json(compact('html'));

    }

    protected function filters()
    {
        return [
            'best_rating' => new BestRatingFilter,
            'most_favorites' => new MostFavoriteFilter,
            'most_meals' => new MostMealsFilter,
        ];
    }
}
