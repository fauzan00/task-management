<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tasks in {{ $workspace->name }}
            </h2>
            <a href="{{ route('workspaces.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Back to Workspaces
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Add Task Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Task</h3>
                    <form action="{{ route('tasks.store', $workspace) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Task Title</label>
                            <input type="text" name="title" id="title"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Enter task title" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Enter description"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                            <input type="datetime-local" name="deadline" id="deadline"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required min="{{ now()->format('Y-m-d\TH:i') }}">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Add Task
                            </button>

                            {{-- <button type="submit" style="background: blue; color: white; padding: 10px;">Add
                                Task</button> --}}

                        </div>
                    </form>
                </div>
            </div>

            <!-- Tasks List -->
            @if ($tasks->isEmpty())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center text-gray-500">
                        No tasks found for this workspace. Create your first task above.
                    </div>
                </div>
            @else
                <div class="space-y-4">
                    @foreach ($tasks as $task)
                        <div
                            class="bg-white overflow-hidden shadow-sm sm:rounded-lg {{ $task->completed ? 'border-l-4 border-green-500' : '' }}">
                            <div class="p-6">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1 mr-4">
                                        <div class="flex items-center">
                                            <h3 class="text-lg font-medium text-gray-900">{{ $task->title }}</h3>
                                            @if ($task->completed)
                                                <span
                                                    class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Completed
                                                </span>
                                            @endif
                                        </div>
                                        @if ($task->description)
                                            <p class="mt-1 text-gray-600">{{ $task->description }}</p>
                                        @endif
                                        <div class="mt-2 flex items-center text-sm text-gray-500">
                                            <span class="mr-3">Created:
                                                {{ $task->created_at->diffForHumans() }}</span>
                                            @if ($task->completed)
                                                <span>Completed: {{ $task->completed_at->diffForHumans() }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex flex-col items-end">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $task->completed ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ $task->deadlineStatus() }}
                                        </span>
                                        <form action="{{ route('tasks.update', [$workspace, $task]) }}" method="POST"
                                            class="mt-2">
                                            @csrf
                                            @method('PUT')
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" name="completed" class="sr-only peer"
                                                    {{ $task->completed ? 'checked' : '' }}
                                                    onchange="this.form.submit()">
                                                <div
                                                    class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600">
                                                </div>
                                                <span
                                                    class="ml-2 text-sm font-medium text-gray-900">{{ $task->completed ? 'Completed' : 'Mark Complete' }}</span>
                                            </label>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
