@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Workspaces</h1>

        <form action="{{ route('workspaces.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Workspace name" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Workspace</button>
        </form>

        <div class="mt-4">
            @foreach ($workspaces as $workspace)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('workspaces.tasks.index', $workspace) }}">{{ $workspace->name }}</a>
                        </h5>
                        <p class="card-text">{{ $workspace->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
