@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tasks in {{ $workspace->name }}</h1>

        <form action="{{ route('tasks.store', $workspace) }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="text" name="title" class="form-control" placeholder="Task title" required>
            </div>
            <div class="mb-3">
                <textarea name="description" class="form-control" placeholder="Description"></textarea>
            </div>
            <div class="mb-3">
                <input type="datetime-local" name="deadline" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Task</button>
        </form>

        <div class="mt-4">
            @foreach ($tasks as $task)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between">
                            <span>{{ $task->title }}</span>
                            <span class="badge bg-{{ $task->completed ? 'success' : 'warning' }}">
                                {{ $task->deadlineStatus() }}
                            </span>
                        </h5>
                        <p class="card-text">{{ $task->description }}</p>
                        <form action="{{ route('tasks.update', [$workspace, $task]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-check">
                                <input type="checkbox" name="completed" id="completed{{ $task->id }}"
                                    class="form-check-input" {{ $task->completed ? 'checked' : '' }}
                                    onchange="this.form.submit()">
                                <label for="completed{{ $task->id }}" class="form-check-label">
                                    {{ $task->completed ? 'Completed' : 'Mark as complete' }}
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
