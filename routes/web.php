<?php

use App\Http\Controllers\GreetingController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function() {
    // 1. Using raw SQL queries
    // $users = DB::select('SELECT * FROM users');
    // dd($users);

    // 2. Query builder
    $users = DB::table('users')->select(['name', 'email'])->whereNotNull('email')->orderBy('name')->get();
    dd($users);
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/hello', [GreetingController::class, 'index']);