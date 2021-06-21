<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
//Route::get('/user',function (){
//    return \App\Models\User::all();
//});
//Route::prefix('/protect')->group(function (){
//    Route::get('/',[ProductController::class,'index'])->name('index');
//    Route::get('/{id}',[ProductController::class,'show'])->name('show');
//    Route::post('/',[ProductController::class,'store1'])->name('store');
//    Route::put('/{id}',[ProductController::class,'update1'])->name('update');
//    Route::delete('/{id}',[ProductController::class,'destroy'])->name('delete');
//});
