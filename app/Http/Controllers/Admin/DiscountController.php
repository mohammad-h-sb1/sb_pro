<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $product=Product::all();
       $product->Discount()->rate;
       return response()->json($product);
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

        $discounts=[
            'user_id'=>auth()->user()->id,
            'protect_id'=>$request->discounts,
            'rate'=>$request->rate,
        ];

        return response()->json($discounts);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discounts=Discount::query()->findOrFail($id);
        return response()->json($discounts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discounts=Discount::query()->findOrFail($id);
        return response()->json($discounts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $discounts=Discount::query()->findOrFail($id)
            ->update([
                'product_id'=>$request->protect_id,
                'rate'=>$request->rate,
            ]);
        return response()->json($discounts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discounts=Discount::query()->find($id)->delete();
        return response()->json($discounts);
    }
}
