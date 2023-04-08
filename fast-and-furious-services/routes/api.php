<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MechanicController;
use App\Http\Resources\MechanicResource;
use App\Http\Resources\UserResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Users rute

Route::resource('users', UserController::class);

//Mechanic rute

//Route::get('/mechanics', [MechanicController::class,'index']);

//Route::get('/mechanics/{id}', [MechanicController::class,'show']);

Route::resource('mechanics', MechanicController::class);
