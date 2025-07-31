<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

Route::view('/', 'home');

//todo routes
Route::middleware(['auth'])->Group(function(){
    Route::resource('todos',TodoController::class);
});

Route::get('/signup',[RegisterController::class,'index']);
Route::post('/signup',[RegisterController::class,'store']);
Route::get('/login',[SessionController::class,'index']);
Route::post('/login',[SessionController::class,'store']);
Route::post('/logout',[SessionController::class,'destory']);
