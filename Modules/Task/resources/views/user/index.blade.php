<x-task::layouts.master>

<div class="bg-white shadow-md rounded-xl p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">My Tasks</h1>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-200 text-gray-700 text-sm">
                    <th class="px-4 py-3 text-left">ID</th>
                    <th class="px-4 py-3 text-left">Title</th>
                    <th class="px-4 py-3 text-left">Description</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>

            <tbody class="text-sm">
                @foreach($tasks as $task)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $task->id }}</td>
                        <td class="px-4 py-3">{{ $task->title }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ Str::limit($task->description, 40, '...') }}</td>
                        <td>
                            <span class="ml-4 px-3 py-1 rounded-full text-white text-xs
                                @if($task->status === 'pending') bg-yellow-500
                                @elseif($task->status === 'process') bg-blue-500
                                @elseif($task->status === 'QA') bg-purple-600
                                @else bg-green-600 @endif">
                                {{ ucfirst($task->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 flex flex-wrap gap-2">
                            {{-- View button --}}
                            <a href="{{ route('user.tasks.show', $task->id) }}"
                               class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-xs">
                                View
                            </a>

                            {{-- Update status button --}}
                            <a href="{{ route('user.tasks.status.edit', $task->id) }}"
                               class="px-3 py-1 bg-green-600 text-white rounded-md hover:bg-green-700 text-xs">
                                Update Status
                            </a>

                            {{-- Add comment button --}}
                            <a href="{{ route('user.tasks.comment.create', $task->id) }}"
                               class="px-3 py-1 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 text-xs">
                                Add Comment
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

</x-task::layouts.master>
