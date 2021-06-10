<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Reate;
use Illuminate\Http\Request;

class ReateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rank=Reate::all();
        return response()->json($rank);
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
        $product=Product::all();
        $rank=[
          'user_id'=>auth()->user()->id,
          'product_id'=>$request->product_id,
           'rank'=>$request->rank,
        ];
        $rank->create();

        return response()->json($rank,$product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reate  $reate
     * @return \Illuminate\Http\Response
     */
    public function show(Reate $reate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reate  $reate
     * @return \Illuminate\Http\Response
     */
    public function edit(Reate $reate,$id)
    {
        $reate->find($id);
        return response()->json($reate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reate  $reate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $rank=Reate::query()->where('id',$id)
            ->update(
                [
                    'user_id'=>auth()->user()->id,
                    'product_id'=>$request->product_id,
                    'rank'=>$request->rank,
                ]
            );
        return response()->json($rank);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reate  $reate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reate $reate,$id)
    {
        $reate->where('id',$id);
        $reate->delete();
        return response()->json($reate);
    }
}
