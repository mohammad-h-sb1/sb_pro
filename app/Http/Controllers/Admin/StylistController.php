<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Stylist;
use Illuminate\Http\Request;

class StylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $stylist=Stylist::query()->where('product_id',$id)->get();
        return response()->json($stylist);
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
        $stylist=[
          'user_id'=>auth()->user()->id,
          'product_id'=>$id,
          'name'=>$request->name,
          'content'=>$request->content,
        ];
        return  response()->json($stylist);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stylist  $stylist
     * @return \Illuminate\Http\Response
     */
    public function show(Stylist $stylist ,$id)
    {
        $stylist=Stylist::query()->where('product_id',$id)->get();
        return response()->json($stylist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stylist  $stylist
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stylist=Stylist::query()->findOrFail($id);
        return response()->json($stylist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stylist  $stylist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $product=Product::query()->where('id',$id);
        $stylist=[
            'user_id'=>auth()->user()->id,
            'name'=>$request->name,
            'content'=>$request->content,
        ];
        Stylist::query()->where('id',$id)->update($stylist);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stylist  $stylist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stylist=Stylist::query()->where('id',$id)->delete();
        return response()->json($stylist);
    }
}
