<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
    }

    public function index(){
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function create(Request $request){
        $task = new Task;
        $task->name = $request->name;
        $task->save();
        return response()->json($task);
    }

    public function show($id){
        $task = Task::find($id);
        return response()->json($task);
    }

    public function update(Request $request, $id){
        $task = Task::find($id);
        $task->name = $request->input('name');
        $task->save();
        return response()->json($task);
    }

    public function destroy($id){
        $task = Task::find($id);
        $task->delete();
        return response()->json('Task removed successfully');
    }
}
