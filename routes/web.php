<?php

use App\Http\Controllers\GreetingController;
use App\Http\Controllers\WelcomeController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function() {
    // 1. Using raw SQL queries
    // $users = DB::select('SELECT * FROM users');
    // dd($users);

    // 2. Query builder
    // $users = DB::table('users')->select(['name', 'email'])->whereNotNull('email')->orderBy('name')->get();
    // dd($users);

    // 3. Eloquent ORM
    $students = Student::select(['name', 'email'])->whereNotNull('email')->orderBy('name')->get();
    // dd($students);
    /* foreach($students as $student) {
        echo $student->name."<br>";
    } */

    $student = new Student();
    $student->id = 3;
    $student->name = "Jane";
    $student->email = "jane@example.com";
    $student->save();
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/hello', [GreetingController::class, 'index']);