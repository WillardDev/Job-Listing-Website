<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\JobController;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::resource('jobs', JobController::class);


// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);