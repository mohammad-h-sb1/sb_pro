<?php

namespace App\Http\Controllers;

use App\Models\Customer_Rating;
use App\Models\CustomerClub;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $customerRating=Customer_Rating::all();
       return response()->json($customerRating,200);
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
        $customerRating=[];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerClub  $customerClub
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerClub $customerClub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerClub  $customerClub
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerClub $customerClub)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerClub  $customerClub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerClub $customerClub)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerClub  $customerClub
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerClub $customerClub)
    {
        //
    }
}
