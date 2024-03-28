<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmrController;

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

Route::get('/emr',[EmrController::class, 'index']);
Route::get('/emr/{id}',[EmrController::class, 'show']);
Route::get('/emr',[EmrController::class, 'store']);
Route::get('/emr/{id}',[EmrController::class, 'update']);
Route::get('/emr/{id}',[EmrController::class, 'destroy']);