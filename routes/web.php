<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::get('/users', [UserController::class, 'allUsers']);
Route::view('register','register');

//add new users
Route::post('adduser', [UserController::class,'adduser']);
//delete users
Route::delete('/users/{id}', [UserController::class, 'deleteUser'])->name('users.delete');


//login route
Route::view('/login', 'login');
Route::post('loginuser', [UserController::class, 'loginUser']);

