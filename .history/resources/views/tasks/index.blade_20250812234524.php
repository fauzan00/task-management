@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Tasks in {{ $workspace->name }}</h1>
            <a href="{{ route('workspaces.index') }}" class="btn btn-outline-secondary">
                Back to Workspaces
            </a>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Add New Task</h5>
                <form action="{{ route('tasks.store', $workspace) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Task Title</label>
                        <input type="text" name="title" id="title" class="form-control"
                            placeholder="Enter task title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Enter description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="deadline" class="form-label">Deadline</label>
                        <input type="datetime-local" name="deadline" id="deadline" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Task</button>
                </form>
            </div>
        </div>

        @if ($tasks->isEmpty())
            <div class="alert alert-info">
                No tasks found for this workspace.
            </div>
        @else
            <div class="task-list">
                @foreach ($tasks as $task)
                    <div class="card mb-3 task-card {{ $task->completed ? 'border-success' : '' }}">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="card-title">
                                        {{ $task->title }}
                                        @if ($task->completed)
                                            <span class="badge bg-success ms-2">Completed</span>
                                        @endif
                                    </h5>
                                    @if ($task->description)
                                        <p class="card-text text-muted">{{ $task->description }}</p>
                                    @endif
                                </div>
                                <span class="badge bg-{{ $task->completed ? 'success' : 'warning' }}">
                                    {{ $task->deadlineStatus() }}
                                </span>
                            </div>

                            <div class="mt-3 d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    Created: {{ $task->created_at->diffForHumans() }}
                                    @if ($task->completed)
                                        | Completed: {{ $task->completed_at->diffForHumans() }}
                                    @endif
                                </small>

                                <form action="{{ route('tasks.update', [$workspace, $task]) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="completed" id="completed{{ $task->id }}"
                                            class="form-check-input" role="switch" {{ $task->completed ? 'checked' : '' }}
                                            onchange="this.form.submit()">
                                        <label for="completed{{ $task->id }}" class="form-check-label">
                                            {{ $task->completed ? 'Completed' : 'Mark Complete' }}
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
