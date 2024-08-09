<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('blogs', BlogController::class);
Route::get('/search', [BlogController::class, 'search'])->name('search');
Route::get('/blogs', [BlogController::class, 'indexsearch'])->name('blogs');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/blogs.index', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/home', [BlogController::class, 'home'])->name('home');
