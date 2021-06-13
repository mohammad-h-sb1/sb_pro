<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_img;
use Illuminate\Http\Request;

class ProductImgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request,$id)
    {
        $file=$request->file('photo');
        $file_Name=$file->getClientOriginalName();
        $file->storeAs('images/photo',$file_Name,'public_photos');
        $product=Product::query()->find($id);
        $post_img=[
            'protect_id'=>$product->id,
            'img'=>$file,
        ];

        return response()->json($post_img);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product_img  $product_img
     * @return \Illuminate\Http\Response
     */
    public function show(Product_img $product_img)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product_img  $product_img
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::query()->find($id);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product_img  $product_img
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product_img $product_img,$id)
    {
        $file=$request->file('photo');
        $file_Name=$file->getClientOriginalName();
        $file->storeAs('images/photo',$file_Name,'public_photos');
        $product=Product::query()->find($id)
            ->update([
                'product'=>$request->id,
                'img'=>$file,
            ]);
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product_img  $product_img
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::query()->find($id)
            ->delete();
        return response()->json($product);
    }


    public function index1()
    {
        dd('dvfdfvdfvdfvdvf');
    }
}
