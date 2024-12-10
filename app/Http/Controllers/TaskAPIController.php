<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskAPIController extends Controller
{
    function getTasks(Request $request) {
        $user = $request->user();

        $tasks = Task::where('CreatedBy', $user->id)->get();
        return response()->json([
            "data" => $tasks,
        ]);
    }

    function createTask(Request $request) {
        $user = $request->user();

        $request->validate([
            "TaskName" => "required",
            "TaskDescription" => "required",
            "TaskImage" => "required",
            "CategoryId" => "required",
        ], [
            "TaskName.required" => "Task Name is required.",
            "TaskDescription.required" => "Task Description is required.",
            "TaskImage.required" => "Task Image Url is required.",
            "CategoryId.required" => "Category is required.",
        ]);

        Task::create([
            "TaskName" => $request->TaskName,
            "TaskDescription" => $request->TaskDescription,
            "TaskImage" => $request->TaskImage,
            "CategoryId" => $request->CategoryId,
            "CreatedBy" => $user->id
        ]);

        return response('New task created succesfully', 201);
    }

    function editTask(Request $request, $taskId) {
        $user = $request->user();

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

        $data = Task::where('CreatedBy', $user->id)->where('id', $taskId)->first();

        if (!$data) {
            return response('Invalid task id!', 400);
        }

        $data->update([
            "TaskName" => $request->TaskName,
            "TaskDescription" => $request->TaskDescription,
            "TaskImage" => $request->TaskImage,
            "CategoryId" => $request->CategoryId,
        ]);

        return response('Task '.$taskId.' edited succesfully', 201);
    }

    function deleteTask(Request $request, $taskId) {
        $user = $request->user();
        $data = Task::where('CreatedBy', $user->id)->where('id', $taskId)->first();

        if (!$data) {
            return response('Invalid task id!', 400);
        }

        $data->delete();
        return response('Task '.$taskId.' deleted succesfully', 201);
    }
}
