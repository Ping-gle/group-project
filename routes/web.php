<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ShopController;



Route::view('/main','layouts.main');
Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/search',[SearchController::class,'view'])->name('search-list');


Route::get('/product',[ProductController::class,'list'])->name('product-list');
Route::get('/product/create',[ProductController::class,'create']);
Route::post('/product/create',[ProductController::class,'createAdd'])->name('product-create-add');
Route::get('/product/{code}/update',[ProductController::class,'update'])->name('product-update');
Route::post('/product/{code}/update',[ProductController::class,'updateAdd'])->name('product-update-add');
Route::get('/product/{code}/delete',[ProductController::class,'delete'])->name('product-delete');
Route::get('/product/{code}',[ProductController::class,'show'])->name('product-show');



Route::get('/region',[RegionController::class,'list'])->name('regions-list');
Route::get('/region/create',[RegionController::class,'create']);
Route::post('/region/create',[RegionController::class,'createAdd'])->name('region-create-add');
Route::get('/region/{code}/update',[RegionController::class,'update'])->name('region-update');
Route::post('/region/{code}/update',[RegionController::class,'updateAdd'])->name('region-update-add');
Route::get('/region/{code}/delete',[RegionController::class,'delete'])->name('region-delete');
Route::get('/region/{code}',[RegionController::class,'show']);



Route::get('/shop',[ShopController::class,'list'])->name('shop-list');
Route::get('/shop/create',[ShopController::class,'create']);
Route::post('/shop/create',[ShopController::class,'createAdd'])->name('shop-create-add');
Route::get('/shop/{code}/update',[ShopController::class,'update'])->name('shop-update');
Route::post('/shop/{code}/update',[ShopController::class,'updateAdd'])->name('shop-update-add');
Route::get('/shop/{code}/delete',[ShopController::class,'delete'])->name('shop-delete');
Route::get('/shop/{code}',[ShopController::class,'show'])->name('shop-show');
Route::get('/shop/{code}/product',[ShopController::class,'showProduct'])->name('shop-show-product');


Route::get('/auth/signin',[SigninController::class,'view'])->name('login');
Route::post('/auth/login', [SigninController::class, 'authenticate'])->name('authenticate');
Route::get('/auth/logout', [SigninController::class, 'logout'])->name('logout');

Route::get('/signup',[SignupController::class,'view'])->name('signup-create-add');
Route::post('/signup/create',[SignupController::class,'createAdd'])->name('signup-create-add');





