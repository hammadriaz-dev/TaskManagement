<x-task::layouts.master>

<div class="max-w-3xl mx-auto bg-white shadow-md rounded-xl p-6">

    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Task Details</h1>

    {{-- Card --}}
    <div class="border rounded-xl shadow-sm p-6 bg-gray-50">

        {{-- Title --}}
        <h2 class="text-xl font-semibold text-gray-900 mb-4">
            {{ $task->title }}
        </h2>

        {{-- Description --}}
        <p class="mb-3">
            <span class="font-medium text-gray-700">Description:</span>
            <span class="text-gray-900">{{ $task->description ?? '-' }}</span>
        </p>

        {{-- Status --}}
        <p class="mb-3">
            <span class="font-medium text-gray-700">Status:</span>

            @php
                $statusColors = [
                    'pending' => 'bg-yellow-500',
                    'process' => 'bg-blue-600',
                    'QA' => 'bg-indigo-500',
                    'completed' => 'bg-green-600',
                ];
            @endphp

            <span class="text-white px-3 py-1 rounded-full text-sm {{ $statusColors[$task->status] ?? 'bg-gray-500' }}">
                {{ ucfirst($task->status) }}
            </span>
        </p>

        {{-- Assigned User --}}
        <p class="mb-3">
            <span class="font-medium text-gray-700">Assigned User:</span>
            <span class="text-gray-900">{{ $task->user->name ?? 'N/A' }}</span>
        </p>

        {{-- Created At --}}
        <p class="mb-3">
            <span class="font-medium text-gray-700">Created At:</span>
            <span class="text-gray-900">{{ $task->created_at->format('d M Y, H:i') }}</span>
        </p>

        {{-- Updated At --}}
        <p>
            <span class="font-medium text-gray-700">Updated At:</span>
            <span class="text-gray-900">{{ $task->updated_at->format('d M Y, H:i') }}</span>
        </p>

    </div>

    {{-- Buttons --}}
    <div class="flex gap-3 mt-6">
        <a href="{{ route('admin.tasks.index') }}"
           class="px-5 py-2 rounded-lg bg-gray-600 text-white hover:bg-gray-700 transition">
           Back
        </a>

        <a href="{{ route('admin.tasks.edit', $task->id) }}"
           class="px-5 py-2 rounded-lg bg-yellow-500 text-white hover:bg-yellow-600 transition">
           Edit Task
        </a>
    </div>

</div>

</x-task::layouts.master>
