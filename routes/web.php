<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;



Route::controller(TaskController::class)->group(function() {
    Route::get('/', 'getHome')->name('getHome');
    Route::get('/create-task', 'getCreateTaskPage')->name("getCreateTaskPage");
    Route::post('/create-task/create', 'createTask')->name("createTask");
    Route::get("/edit-task/{taskId}", 'getEditTaskPage')->name("getEditTaskPage");
    Route::post("/edit-task/{taskId}", 'editTask')->name("editTask");
    Route::post("/delete-task/{taskId}", 'deleteTask')->name("deleteTask");
});