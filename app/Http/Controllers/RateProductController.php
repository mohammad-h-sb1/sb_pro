<?php

namespace App\Http\Controllers;

use App\Models\RateProduct;
use Illuminate\Http\Request;

class RateProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $rateProducts=RateProduct::all();
        return response()->json($rateProducts);
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
        $rateProducts=[
            'user_id'=>auth()->user()->id,
            'product_id'=>$request->product_id,
            'material_quality'=>$request->material_quality,
            'sewingـquality'=>$request->sewingـquality,
            'clothـdesign'=>$request->clothـdesign,
            'clothing'=>$request->clothing,
            'worth_buying'=>$request->worth_buying
        ];
        return response()->json($rateProducts);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RateProduct  $rateProduct
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rateProducts=RateProduct::query()->find($id);
        return response()->json($rateProducts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RateProduct  $rateProduct
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rateProducts=RateProduct::query()->find($id);
        return response()->json($rateProducts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RateProduct  $rateProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rateProducts=RateProduct::query()->where('id',$id)
            ->update([
                'product_id'=>$request->product_id,
                'material_quality'=>$request->material_quality,
                'sewingـquality'=>$request->sewingـquality,
                'clothـdesign'=>$request->clothـdesign,
                'clothing'=>$request->clothing,
                'worth_buying'=>$request->worth_buying
            ]);
        return response()->json($rateProducts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RateProduct  $rateProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(RateProduct $rateProduct,$id)
    {
        $rateProducts=RateProduct::query()->where('id',$id)
            ->delete();
        return response()->json($rateProducts);
    }
}
