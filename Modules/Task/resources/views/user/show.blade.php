<x-task::layouts.master>

<div class="bg-white shadow-md rounded-xl p-6 max-w-3xl mx-auto space-y-6">

    <h1 class="text-2xl font-semibold text-gray-800">{{ $task->title }}</h1>

    <p class="text-gray-600">{{ $task->description ?? 'No description provided.' }}</p>

    <p class="mt-2">
        <span class="font-medium text-gray-700">Status:</span>
        <span class="ml-2 px-2 py-1 rounded-full text-white text-xs
            @if($task->status === 'pending') bg-yellow-500
            @elseif($task->status === 'process') bg-blue-500
            @elseif($task->status === 'QA') bg-purple-600
            @else bg-green-600 @endif">
            {{ ucfirst($task->status) }}
        </span>
    </p>

    {{-- Comments --}}
    <div class="space-y-4 mt-4">
        <h2 class="text-xl font-semibold text-gray-800">Comments</h2>

        @forelse($task->comments as $comment)
            <div class="bg-gray-100 rounded-lg p-3">
                <p class="text-gray-700">{{ $comment->comment }}</p>
                <span class="text-gray-500 text-xs">
                    By {{ $comment->user->name ?? 'Unknown' }} | {{ $comment->created_at->diffForHumans() }}
                </span>
            </div>
        @empty
            <p class="text-gray-500">No comments yet.</p>
        @endforelse
    </div>

    <div class="flex flex-wrap gap-3 mt-6">
        <a href="{{ route('user.tasks.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition">
            Back to Tasks
        </a>

        <a href="{{ route('user.tasks.status.edit', $task->id) }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
            Update Status
        </a>

        <a href="{{ route('user.tasks.comment.create', $task->id) }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
            Add Comment
        </a>
    </div>

</div>

</x-task::layouts.master>
