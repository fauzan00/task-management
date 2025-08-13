<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">Your Workspaces</h2>
            <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 hover:text-gray-900">
                ← Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Create Workspace Card -->
            <div class="bg-white shadow rounded-lg p-6 mb-8">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Create New Workspace</h3>
                <form action="{{ route('workspaces.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Workspace
                            Name</label>
                        <input type="text" name="name" id="name"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Enter workspace name" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description
                            (Optional)</label>
                        <textarea name="description" id="description" rows="2"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Brief description of your workspace"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                            Create Workspace
                        </button>
                    </div>
                </form>
            </div>

            <!-- Workspaces List -->
            @if ($workspaces->isEmpty())
                <div class="bg-white shadow rounded-lg p-6 text-center text-gray-500">
                    You don't have any workspaces yet. Create your first workspace above.
                </div>
            @else
                <div class="space-y-4">
                    @foreach ($workspaces as $workspace)
                        <div class="bg-white shadow rounded-lg hover:shadow-md transition-shadow">
                            <div class="p-6">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900 mb-1">
                                            <a href="{{ route('workspaces.tasks.index', $workspace) }}"
                                                class="hover:text-indigo-600 transition-colors">
                                                {{ $workspace->name }}
                                            </a>
                                        </h3>
                                        @if ($workspace->description)
                                            <p class="text-gray-600">{{ $workspace->description }}</p>
                                        @endif
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-sm text-gray-500 mr-3">
                                            {{ $workspace->tasks_count ?? 0 }} tasks
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
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
