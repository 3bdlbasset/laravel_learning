<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Task::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|max:255",
            "description" => "required|max:255",
            "priority" => "required",
        ]);

        $task = Task::create($validated);
        return response()->json([
            "message"=>"task created",
            "task"=>$task,
        ] , 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        return $task;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            "title"=>'required|max:255',
            "description"=>'required|max:255',
            "priority"=>'required|max:255',
        ]);

        Task::where('id' , $id)->update($validated);
        return response()->json([
            "message"=>"updated",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json([
            "message"=>'task deleted',
        ] , 200);
    }
}
