<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashBoardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\USerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;





Route::get('/', [dashBoardController::class, 'index'])->name('home');

Route::resource('/product',ProductController::class)->except('store','update');

Route::post('product/store',[ProductController::class,'store'])->name('product.store');

Route::post('update/{product}/product', [ProductController::class, 'update'])->name('product.update');

Route::post('product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');




Route::get('/login',[AuthController::class,'login'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout')->middleware('auth');

Route::get('/register', [AuthController::class,'register'])->name('register');

Route::post('/login', [AuthController::class, 'loginAuth'])->name('user.login');









Route::resource('user',USerController::class)->except('store')->middleware('auth');

Route::post('user/stor',[USerController::class,'store'])->name('user.store');