<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Influencer;
use Illuminate\Http\Request;

class InfluencerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $influencer=Influencer::all();
        return response()->json($influencer);
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
        $code=auth()->user()->name.'abcdefgijklmnopqrstuyz12345678';
        $code_rand=substr(str_shuffle($code),0,8);
        $influencer=[
            'user_id'=>auth()->user()->id,
            'name'=>$request->name,
            'code'=>$code_rand,
            'discount_rate'=>$request->discount_rate,
        ];
        Influencer::create($influencer);
        return response()->json($influencer);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Influencer  $influencer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $influencer=Influencer::query()->findOrFail($id);
        return response()->json($influencer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Influencer  $influencer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $influencer=Influencer::query()->findOrFail($id);
        return response()->json($influencer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Influencer  $influencer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $code=auth()->user()->name.'abcdefgijklmnopqrstuyz12345678';
        $code_rand=substr(str_shuffle($code),0,8);
        $influencer=Influencer::query()->where('id',$id)->
            update([
                'user_id'=>auth()->user()->id,
                'name'=>$request->name,
                'code'=>$code_rand,
                'discount_rate'=>$request->discount_rate,
        ]);
        return response()->json($influencer);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Influencer  $influencer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Influencer $influencer)
    {
        $influencer->delete();
        return response()->json($influencer);
    }
}
