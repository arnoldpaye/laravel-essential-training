<?php

use App\Http\Controllers\GreetingController;
use App\Http\Controllers\WelcomeController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function() {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/hello', [GreetingController::class, 'index']);