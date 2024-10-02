<?php

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(PictureController::class)->group(function() {
    Route::post('/pictures', 'search');
    Route::get('/pictures/{id}', 'show')->middleware('App\Http\Middleware\React');
    Route::post('/pictures/store', 'store')->middleware('App\Http\Middleware\React');
    Route::get('/pictures/{id}/checkLike', 'checkLike')->middleware('App\Http\Middleware\React');
    Route::get('/pictures/{id}/handleLike', 'handleLike')->middleware('App\Http\Middleware\React');

});

Route::controller(AuthenticationController::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});


Route::get('/user/{id}', [UserController::class, 'getUserDetails'])->middleware('App\Http\Middleware\React');
