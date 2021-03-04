<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//IMPORT CONTROLLER
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\API\LabelController;
use App\Http\Controllers\API\SearchController;



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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// ROUTES

// PROJECT RESOURCES
// Route::apiResource('projects', ProjectController::class)->middleware('auth:api');

Route::apiResource('projects', ProjectController::class);
Route::apiResource('tasks', TaskController::class);
Route::apiResource('labels', LabelController::class);

// SEARCH
Route::get("tasks/search/{description}", [SearchController::class, 'search']);
