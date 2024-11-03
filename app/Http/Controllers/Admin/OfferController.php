<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OffersDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Meal;
use App\Models\Offer;
use App\Models\Restaurant;
use App\Upload\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OffersDataTable $dataTable)
    {
        return $dataTable->render('admin.offers.index');
    }

    public function indexTwo()
    {
        return view('admin.offers.indextwo', ['offers' => Offer::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.offers.add', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('main_image'))
        {
            $request->merge(['image' => Upload::uploadImage($request->main_image, 'offers' , $request->name)]);
        }

        $validator = Validator::make($request->all(), ['category_id' => 'required|numeric', 'restaurant_id' => 'required|numeric' , 'meal_id' => 'required|numeric' , 'name' => 'required', 'description' => 'required' , 'percentage' => 'required', 'main_image' => 'mimes:jpeg,jpg,png,gif|required|max:10000', 'color' => 'required']);

        if($validator->fails()){
            toastr()->error('Check Errors In Add Offer Form');

            return redirect()->back()->withErrors($validator);
        }

        Offer::create($request->except('main_image'));

        toastr()->success('Offer Added Successfully');

        return redirect()->route('offers.index')->with('status', 'Offer Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        // Get Current Meal Then Restaurant Then Category
        $theCategory = Category::find($offer->category_id);
        $theRestaurant = Restaurant::find($offer->restaurant_id);
        $theMeal = Meal::find($offer->meal_id);


        return view('admin.offers.edit', ['offer' => $offer, 'categories' => Category::all(), 'theCategory' => $theCategory, 'theRestaurant' => $theRestaurant, 'theMeal' => $theMeal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        if($request->has('main_image'))
        {
            $request->merge(['image' => Upload::uploadImage($request->main_image, 'offers' , $request->name)]);
        }

        $validator = Validator::make($request->all(), ['name' => 'required', 'description' => 'required' , 'percentage' => 'required','color' => 'required']);

        if($validator->fails()){
            toastr()->error('Check Errors In Edit Offer Form');

            return redirect()->back()->withErrors($validator);
        }

        $offer->update($request->except('main_image'));

        toastr()->success('Offer Updated Successfully');

        return redirect()->route('offers.index')->with('status', 'Offer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        toastr()->success('Offer Deleted Successfully');

        $offer->delete();

        return redirect()->route('offers.index')->with('status', 'Offer Deleted Successfully');
    }
}
