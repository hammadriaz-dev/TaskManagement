<x-task::layouts.master>

<div class="bg-white shadow-md rounded-xl p-6 max-w-md mx-auto">
    <h1 class="text-2xl font-semibold mb-4">Add Comment: {{ $task->title }}</h1>

    <form action="{{ route('user.tasks.comment.store', $task->id) }}" method="POST" class="flex flex-col gap-3">
        @csrf
        <textarea name="comment" rows="4" placeholder="Write your comment..." class="border-gray-300 rounded-lg px-3 py-2" required></textarea>
        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
            Submit Comment
        </button>
    </form>

    <a href="{{ route('user.tasks.index') }}" class="inline-block mt-4 px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400">
        Back
    </a>
</div>

</x-task::layouts.master>
