<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function imdex()
    {
        $user_id=auth()->user()->id;
        $shop=Shop::query()->where('id',$user_id)->get();
        return response()->json($shop);
    }

    public function show($id)
    {
        $shop=Shop::query()->findOrFail($id);
        return response()->json($shop);
    }

    public function store(Request $request)
    {
        $shop=[
            'user_id'=>auth()->user()->id,
            'central_shops_id'=>$request->central_shops_id,
            'name'=>$request->name,
            'address'=>$request->address,
            'phone'=>$request->phone
        ];
        return response()->json($shop);
    }

    public function edit($id)
    {
        $shop=Shop::query()->findOrFail($id);
        return response()->json($shop);
    }

    public function update(Request $request,$id)
    {
        $shop=Shop::query()->where('id',$id)
            ->update([
                'user_id'=>auth()->user()->id,
                'central_shops_id'=>$request->central_shops_id,
                'name'=>$request->name,
                'address'=>$request->address,
                'phone'=>$request->name,
            ]);
        return response()->json($shop);
    }

    public function delete($id)
    {
        $shop=Shop::query()->where('id',$id)->delete();
        return response()->json($shop);
    }

    public function status($id)
    {
        $status=Shop::query()->find($id);
        $status->update([
                'status'=> !$status->status ,
            ]
        );
        return response()->json($status);
    }
}
