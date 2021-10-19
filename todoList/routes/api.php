<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthContoller;

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


Route::post('/login', [AuthContoller::class, 'login']);


Route::get('/tasks', [TasksController::class, 'index']);
Route::prefix('/task')->group(function () {
    Route::post('/store', [TasksController::class, 'store']);
    Route::put('/{id}', [TasksController::class, 'update']);
    Route::put('/{id}', [TasksController::class, 'updateContentTask']);
    Route::delete('/{id}', [TasksController::class, 'destroy']);
    Route::get('tasks/{user_id}', [TasksController::class, 'tasksById']);
});

Route::get('/users', [UserController::class, 'index']);
Route::prefix('/user')->group(function () {
    Route::post('/store', [UserController::class, 'store']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});
