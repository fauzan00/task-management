<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Workspace;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Workspace $workspace)
    {
        //
        $this->authorize('view', $workspace);

        $tasks = $workspace->tasks;

        return view('tasks.index', compact('workspace', 'tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
            $this->authorize('update', $workspace);
    
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'deadline' => 'required|date',
    ]);

    $workspace->tasks()->create($request->all());

    return redirect()->route('workspaces.tasks.index', $workspace);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
