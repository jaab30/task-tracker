<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Make sure user is logged in
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth::id();
        $tasks = Task::where('user_id', $id)
        ->get();

        return view('tasks', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entertask');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();
        $task = new Task;

        $task->title = $request->title;
        $task->description = $request->description;
        $task->completed = false;
        $task->user_id = $id;

        $task->save();

        $id = Auth::id();
        $tasks = Task::where('user_id', $id)
        ->get();

        return view('tasks', compact('tasks'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Task $task){
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $taskId = $task->id;
        $currentTask = Task::find($taskId);

        $currentTask->completed = $request->completed;
        $currentTask->save();
    
        return response()->json($currentTask);
       
    }

    public function updateTaskBody(Request $request, Task $task)
    {
        $taskId = $task->id;
        $currentTask = Task::find($taskId);

        $currentTask->title = $request->title;
        $currentTask->description = $request->description;
        $currentTask->save();
        return response()->json($currentTask);
    }

    /** 
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $taskId = $task->id;
        $currentTask = Task::find($taskId);
        $currentTask->delete();
        return response()->json($task);
    }
}
