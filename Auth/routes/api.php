<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(UserController::class)->group(function(){
    Route::post('register' , 'Register');
    Route::post('login' , 'Login');
    Route::post('logout' , 'Logout')->middleware('auth:sanctum');
    Route::get('user/{user}' , 'show');
    Route::get('allusers' , 'getAllUsers');
    Route::patch('updateuser/{id}' , 'update');
});
