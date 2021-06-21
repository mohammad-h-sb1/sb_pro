<?php

namespace App\Http\Controllers;

use App\Http\Requests\category\CategoryStore;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return response()->json($categories);

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
    public function store(CategoryStore $request)
    {

        $file=$request->file('photo');
        $file_name=$file->getClientOriginalName();
        $file->storeAs('img/category',$file_name,'public_img');
        $category=[
            'user_id'=>auth()->user()->id,
            'name'=>$request->name,
            'img'=>$file,
            'content'=>$request->content,
        ];
        Category::create($category);
        return response()->json($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::query()->findOrFail($id);
        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
//        $category->finde($id);
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $category=Category::query()->where('id',$id)
            ->update([
                'name'=>$request->name,
                'content'=>$request->content,
                'user_id'=>auth()->user()->id,
                ]);

        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category,$id)
    {
          $category->where('id',$id);
          $category->delete();
          return response()->json($category);
    }
}
