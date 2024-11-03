<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        return response()->json(['message' => 'Tags Retrieved Successfully', 'status' => 200, 'data' => $tag->subTags], 200);
    }
}
