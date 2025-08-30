<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotesController;

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


//dashboard route:
Route::view('/dashboard', './dashboard/dashboard');
Route::view('/dashboard/teams', './dashboard/teams');


//notes route:
Route::post('createtask', [NotesController::class, 'createTask']);

