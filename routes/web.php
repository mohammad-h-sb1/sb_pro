<?php

use App\Http\Controllers\Admin\CategoryConteroller as AdminCategoryController;
use App\Http\Controllers\Admin\CentralShopController as AdminCentralShopController;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\ProductController as AdminProductController ;
use App\Http\Controllers\Admin\ShopController as AdminShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomerRatingController;
use App\Http\Controllers\DepotController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImgController;
use App\Http\Controllers\RateProductController;
use App\Http\Controllers\ReateController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SoldProductController;
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
    Route::prefix('product')->name('product.')->group(function (){
        Route::resource('product',ProductController::class)->except(['create','store','delete','update','edit']);
//        Route::get('/product/{product.search}',[SearchController::class,'show'])->name('show');
    });
    Route::prefix('productImg')->name('productImg.')->group(function (){
        Route::resource('productImag',ProductImgController::class);
    });
    Route::prefix('category')->name('category.')->group(function (){
        Route::resource('/category',CategoryController::class)->except(['create','store','delete','update','edit']);
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
             Route::middleware('roles')->prefix('status')->get('/status/{id}',[CommentController::class,'status']);
    });
    Route::middleware(['auth','roles'])->prefix('rank')->name('rank.')->group(function (){
        Route::resource('/rank',ReateController::class);
    });
    Route::middleware(['auth','roles'])->prefix('like')->name('like.')->group(function (){
        Route::post('/like/{product:name}',[LikeController::class,'store']);
    });
    Route::middleware(['auth','roles'])->prefix('tag')->name('tag.')->group(function (){
        Route::resource('/tag',TagController::class);
    });
    Route::middleware(['auth','roles'])->prefix('rate_product')->name('rate_product.')->group(function (){
        Route::resource('/rate_product',RateProductController::class);
    });
    Route::middleware('auth')->prefix('CustomerRating')->name('CustomerRating.')->group(function (){
        Route::resource('/CustomerRating',CustomerRatingController::class);
    });
    Route::middleware('auth')->prefix('SoldProduct')->name('SoldProduct.')->group(function (){
        Route::resource('/SoldProduct',SoldProductController::class);
    });
    Route::middleware('auth')->prefix('cart')->name('cart.')->group(function (){
        Route::resource('/cart',CartController::class);
    });
    Route::middleware(['auth','roles'])->prefix('depot')->name('depot.')->group(function (){
        Route::resource('/depot',DepotController::class);
    });
    Route::middleware(['auth','roles'])->prefix('menu')->name('menu.')->group(function (){
        Route::resource('/menu',MenuController::class);
    });
});


Route::name('admin.')->group(function (){
    Route::middleware(['auth','roles'])->prefix('date')->name('date.')->group(function (){
        Route::resource('/date',DataController::class);
    });
    Route::middleware('auth')->prefix('Discount')->name('Discount.')->group(function (){
        Route::resource('/Discount',DiscountController::class);
    });

    Route::middleware(['store_manager','auth'])->group(function (){
          Route::prefix('product')->name('product.')->group(function (){
              Route::get('/index',[AdminProductController::class,'index'])->name('index');
              Route::get('/show/{id}',[AdminProductController::class,'show'])->name('show');
              Route::post('/store',[AdminProductController::class,'store'])->name('store');
              Route::get('/edit/{id}',[AdminProductController::class,'edit'])->name('edit');
              Route::put('update/{id}',[AdminProductController::class,'update'])->name('update');
              Route::delete('delete/{id}',[AdminProductController::class,'delete'])->name('delete');
          });
          Route::prefix('category')->name('category.')->group(function (){
          Route::get('/index',[AdminCategoryController::class,'index'])->name('index');
          Route::get('/show/{id}',[AdminCategoryController::class,'show'])->name('show');
          Route::post('/store',[AdminCategoryController::class,'store'])->name('store');
          Route::post('/edit/{id}',[AdminCategoryController::class,'edit'])->name('edit');
          Route::put('/update/{id}',[AdminCategoryController::class,'update'])->name('update');
          Route::put('/delete/{id}',[AdminCategoryController::class,'delete'])->name('delete');
          });
    });
    Route::middleware('auth')->group(function (){
          Route::middleware('roles')->name('central_shop.')->group(function (){
              Route::get('/index',[AdminCentralShopController::class,'index'])->name('index');
              Route::get('/show/{id}',[AdminCentralShopController::class,'show'])->name('show');
              Route::post('/store',[AdminCentralShopController::class,'store'])->name('store');
              Route::get('/edit/{id}',[AdminCentralShopController::class,'edit'])->name('edit');
              Route::put('/update/{id}',[AdminCentralShopController::class,'update'])->name('update');
              Route::delete('/delete/{id}',[AdminCentralShopController::class,'delete'])->name('delete');
              Route::middleware('roles')->prefix('status')->get('/status/{id}',[AdminCentralShopController::class,'status']);
          });
          Route::middleware('store_manager')->name('shop.')->group(function (){
              Route::get('/index',[AdminShopController::class,'index'])->name('index');
              Route::get('/show/{id}',[AdminShopController::class,'show'])->name('show');
              Route::post('/store',[AdminShopController::class,'store'])->name('store');
              Route::get('/edit/{id}',[AdminShopController::class,'edit'])->name('edit');
              Route::put('/update/{id}',[AdminShopController::class,'update'])->name('update');
              Route::delete('/delete/{id}',[AdminShopController::class,'delete'])->name('delete');
              Route::middleware('roles')->prefix('status')->get('/status/{id}',[AdminShopController::class,'status']);

          });
    });
});

require __DIR__.'/auth.php';
