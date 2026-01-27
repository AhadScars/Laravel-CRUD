<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [ProductController::class,'index']);

Route::get('product/create', [ProductController::class,'create']);

Route::post('product/store', [ProductController::class,'store']);

Route::get('product/{id}/edit', [ProductController::class,'edit']);

Route::put('product/{id}', [ProductController::class,'update']);

Route::delete('product/{id}', [ProductController::class,'destroy']);

Route::get('product/{id}/show', [ProductController::class,'show']);

Route::get('/product/users/register',[UserController::class,'create']);

Route::post('/register',[UserController::class,'store']);

Route::post('/logout',[UserController::class,'logout']);

Route::get('/product/users/login',[UserController::class,'login']);

Route::post('/login',[UserController::class,'authenticate']);

Route::get('/product/users/profile',[UserController::class,'profile']);



