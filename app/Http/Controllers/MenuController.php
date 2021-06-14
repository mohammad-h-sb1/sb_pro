<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu=Menu::all();
        return response()->json($menu);
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
        if (auth()->user()->role === 'admin') {
            $menu = [
                'header' => $request->header,
                'footer' => $request->footer,
            ];
            return response()->json($menu);
        }
        else{
           return abort(404,'شما دسترسی ندارید');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu=Menu::query()->find($id);
        return response()->json($menu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu=Menu::query()->find($id);
        return response()->json($menu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu=Menu::query()->where('id',$id)
            ->update([
                'heather'=>$request->header,
                'footer'=>$request->footer,
            ]);
        return response()->json($menu);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->role === 'admin') {
            $menu = Menu::query()->where('id', $id)
                ->delete();
            return response()->json($menu);
        }
        else{
            return  abort(404,'شما دسترسیندارید');
        }
    }
}
