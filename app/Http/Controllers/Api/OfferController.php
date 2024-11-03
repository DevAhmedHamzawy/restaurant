<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OfferResource;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Offers Retrieved Successfully', 'status' => 200, 'data' => OfferResource::collection(Offer::all())], 200);
    }
}
