<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\GaleryConroller;
use App\Http\Controllers\Admin\PartnersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Front\MainController;
use App\Http\Controllers\LocalizationController;




Route::get('/lang/{locale}',function($locale) {
    Session::put('locale',$locale);
    return redirect()->back();
});

    Route::get('/',[MainController::class,'index'])->name('main.index');
    Route::get('contuct-us/',[MainController::class,'contuctUs'])->name('contuctUs');






Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('Back.slider.list');
})->name('dashboard');



Route::group(["middleware" => ["auth"], "prefix" => "admin"], function() {

    Route::resource('slider',SliderController::class);
    Route::resource('product',ProductController::class);
    Route::resource('partner',PartnersController::class);
    Route::resource('contact',ContactController::class);
    Route::resource('galery',GaleryConroller::class);
   });

