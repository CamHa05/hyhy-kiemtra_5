<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController2;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
Route::get('/theloai/{id}', [App\Http\Controllers\MovieController::class, 'show']);
Route::get('/phim/{id}', [App\Http\Controllers\MovieController::class, 'info_movie']);
Route::post('/timkiem',[App\Http\Controllers\MovieController::class, 'search']);
Route::get('/movielist', [MovieController2::class, 'movieList'])->name('movielist');
Route::get('/moviecreate', [MovieController2::class, 'movieCreate'])->name('moviecreate');
Route::get('/moviedelete', [MovieController2::class, 'movieDelete'])->name('moviedelete');
Route::post('/moviedelete', [MovieController2::class, 'movieDelete'])->name('moviedelete');
Route::get('/moviesave', [MovieController2::class, 'movieSave'])->name('moviesave');
Route::post('/moviesave', [MovieController2::class, 'movieSave'])->name('moviesave');
