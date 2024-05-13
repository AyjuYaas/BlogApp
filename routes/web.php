<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/login', [BlogController::class, 'login'])->name('login');
Route::get('/register', [BlogController::class, 'register'])->name('register');

Route::post('/login', [BlogController::class, 'handleLogin'])->name('login-check');
Route::post('/register', [BlogController::class, 'handleRegister'])->name('register-check');

Route::get('/blog', [BlogController::class, 'blog'])->name('blog');

Route::get('/create', [BlogController::class, 'create'])->name('create-blog');
Route::post('/create', [BlogController::class, 'store'])->name('store-blog');

Route::get('/iblog/{id}', [BlogController::class, 'iblog'])->name('ind-blog');

Route::get("/deleteblog/{id}", [BlogController::class, "deleteBlog"])->name("delete-blog");
Route::get("/editblog/{id}", [BlogController::class, "editBlog"])->name("edit-blog");
Route::post("/update/{id}", [BlogController::class, "updateBlog"])->name("update-blog");

Route::get('/logout', [BlogController::class, 'logout'])->name('logout');
