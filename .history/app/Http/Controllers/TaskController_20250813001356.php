<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Workspace;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index(Workspace $workspace)
    {
        //
        // $this->authorize('view', $workspace);

        // $tasks = $workspace->tasks;

        // return view('tasks.index', compact('workspace', 'tasks'));

        $this->authorize('view', $workspace);
        $tasks = $workspace->tasks()->latest()->get();

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
    public function store(Request $request, Workspace $workspace)
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
    public function update(Request $request, Workspace $workspace, Task $task)
    {
        //
        $this->authorize('update', $workspace);

        $request->validate([
            'completed' => 'boolean',
        ]);


        $task->update([
            'completed' => $request->completed,
            'completed_at' => $request->completed ? now() : null,
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }

    // public function create(Workspace $workspace) {}
    // public function store(Request $request, Workspace $workspace) {}
    // public function show(Workspace $workspace, Task $task) {}
    // public function edit(Workspace $workspace, Task $task) {}
    // public function update(Request $request, Workspace $workspace, Task $task) {}
    // public function destroy(Workspace $workspace, Task $task) {}
}
