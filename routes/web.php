<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


Route::get('/', [ProductController::class, 'index']);

Route::get('CRUD/product/create', [ProductController::class, 'create'])->middleware('auth');

Route::post('CRUD/product/store', [ProductController::class, 'store'])->middleware('auth');

Route::get('CRUD/product/{id}/edit', [ProductController::class, 'edit'])->middleware('auth');

Route::put('CRUD/product/{id}', [ProductController::class, 'update'])->middleware('auth');

Route::delete('product/{id}', [ProductController::class, 'destroy'])->middleware('auth');

Route::get('CRUD/product/{id}/show', [ProductController::class, 'show']);

Route::get('CRUD/users/register', [UserController::class, 'create'])->middleware('guest');

Route::post('/register', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('CRUD/users/login', [UserController::class, 'login'])->name('login')->middleware(middleware: 'guest');

Route::post('/login', [UserController::class, 'authenticate']);

Route::get('/CRUD/users/profile', [UserController::class, 'profile']);


