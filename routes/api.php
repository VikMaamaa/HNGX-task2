<?php

use App\Http\Controllers\PersonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Create a new person
Route::post('/', [PersonController::class, 'store']);

//Fetch details of a person
Route::get('/{id}', [PersonController::class, 'show']);

//Update details of an existing person
Route::put('/{id}', [PersonController::class, 'update']);

//Remove a person
Route::delete('/{id}', [PersonController::class, 'destroy']);
