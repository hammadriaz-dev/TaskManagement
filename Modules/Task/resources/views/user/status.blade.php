<x-task::layouts.master>

<div class="bg-white shadow-md rounded-xl p-6 max-w-md mx-auto">
    <h1 class="text-2xl font-semibold mb-4">Update Status: {{ $task->title }}</h1>

    <form action="{{ route('user.tasks.status.update', $task->id) }}" method="POST" class="flex items-center gap-4">
        @csrf
        @method('PATCH')

        <select name="status" class="border-gray-300 rounded-lg px-3 py-2">
            @foreach(['pending','process','QA','completed'] as $s)
                <option value="{{ $s }}" {{ $task->status === $s ? 'selected' : '' }}>
                    {{ ucfirst($s) }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
            Update
        </button>
    </form>

    <a href="{{ route('user.tasks.index') }}" class="inline-block mt-4 px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400">
        Back
    </a>
</div>

</x-task::layouts.master>
