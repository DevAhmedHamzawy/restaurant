<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Categories Retrieved Successfully', 'status' => 200, 'data' => CategoryResource::collection(Category::all())], 200);
    }
}
