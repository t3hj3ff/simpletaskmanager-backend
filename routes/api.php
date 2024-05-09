<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\AuthController;

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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// POST ROUTE FOR REGISTERING A USER
Route::post('register', [AuthController::class, 'register']);
// POST ROUTE FOR LOGGING IN A USER
Route::post('login', [AuthController::class, 'login']);

//AUTH PROTECTED ROUTE FOR CREATE, READ, UPDATE, DELETE TASKS
Route::middleware('auth:api')->group(function () {
    Route::apiResource('tasks', TaskController::class);
});




