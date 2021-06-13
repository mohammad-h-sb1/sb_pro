<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SoldProduct;
use Illuminate\Http\Request;

class SoldProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SoldProducts=SoldProduct::all();
        return response()->json($SoldProducts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $SoldProduct=[
            'product_id'=>$request->product_id,
            'Number_sold'=>$request->Number_sold,
        ];
        return response()->json($SoldProduct);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SoldProduct  $soldProduct
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $SoldProduct=SoldProduct::query()->find($id);
        return response()->json($SoldProduct);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SoldProduct  $soldProduct
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $SoldProduct=SoldProduct::query()->find($id);
        return response()->json($SoldProduct);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SoldProduct  $soldProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $SoldProduct=SoldProduct::query()->find($id)
        ->update([
            'product_id'=>$request->product_id,
            'Number_sold'=>$request->Number_sold,
        ]);
        return response()->json($SoldProduct);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SoldProduct  $soldProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $soldProduct=SoldProduct::query()->find($id)
            ->delete();
        return response()->json($soldProduct);
    }
}
