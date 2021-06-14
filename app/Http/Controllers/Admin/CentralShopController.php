<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CentralShop;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
class CentralShopController extends Controller
{
    public function index()
    {
        $user=auth()->user()->id;
        $centralShop=CentralShop::query()->where('user_id',$user)->get();
        return response()->json($centralShop);
    }

    public function show($id)
    {
        $centralShop=CentralShop::query()->findOrFail($id);
        return response()->json($centralShop);
    }

    public function store(Request $request)
    {
        $centralShop=[
            'user_id'=>auth()->user()->id,
            'name'=>$request->name,
            'central_address'=>$request->central_address,
            'central_phone'=>$request->central_phone
        ];
        return response()->json($centralShop);
    }

    public function edit($id)
    {
        $centralShop=CentralShop::query()->findOrFail($id);
        return response()->json($centralShop);
    }

    public function update(Request $request ,$id)
    {
        $centralShop=CentralShop::query()->where('id',$id)
            ->update([
                'user_id'=>auth()->user()->id,
                'central_address'=>$request->central_address,
                'central_phone'=>$request->central_phone
                ]
            );
        return response()->json($centralShop);
    }

    public function delete($id)
    {
        $centralShop=CentralShop::query()->where('id',$id)
            ->delete();
        return response()->json($centralShop);
    }

    public function status($id)
    {
        $status=CentralShop::query()->find($id);
        $status->update([
                'status'=> !$status->status ,
            ]
        );
        return response()->json($status);
    }
}
