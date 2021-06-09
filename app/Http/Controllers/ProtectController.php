<?php

namespace App\Http\Controllers;

use App\Models\Protect;
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
       $protect=Protect::all();

       return response()->json($protect);
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
        $file=$request->file('photo');
        $file_name=$file->storeAs();

        $post=[
            'user_id'=>auth()->user()->id,
            'category-id'=>$request->category_id,
            'name'=>$request->name,
//            'content'=>$request->content,
            'mony'=>$request->moby
        ];
        $post=response()->json($post);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Protect  $protect
     * @return \Illuminate\Http\Response
     */
    public function show(Protect $protect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Protect  $protect
     * @return \Illuminate\Http\Response
     */
    public function edit(Protect $protect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Protect  $protect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Protect $protect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Protect  $protect
     * @return \Illuminate\Http\Response
     */
    public function destroy(Protect $protect)
    {
        //
    }
}
