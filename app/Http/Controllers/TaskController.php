<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function getCreateTaskPage() {
        $categories = Category::all();
        return view("createTask", compact("categories"));
    }

    function createTask(Request $request) {
        $request->validate([
            "TaskName" => "required",
            "TaskDescription" => "required",
            "CategoryId" => "required",
        ], [
            "TaskName.required" => "Task Name is required.",
            "TaskDescription.required" => "Task Description is required.",
            "CategoryId.required" => "Category is required."
        ]);

        Task::create([
            "TaskName" => $request->TaskName,
            "TaskDescription" => $request->TaskDescription,
            "CategoryId" => $request->CategoryId,
        ]);

        return redirect(route( "getHome"));
    }

    function getHome() {
        $tasks = Task::all();
    
        return view('home', compact('tasks'));
    }
}
