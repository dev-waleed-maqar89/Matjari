<?php

use App\Http\Controllers\Dashboard\ProductDetailsController;
use App\Http\Controllers\Main\CartController;
use App\Http\Controllers\Main\CartProductController;
use App\Http\Controllers\Main\ProductController;
use App\Http\Controllers\Main\User;
use App\Http\Controllers\Main\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/product');
});
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->name('CreateUser')->middleware('guest');
Route::get('/login', [UserController::class, 'loginForm'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/user/{id}', [UserController::class, 'show'])->middleware('auth');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::put('/user/{id}/update', [UserController::class, 'update'])->name('User.Update')->middleware('auth');
Route::get('/forget-password', [UserController::class, 'forgetPasswordForm'])->name('forget.password.form');
Route::post('sendToken', [UserController::class, 'sendPasswordLink'])->name('sendPasswordLink');
Route::get('resetpassword/{token}', [UserController::class, 'resetPasswordForm'])->name('resetPasswordForm');
Route::post('resetpassword}', [UserController::class, 'resetPassword'])->name('resetpassword');

Route::get('product', [ProductController::class, 'index'])->name('product.index');
Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('cart', [CartController::class, 'index']);
Route::post('cart/store', [CartController::class, 'store'])->name('cart.store');
Route::get('cart/{id}', [CartController::class, 'show'])->name('cart.show');
Route::put('cart/{id}/approve', [CartController::class, 'approve'])->name('cart.approve');
Route::delete('cart/{id}/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('productCart/store', [CartProductController::class, 'store'])->name('cartProduct.store');
Route::put('cartProduct/{id}/update', [CartProductController::class, 'update'])->name('changeQuantity');
Route::delete('cartProduct/{id}/delete', [CartProductController::class, 'destroy'])->name('removeCartProduct');
Route::get('category/{id}', [ProductController::class, 'showCategory'])->name('category.show');