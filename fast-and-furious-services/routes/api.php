<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RaitingController;

use App\Http\Controllers\ServiceRaitingController;
use App\Http\Controllers\MechanicRaitingController;
use App\Http\Controllers\UserRaitingCOntroller;

use App\Http\Resources\MechanicResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\RaitingResource;

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

Route::resource('users', UserController::class); //radi
Route::get('/users/{id}/raiting', [UserRaitingCOntroller::class, 'index']); //radi


//Mechanic rute

Route::resource('mechanics', MechanicController::class); //radi
Route::get('/mechanics/{id}/raiting', [MechanicRaitingController::class, 'index']); //radi

//Services rute

Route::resource('services', ServiceController::class); //radi
Route::get('/services/{id}/raiting', [ServiceRaitingController::class, 'index']); //radi

//Raitings rute

Route::resource('raitings', RaitingController::class); //radi
