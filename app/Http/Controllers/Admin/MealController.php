<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MealsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\MealFormRequest;
use App\Models\Meal;
use App\Models\Restaurant;
use App\Models\Tag;
use App\Upload\Upload;
use Illuminate\Http\Request;
use File;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MealsDataTable $dataTable, Restaurant $restaurant)
    {
        return $dataTable->with('restaurant', $restaurant)->render('admin.meals.index', ['restaurant' => $restaurant]);
    }

    public function indexTwo(Restaurant $restaurant)
    {
        return view('admin.meals.indextwo', ['restaurant' => $restaurant, 'meals' => Meal::whereRestaurantId($restaurant->id)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Restaurant $restaurant)
    {
        return view('admin.meals.add', ['restaurant' => $restaurant, 'restaurants' => Restaurant::all(), 'tags' => Tag::whereParentId(null)->whereRestaurantId($restaurant->id)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Restaurant $restaurant, MealFormRequest $request)
    {
        $request->merge(['image' =>  Upload::uploadImage($request->main_image, 'meals' , $request->name)]);

        $meal = $restaurant->meals()->create($request->only('tag_id','name','description','price'));

        $meal->media()->create(['default' => 1, 'media' => $request->image, 'type' => 'image']);

        for ($i=0; $i < count($request->features['name']); $i++) {
            $meal->features()->create(['name' => $request->features['name'][$i], 'value' => $request->features['value'][$i]]);
        }

        for ($i=0; $i < count($request->ingredients['name']); $i++) {
            $meal->ingredients()->create(['name' => $request->ingredients['name'][$i], 'image' => Upload::uploadImage($request->ingredients['main_image'][$i], 'ingredients' , $request->ingredients['name'][$i])]);
        }

        for ($i=0; $i < count($request->sizes['name']); $i++) {
            $meal->sizes()->create(['abbreviation' => $request->sizes['abbreviation'][$i],'name' => $request->sizes['name'][$i], 'price' => $request->sizes['price'][$i]]);
        }

        for ($i=0; $i < count($request->options['name']); $i++) {
            $meal->options()->create(['name' => $request->options['name'][$i], 'image' => Upload::uploadImage($request->options['main_image'][$i], 'options' , $request->options['name'][$i]), 'price' => $request->options['price'][$i]]);
        }

        for ($i=0; $i < count($request->drinks['name']); $i++) {
            $meal->drinks()->create(['name' => $request->drinks['name'][$i], 'image' => Upload::uploadImage($request->drinks['main_image'][$i], 'drinks' , $request->drinks['name'][$i]), 'price' => $request->drinks['price'][$i]]);
        }

        for ($i=0; $i < count($request->sides['name']); $i++) {
            $meal->sides()->create(['name' => $request->sides['name'][$i], 'image' => Upload::uploadImage($request->sides['main_image'][$i], 'sides' , $request->sides['name'][$i]), 'price' => $request->sides['price'][$i]]);
        }

        toastr()->success('Meal Added Successfully');

        return redirect()->route('meals.index', $restaurant->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant, Meal $meal)
    {
        return view('admin.meals.show', ['restaurant' => $restaurant, 'meal' => $meal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant, Meal $meal)
    {
        // Get Current Tag Then SubTag
        $subTag = Tag::where('id', $meal->tag_id)->first();
        $subTag == null ? $tag = null : $tag = Tag::where('id', $subTag->parent_id)->first()->id;
        $theTag = $tag;
        $theSubTag = $subTag;

        return view('admin.meals.edit', ['restaurant' => $restaurant, 'meal' => $meal, 'restaurants' => Restaurant::all(), 'tags' => Tag::whereParentId(null)->whereRestaurantId($restaurant->id)->get(),'theTag' => $theTag, 'theSubTag' => $theSubTag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant , Meal $meal)
    {
        //dd($request->all());

        if ($request->has('image')) {
            $request->merge(['image' =>  Upload::uploadImage($request->main_image, 'meals' , $request->name)]);
        }

        $meal->update($request->only('restaurant_id','tag_id','name','description','price'));

        // Delete All Features First
        $meal->features()->delete();

        // remove null values if user didn't insert any value in the last two inputs
        $request->features = array_filter(array_map('array_filter', $request->features));

        // Then Insert All The Features According To The Request Passed
        for ($i=0; $i < count($request->features['name']); $i++) {
            $meal->features()->create(['name' => $request->features['name'][$i], 'value' => $request->features['value'][$i]]);
        }

        // Get From Old Requests Only Meal Images
        $meal_images = $meal->ingredients()->pluck('image')->toArray();

        // Delete All Ingredients First
        $meal->ingredients()->delete();

        // remove null value if user didn't insert any value in the last two inputs
        $request->ingredients = array_filter(array_map('array_filter', $request->ingredients));

        // Then Insert All The Ingredients According To The Request Passed
        // Note :- Check If Image Request Exists First
        for ($i=0; $i < count($request->ingredients['name']); $i++) {
            if (!empty($request->ingredients['main_image'][$i])) {
                $ingredientRequests = ['name' => $request->ingredients['name'][$i], 'image' => Upload::uploadImage($request->ingredients['main_image'][$i], 'ingredients' , $request->ingredients['name'][$i])];
            }else {
                $ingredientRequests = ['name' => $request->ingredients['name'][$i], 'image' => array_search($request->ingredients['name'][$i], $meal_images)];
            }
            $meal->ingredients()->create($ingredientRequests);
        }

        // Delete All Sizes First
        $meal->sizes()->delete();

        // remove null value if user didn't insert any value in the last two inputs
        $request->sizes = array_filter(array_map('array_filter', $request->sizes));

        // Then Insert All The Sizes According To The Request Passed
        for ($i=0; $i < count($request->sizes['name']); $i++) {
            $meal->sizes()->create(['abbreviation' => $request->sizes['abbreviation'][$i], 'name' => $request->sizes['name'][$i], 'price' => $request->sizes['price'][$i]]);
        }

        // Get From Old Requests Only Option Images
        $option_images = $meal->options()->pluck('image')->toArray();

        // Delete All Options First
        $meal->options()->delete();

        // remove null value if user didn't insert any value in the last two inputs
        $request->options = array_filter(array_map('array_filter', $request->options));

        // Then Insert All The Options According To The Request Passed
        for ($i=0; $i < count($request->options['name']); $i++) {
            if (!empty($request->options['main_image'][$i])) {
                $optionRequests = ['name' => $request->options['name'][$i], 'image' => Upload::uploadImage($request->options['main_image'][$i], 'options' , $request->options['name'][$i]), 'price' => $request->options['price'][$i]];
            }else {
                $optionRequests = ['name' => $request->options['name'][$i], 'image' => array_search($request->options['name'][$i], $option_images), 'price' => $request->options['price'][$i]];
            }
            $meal->options()->create($optionRequests);
        }


        // Get From Old Requests Only Drink Images
        $drink_images = $meal->drinks()->pluck('image')->toArray();

        // Delete All Drinks First
        $meal->drinks()->delete();

        // remove null value if user didn't insert any value in the last two inputs
        $request->drinks = array_filter(array_map('array_filter', $request->drinks));

        // Then Insert All The Drinks According To The Request Passed
        for ($i=0; $i < count($request->drinks['name']); $i++) {
            if (!empty($request->options['main_image'][$i])) {
                $drinkRequests = ['name' => $request->drinks['name'][$i], 'image' => Upload::uploadImage($request->drinks['main_image'][$i], 'drinks' , $request->drinks['name'][$i]), 'price' => $request->drinks['price'][$i]];
            }else {
                $drinkRequests = ['name' => $request->drinks['name'][$i], 'image' => array_search($request->drinks['name'][$i], $drink_images), 'price' => $request->drinks['price'][$i]];
            }
            $meal->drinks()->create($drinkRequests);
        }

        // Get From Old Requests Only Side Images
        $side_images = $meal->sides()->pluck('image')->toArray();

        // Delete All Sides First
        $meal->sides()->delete();

        // remove null value if user didn't insert any value in the last two inputs
        $request->sides = array_filter(array_map('array_filter', $request->sides));

        // Then Insert All The Sides According To The Request Passed
        for ($i=0; $i < count($request->sides['name']); $i++) {
            if (!empty($request->sides['main_image'][$i])) {
                $sideRequests = ['name' => $request->sides['name'][$i], 'image' => Upload::uploadImage($request->sides['main_image'][$i], 'sides' , $request->sides['name'][$i]), 'price' => $request->sides['price'][$i]];
            }else {
                $sideRequests = ['name' => $request->sides['name'][$i], 'image' => array_search($request->sides['name'][$i], $side_images), 'price' => $request->sides['price'][$i]];
            }
            $meal->sides()->create($sideRequests);
        }

        toastr()->success('Meal Updated Successfully');

        return redirect()->route('meals.index', $restaurant->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant, Meal $meal)
    {
        toastr()->success('Meal Deleted Successfully');

        $meal->delete();

        return redirect()->route('meals.indextwo', $restaurant->id)->with('status', 'Meal Deleted Successfully');
    }

    public function upload(Restaurant $restaurant, Meal $meal)
    {
        return view('admin.meals.upload', ['restaurant' => $restaurant, 'meal' => $meal]);
    }

    public function uploadMedia(Request $request, Restaurant $restaurant, Meal $meal)
    {
        $imageName = Upload::uploadImage($request->file, 'meals' , $meal->name.'_'.rand(0,9999));

        $meal->media()->create(['default' => 0, 'media' => $imageName, 'type' => 'image']);

        return response()->json(['success'=>$imageName]);
    }

    public function getMedia(Restaurant $restaurant, Meal $meal)
    {
        $mealMediaFiles = [];

        $i = 0;
        foreach($meal->media()->get() as $media){
            $mediaSize = File::size($media->public_meal_path);
            $mealMediaFile[$i]['name'] = $media->media;
            $mealMediaFile[$i]['size'] = $this->bytesToHuman($mediaSize);
            $i++;
        }

        return $mealMediaFile;
    }

    private static function bytesToHuman($bytes)
    {
        $units = ['B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    public function list($id)
    {
        return Meal::whereRestaurantId($id)->get();
    }
}
