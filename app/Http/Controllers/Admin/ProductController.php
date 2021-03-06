<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $user_id=auth()->user()->id;
        $product=Product::query()->where('user_id',$user_id)->get();
        return response()->json($product,200);
    }

    public function show($id)
    {
        $user_id=auth()->user()->id;
        $product=Product::query()->where('user_id',$user_id)->findOrFail($id);
        return response()->json($product,200);
    }

    public function store(Request $request,Product $product)
    {
        $tag_id=Tag::query()->whereIn('name',$request->name)->get()->pluck('id')->toArray();
        $product=[
            'user_id'=>auth()->user()->id,
            'category_id'=>$request->category_id,
            'gender'=>$request->gender,
            'shop_id'=>$request->shop_id,
            'name'=>$request->name,
            'content'=>$request->content,
            'banner'=>$product->protect_imges()->img,
            'money'=>$request->money
        ];
        Product::create($product);
        $product->tags()->sync($tag_id);
        return response()->json($product,204);
//        $product->tags->sync([$tag]);
//        foreach ($product->tags as $tag){
//            $product->tag->attach($tag->protect);
//        }
    }

    public function edit($id)
    {
        $user_id=auth()->user()->id;
        $product=Product::query()->where('user_id',$user_id)->findOrFail($id);
        return response()->json($product);
    }

    public function update(Request $request,$id)
    {
        $protect=Product::query()->where('id',$id)
            ->update([
                'name' => $request->name,
                'category_id' => $request->input('category_id'),
                'user_id' => auth()->user()->id,
                'content' => $request->body,
                'money' => $request->money,
                'shop_id'=>$request->shop_id,
                'gender'=>$request->gender
            ]);
        return response()->json($protect);
    }

    public function delete($id)
    {
        $protect=Product::query()->where('id',$id)->delete();
        return response()->json($protect);

    }
}
