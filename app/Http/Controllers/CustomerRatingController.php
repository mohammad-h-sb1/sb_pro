<?php

namespace App\Http\Controllers;

use App\Models\Customer_Rating;
use Illuminate\Http\Request;

class CustomerRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerRating=Customer_Rating::all();
        return response()->json($customerRating);
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
        $customer_Rating=[
          'user_id'=>$request->user_id,
          'ratings'=>$request->ratings,
        ];
        Customer_Rating::create($customer_Rating);

        return response()->json($customer_Rating);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer_Rating  $customer_Rating
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer_Rating=Customer_Rating::query()->findOrFail($id);
        return response()->json($customer_Rating);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer_Rating  $customer_Rating
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer_Rating=Customer_Rating::query()->findOrFail($id);
        return response()->json($customer_Rating);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer_Rating  $customer_Rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer_Rating=Customer_Rating::query()->where('id',$id)
            ->update([
                'ratings'=>$request->ratings
            ]);
        return response()->json($customer_Rating);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer_Rating  $customer_Rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer_Rating $customer_Rating,$id)
    {
        $customer_Rating->where('id',$id);
        $customer_Rating->delete();
        return response()->json($customer_Rating);
    }
}
