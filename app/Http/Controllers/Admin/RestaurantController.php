<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RestaurantsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantFormRequest;
use App\Models\Category;
use App\Models\Day;
use App\Models\Meal;
use App\Models\Restaurant;
use App\Upload\Upload;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RestaurantsDataTable $dataTable)
    {
        return $dataTable->render('admin.restaurants.index');
    }

    public function indexTwo()
    {
        return view('admin.restaurants.indextwo', ['restaurants' => Restaurant::withAvg('reviews', 'rating')->withCount('favorites')->withCount('meals')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurants.add', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantFormRequest $request)
    {
        $latlngArray = explode(',' , $request->input('latlng'));

        $request->merge(['lat' => $latlngArray[0], 'lng' => $latlngArray[1], 'image' => Upload::uploadImage($request->main_image, 'restaurants' , $request->name), 'cover' => Upload::uploadImage($request->main_cover, 'restaurants' , $request->name.'-cover')]);

        $restaurant = Restaurant::create($request->except('latlng','weekhours','main_image','main_cover'));

        $days = Day::get()->pluck('id');
        for ($i=0; $i < count($request->weekhours['from']) ; $i++) {
            $restaurant->weekHours()->create(['day_id' => $days[$i], 'from' => $request->weekhours['from'][$i], 'to' => $request->weekhours['to'][$i]]);
        }

        toastr()->success('Restaurant Added Successfully');

        return redirect()->route('restaurants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {

        $bestMeal = Meal::whereRestaurantId($restaurant->id)->with(['reviews' => function($query) {
            $query->orderByDesc('rating');
        }])->first();

        $bestMeals = Meal::whereRestaurantId($restaurant->id)->with(['reviews' => function($query) {
            $query->orderByDesc('rating');
        }])->take(6)->get();

        $restaurant->bestMeal = $bestMeal;
        $restaurant->bestMeals = $bestMeals;

        return view('admin.restaurants.show', ['restaurant' => $restaurant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurants.edit', ['restaurant' => $restaurant, 'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantFormRequest $request, Restaurant $restaurant)
    {

        if ($request->latlng != null) {
            $latlngArray = explode(',' , $request->input('latlng'));

            $request->merge(['lat' => $latlngArray[0], 'lng' => $latlngArray[1]]);
        }

        if($request->has('main_image'))
        {
            $request->merge(['image' => Upload::uploadImage($request->main_image, 'restaurants' , $request->name)]);
        }

        if($request->has('main_cover'))
        {
            $request->merge(['cover' => Upload::uploadImage($request->main_cover, 'restaurants' , $request->name.'-cover')]);
        }

        $restaurant->update($request->except('latlng','weekhours','main_image','main_cover'));

        $days = Day::get()->pluck('id');
        $restaurant->weekHours()->delete();
        for ($i=0; $i < count($request->weekhours['from']) ; $i++) {
            $restaurant->weekHours()->create(['day_id' => $days[$i], 'from' => $request->weekhours['from'][$i], 'to' => $request->weekhours['to'][$i]]);
        }

        toastr()->success('Restaurant Edited Successfully');

        return redirect()->route('restaurants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        toastr()->success('Restaurant Deleted Successfully');

        return redirect()->route('restaurants.index');
    }

    public function list($id)
    {
        return Restaurant::whereCategoryId($id)->get();
    }
}
