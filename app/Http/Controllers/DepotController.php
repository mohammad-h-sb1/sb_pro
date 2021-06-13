<?php

namespace App\Http\Controllers;

use App\Models\Depot;
use App\Models\Product;
use Illuminate\Http\Request;

class DepotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depot=Depot::all();
        return response()->json($depot);
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
        $depot=[
            'product'=>$request->product,
            'number'=>$request->number
        ];
        return response()->json($depot);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Depot  $depot
     * @return \Illuminate\Http\Response
     */
    public function show(Depot $depot,$id)
    {
        $protect=Product::query()->find($id);
        return response()->json($protect);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Depot  $depot
     * @return \Illuminate\Http\Response
     */
    public function edit(Depot $depot,$id)
    {
        $protect=Product::query()->find($id);
        return response()->json($protect);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Depot  $depot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $depot=Depot::query()->where('product_id',$id)
            ->update(
                [
                    'number'=>$request->number
                ]
            );
        return response()->json($depot);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Depot  $depot
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $depot=Depot::query()->where('product_id',$id)
            ->delete();
        return response()->json($depot);
    }
}
