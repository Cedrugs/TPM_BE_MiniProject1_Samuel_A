<?php

use App\Http\Controllers\AuthenticationAPIController;
use App\Http\Controllers\TaskAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/get-tasks', [TaskAPIController::class, 'getTasks'])->middleware('auth:sanctum');;
Route::post('/create-task', [TaskAPIController::class, 'createTask'])->middleware('auth:sanctum');;
Route::post('/edit-task/{taskId}', [TaskAPIController::class,'editTask'])->middleware('auth:sanctum');;
Route::post('/delete-task/{taskId}', [TaskAPIController::class,'deleteTask'])->middleware('auth:sanctum');;

Route::post('/register', [AuthenticationAPIController::class, 'register']);
Route::post('/login', [AuthenticationAPIController::class, 'login']);
Route::post('/logout', [AuthenticationAPIController::class, 'logout'])->middleware('auth:sanctum');