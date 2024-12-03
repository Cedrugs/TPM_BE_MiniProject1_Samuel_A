<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;



Route::controller(TaskController::class)->group(function() {
    Route::get('/', 'getHome')->name('getHome');
    Route::get('/create-task', 'getCreateTaskPage')->name("getCreateTaskPage")->middleware('auth');
    Route::post('/create-task/create', 'createTask')->name("createTask")->middleware('auth');
    Route::get("/edit-task/{taskId}", 'getEditTaskPage')->name("getEditTaskPage")->middleware('auth');
    Route::post("/edit-task/{taskId}", 'editTask')->name("editTask")->middleware('auth');
    Route::post("/delete-task/{taskId}", 'deleteTask')->name("deleteTask")->middleware('auth');
});

Route::controller(AuthenticationController::class)->group(function() {
    Route::get("/register","getRegisterPage")->name("getRegisterPage");
    Route::post("/register", "register")->name("register");
    Route::get('/login', 'getLoginPage')->name('getLoginPage');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});