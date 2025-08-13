<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-800">Your Workspaces</h1>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Create Workspace Form -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('workspaces.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="sr-only">Workspace Name</label>
                            <input type="text" name="name" id="name"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Workspace name" required>
                        </div>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Create Workspace
                        </button>
                    </form>
                </div>
            </div>

            <!-- Workspaces List -->
            @if ($workspaces->isEmpty())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center text-gray-500">
                        No workspaces found. Create your first workspace above.
                    </div>
                </div>
            @else
                <div class="space-y-4">
                    @foreach ($workspaces as $workspace)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
                            <div class="p-6">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">
                                            <a href="{{ route('workspaces.tasks.index', $workspace) }}"
                                                class="hover:text-blue-600">
                                                {{ $workspace->name }}
                                            </a>
                                        </h3>
                                        @if ($workspace->description)
                                            <p class="mt-1 text-gray-600">{{ $workspace->description }}</p>
                                        @endif
                                    </div>
                                    <span class="text-sm text-gray-500">
                                        {{ $workspace->tasks_count ?? 0 }} tasks
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
