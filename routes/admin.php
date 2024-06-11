<?php

use App\Http\Controllers\Dashboard\AdminCartController;
use App\Http\Controllers\Dashboard\AdminProductController;
use App\Http\Controllers\Dashboard\AdminUserController;
use App\Http\Controllers\Dashboard\CategoryContoller;
use App\Http\Controllers\Dashboard\ProductDetailsController;
use Illuminate\Support\Facades\Route;



Route::resource('category', CategoryContoller::class)->middleware('admin:supervisor,admin');
Route::resource('product', AdminProductController::class)->middleware('admin:supervisor,admin');
Route::get('cart', [AdminCartController::class, 'index'])->name('cart.index');
Route::get('cart/{id}', [AdminCartController::class, 'show'])->name('cart.show');
Route::put('cart/{id}/changeState', [AdminCartController::class, 'changeState'])->name('cart.changeState');

//
Route::controller(ProductDetailsController::class)->group(function () {
    Route::post('product/addCategory', 'addCategory')->name('addCategory');
    Route::post('product/{id}/addOption', 'addOption')->name('addOption');
    Route::post('product/{id}/addSize', 'addSize')->name('addSize');
    Route::post('product/addColor', 'addColor')->name('addColor');
    Route::post('product/makeMainColor', 'makeMainColor')->name('makeMainColor');
    Route::post('product/addDiscount', 'addDiscount')->name('addDiscount');
    Route::post('product/addImages', 'addImages')->name('addImages');
});

//
Route::controller(AdminUserController::class)->group(function () {
    Route::get('user', 'index')->name('user.index')->middleware('admin:supervisor');
    Route::get('user/{id}', 'show')->name('user.show')->middleware('admin:supervisor');
    Route::post('user/{id}/makeAdmin', 'makeAdmin')->name('makeAdmin');
    Route::post('user/{id}/changeRole', 'changeRole')->name('changeRole');
});