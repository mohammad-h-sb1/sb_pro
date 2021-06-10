<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProtectController;
use App\Http\Controllers\ReateController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::name('front.')->group(function (){
    Route::prefix('protect')->name('protect.')->group(function (){
        Route::resource('/protect',ProtectController::class);
    });
    Route::prefix('category')->name('category.')->group(function (){
        Route::resource('/category',CategoryController::class);
    });
    Route::prefix('comment')->name('comment.')->group(function (){
        Route::resource('/comment',CommentController::class);
             Route::prefix('comment_Offers')->name('comment_Offers.')->group(function (){
             Route::get('/index',[CommentController::class,'commentOffersIndex'])->name('index');
             Route::get('/create',[CommentController::class,'commentOffersCreate'])->name('create');
             Route::post('/store',[CommentController::class,'commentOffersStore'])->name('store');
             Route::get('/show/{id}',[CommentController::class,'commentOffersShow'])->name('Show');
             Route::get('/edit/{id}',[CommentController::class,'commentOffersEdit'])->name('edit');
             Route::put('/update/{id}',[CommentController::class,'commentOffersUpdate'])->name('Update');
             Route::delete('/delete/{id}',[CommentController::class,'commentOffersDelete'])->name('Delete');
        });
    });
    Route::prefix('date')->name('date.')->group(function (){
        Route::resource('/date',DataController::class);
    });
    Route::prefix('rank')->name('rank.')->group(function (){
        Route::resource('/rank',ReateController::class);
    });
    Route::prefix('like')->name('like.')->group(function (){
        Route::post('/like/{protect:name}',[LikeController::class,'store']);
    });
    Route::prefix('tag')->name('tag.')->group(function (){
        Route::resource('/tag',TagController::class);
    });
    Route::prefix('Discount')->name('Discount.')->group(function (){
        Route::resource('/Discount',DiscountController::class);
    });
});


require __DIR__.'/auth.php';
