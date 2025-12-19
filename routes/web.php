<?php

use App\Http\Controllers\GreetingController;
use App\Http\Controllers\WelcomeController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function() {
    // Get the student model where email is john@example.com
    $student = Student::where('email', 'john@example.com')->first();
    dd($student);

    // Update the 'status' column with the value 'active'
    $student->status = 'active';

    // Save the model
    $student->save();

    // Dump the result
    dd($student);
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/hello', [GreetingController::class, 'index']);