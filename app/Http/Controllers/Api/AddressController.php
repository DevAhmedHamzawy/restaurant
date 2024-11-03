<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Validator;

class AddressController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Addresses Retrieved successfully', 'status' => 200, 'data' => Address::all()], 200);
    }

    public function defaultAddress()
    {
        return response()->json(['message' => 'Default Address Retrieved successfully', 'status' => 200, 'data' => Address::whereDefault(1)->first()], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contact_title' => 'required',
            'telephone' => 'required|min:11|max:11',
            'address' => 'required',
            'default' => 'required|between:0,1'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'something wrong please try again', 'status' => 401 ,'errors' => $validator->errors()], 401);
        }

        return auth()->user()->addresses()->create($request->all()) ? response()->json(['message' => 'Address Created successfully', 'status' => 200], 200) : response()->json(['message' => 'something went wrong', 'status' => 401], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        return $address->delete() ? response()->json(['message' => 'Address Deleted successfully', 'status' => 200], 200) : response()->json(['message' => 'something went wrong', 'status' => 401], 401);
    }
}
