<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
Route::get('/theloai/{id}', [App\Http\Controllers\MovieController::class, 'show']);
Route::get('/phim/{id}', [App\Http\Controllers\MovieController::class, 'info_movie']);
Route::post('/timkiem',[App\Http\Controllers\MovieController::class, 'search']);