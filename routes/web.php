<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AkunController;

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


Route::middleware('auth')->group(function (){
    Route::get('input-produk',[ProdukController::class,'index']);
    Route::post('kirim-produk',[ProdukController::class,'input']);
    Route::get('tampil-produk',[ProdukController::class,'tampil']);
    Route::get('delete-produk/{id}',[ProdukController::class,'delete']);
    Route::get('edit-produk/{id}',[ProdukController::class,'edit']);
    Route::post('update-produk/{id}',[ProdukController::class,'update']);

    Route::get('input-customer',[CustomerController::class,'index']);
    Route::post('kirim-customer',[CustomerController::class,'input']);
    Route::get('tampil-customer',[CustomerController::class,'tampil']);
    Route::get('delete-customer/{ktp}',[CustomerController::class,'delete']);
    Route::get('edit-customer/{ktp}',[CustomerController::class,'edit']);
    Route::post('update-customer/{ktp}',[CustomerController::class,'update']);

    Route::get('input-order',[OrderController::class,'index']);
    Route::get('tampil-order',[OrderController::class,'tampil']);
    Route::get('delete-order/{id}',[OrderController::class,'delete']);
    Route::post('kirim-order',[OrderController::class,'input']);
    Route::get('edit-order/{id}',[OrderController::class,'edit']);
    Route::post('update-order/{id}',[OrderController::class,'update']);

    Route::get('dashboard',[DashboardController::class,'index']);
    Route::get('setting',[AkunController::class,'index']);
    Route::post('update-password',[AkunController::class,'update']);
    Route::post('delete',[AkunController::class,'delete']);

    Route::post('logout',[LoginController::class,'logout']);

});

Route::middleware('guest')->group(function (){
    Route::get('register',[RegisterController::class,'index']);
    Route::post('registrasi-user',[RegisterController::class,'register']);

    Route::get('/',[LoginController::class,'index'])->name('login');
    Route::post('login',[LoginController::class,'authenticate']);
});
