<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $protect=Product::query()->where('title','like',"%{$request->search}%");

        return response()->json($protect);
    }
}
