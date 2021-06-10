<?php

namespace App\Http\Controllers;

use App\Http\Requests\protect\ProtectUpdate;
use App\Http\Requests\protect\ProtectStore;
use App\Models\Product;
use App\Models\Product_img;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProtectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag=Tag::query()->first();
       $product=Product::query()->first();
       $product->tags()->attach($tag);

       return response()->json($product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product=Product::all();
        return response()->json($product);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProtectStore $request, Product $product)
    {
//        $file=$protect_img->file('photo');
//        $file_name=$file->getClientOriginalName();
//        $file->storeAs('imag/protect/',$file_name,'public_img');
        $post=[
            'user_id'=>auth()->user()->id,
            'category-id'=>$request->category_id,
            'name'=>$request->name,
            'content'=>$request->content,
            'money'=>$request->money,
            'banner'=>$product->protect_imges()->img,
        ];
        Product::create($post);
        return response()->json($post);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::query()->find($id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        $product->find($id);
         return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProtectUpdate $request,$id)
    {
        $product=Product::query()->where('id',$id)
            ->update([
                'name'=>$request->name,
                'category_id'=>$request->input('category_id'),
                'user_id'=>auth()->user()->id,
                'content'=>$request->body,
                'money'=>$request->money,
            ]);

        return response()->json($product);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $product->where('id',$id);
        $product->delete();
        return  response()->json($product);
    }
}
