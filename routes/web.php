<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'getHome'])->name('getHome');

Route::get('/create-task', [TaskController::class, 'getCreateTaskPage'])->name("getCreateTaskPage");
Route::post('/create-task/create', [TaskController::class, 'createTask'])->name("createTask");
