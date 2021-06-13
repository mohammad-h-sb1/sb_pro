<?php

namespace App\Http\Controllers;

use App\Http\Requests\product\ProductStore;
use App\Http\Requests\product\ProductUpdate;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Product_img;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tag::query()->first();
        $product = Product::query()->first();
//        $product->tags()->attach($tag);

        return response()->json($product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        return response()->json($product);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStore $request, Product $product)
    {
//        $file=$protect_img->file('photo');
//        $file_name=$file->getClientOriginalName();
//        $file->storeAs('imag/protect/',$file_name,'public_img');
        $post = [
            'user_id' => auth()->user()->id,
            'category-id' => $request->category_id,
            'name' => $request->name,
            'content' => $request->content,
            'money' => $request->money,
            'banner' => $product->protect_imges()->img,
        ];
        Product::create($post);
        return response()->json($post,204);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
//        $product = Product::query()->find($id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
//        $product->find($id);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdate $request, Product $product,$id)
    {
        $product = Product::query()->where('id', $id)
            ->update([
                'name' => $request->name,
                'category_id' => $request->input('category_id'),
                'user_id' => auth()->user()->id,
                'content' => $request->body,
                'money' => $request->money,
            ]);

        return response()->json($product);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $product=Product::query()->where('id', $id);
        $product->delete();
        return response()->json($product);
    }














    public function index1(Request $request)
    {
        $product = Product::all();
        $product =ProductResource::collection($product);
        return $product ;
    }
    public function show1(Request $request, $id)
    {
        $product=Product::query()->findOrFail($id);
        $product=new ProductResource($product);
        return response()->json($product);

    }
    public function store1(Request $request)
    {

        $date=$request->only(['category_id','name','content','money','banner']);
        $date['user_id']=1;
        $product=Product::create($date);
        return response()->json($product,201);
    }
    public function update1(Request $request,$id)
    {
        $product=Product::query()->findOrFail($id);
        $data=$request->only('category_id','name','content','banner','money');
        $product->update($data);
        return response()->json($product,202);
    }
    public function delete1(Request $request,$id)
    {
        $product=Product::query()->findOrFail($id);
        $product->delete();

        return response()->json($product,204);
    }
}
