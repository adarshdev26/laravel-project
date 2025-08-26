<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::get('/users', [UserController::class, 'allUsers']);
Route::view('register','register');
Route::post('adduser', [UserController::class,'adduser']);
Route::delete('/users/{id}', [UserController::class, 'deleteUser'])->name('users.delete');