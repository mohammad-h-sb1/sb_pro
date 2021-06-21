<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryConteroller extends Controller
{
    public function index()
    {
        $user_id=auth()->user()->id;
        $product=Category::query()->where('user_id',$user_id)->get();
        return response()->json($product,200);
    }

    public function create()
    {

        return view('tmrin.category');
    }

    public function show($id)
    {
        $user_id=auth()->user()->id;
        $product=Category::query()->where('user_id',$user_id)->findOrFail($id);
        return response()->json($product,200);
    }

    public function store(Request $request)
    {

//        $file=$request->file('photo');
//        $file_name=$file->getClientOriginalName();
//        $file->storeAs('img/category',$file_name,'public_img');
        $category=[
            'user_id'=>auth()->user()->id,
            'name'=>$request->name,
            'img'=>$request->photo,
            'content'=>$request->content,
        ];
        Category::create($category);
        return response()->json($category);
    }

    public function edit($id)
    {
        $user_id=auth()->user()->id;
        $product=Category::query()->where('user_id',$user_id)->findOrFail($id);
        return response()->json($product);
    }

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

    public function delete($id)
    {
        $protect=Category::query()->where('id',$id)->delete();
        return response()->json($protect);
    }
}
