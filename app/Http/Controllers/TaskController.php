<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    function getCreateTaskPage() {
        $categories = Category::all();
        $isLoggedIn = Auth::check();
        return view("createTask", compact("categories", 'isLoggedIn'));
    }

    function createTask(Request $request) {
        $request->validate([
            "TaskName" => "required",
            "TaskDescription" => "required",
            "TaskImage" => "required",
            "CategoryId" => "required",
        ], [
            "TaskName.required" => "Task Name is required.",
            "TaskDescription.required" => "Task Description is required.",
            "TaskImage.required" => "Task Image Url is required.",
            "CategoryId.required" => "Category is required."
        ]);

        Task::create([
            "TaskName" => $request->TaskName,
            "TaskDescription" => $request->TaskDescription,
            "TaskImage" => $request->TaskImage,
            "CategoryId" => $request->CategoryId,
        ]);

        return redirect(route( "getHome"));
    }

    function getHome() {
        $tasks = Task::paginate(20);
        $isLoggedIn = Auth::check();
        return view('home', compact('tasks', 'isLoggedIn'));
    }

    function getEditTaskPage($taskId) {
        $task = Task::findOrFail($taskId);
        $categories = Category::all();
        $isLoggedIn = Auth::check();
        return view("editTask", compact("task", "categories", "isLoggedIn"));
    }

    function editTask(Request $request, $taskId) {
        $request->validate([
            "TaskName" => "required",
            "TaskDescription" => "required",
            "TaskImage" => "required",
            "CategoryId" => "required",
        ], [
            "TaskName.required" => "Task Name is required.",
            "TaskDescription.required" => "Task Description is required.",
            "TaskImage.required" => "Task Image Url is required.",
            "CategoryId.required" => "Category is required."
        ]);

        Task::findOrFail($taskId)->update([
            "TaskName" => $request->TaskName,
            "TaskDescription" => $request->TaskDescription,
            "TaskImage" => $request->TaskImage,
            "CategoryId" => $request->CategoryId,
        ]);

        return redirect(route( "getHome"));
    }

    function deleteTask($productId) {
        Task::findOrFail($productId)->delete();
        return redirect(route( "getHome"));
    }
}
