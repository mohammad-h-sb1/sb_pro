<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date=Data::all();
        return response()->json($date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date=[
            'user_id'=>auth()->user()->id,
            'telegram'=>$request->telegram,
            'instagram'=>$request->instagram,
            'whatsapp'=>$request->whatsapp,
            'mobile'=>$request->mobile,
            'address'=>$request->address
        ];

        Data::create($date);
        return response()->json($date);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\data  $data
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Data::query()->findOrFail($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(data $data,$id)
    {
        $data->find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data=Data::query()->where('id',$id)->update([
            'telegram'=>$request->telegram,
            'instagram'=>$request->instagram,
            'whatsapp'=>$request->whatsapp,
            'mobile'=>$request->mobile,
            'address'=>$request->address,
        ]);

        return response()->json($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(data $data,$id)
    {
        $data->where('id',$id);
        $data->delete();
        return response()->json($data);
    }
}
