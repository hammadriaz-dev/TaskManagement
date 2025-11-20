<x-task::layouts.master>

<div class="bg-white shadow-md rounded-xl p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Tasks</h1>

        <a href="{{ route('admin.tasks.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            + Create Task
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-200 text-gray-700 text-sm">
                    <th class="px-4 py-3 text-left">ID</th>
                    <th class="px-4 py-3 text-left">Title</th>
                    <th class="px-4 py-3 text-left">Description</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">User</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>

            <tbody class="text-sm">
                @foreach($tasks as $task)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $task->id }}</td>
                        <td class="px-4 py-3">{{ $task->title }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $task->description }}</td>
                        <td>
                            <span class="ml-4 px-3 py-1 rounded-full text-white text-xs
                                @if($task->status === 'pending') bg-yellow-500
                                @elseif($task->status === 'process') bg-blue-500
                                @elseif($task->status === 'QA') bg-purple-600
                                @else bg-green-600 @endif">
                                {{ ucfirst($task->status) }}
                            </span>
                        </td>

                        <td class="px-4 py-3">{{ $task->user->name ?? 'N/A' }}</td>

                        <td class="px-4 py-3 flex items-center gap-2">
                            <a href="{{ route('admin.tasks.edit', $task->id) }}"
                               class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 text-xs">
                                Edit
                            </a>

                            <form action="{{ route('admin.tasks.destroy', $task->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')

                                <button
                                    class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 text-xs"
                                    onclick="return confirm('Delete this task?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

</x-task::layouts.master>
