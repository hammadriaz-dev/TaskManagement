<x-task::layouts.master>

<div class="bg-white shadow-md rounded-xl p-6 max-w-2xl mx-auto">

    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Edit Task</h1>

    <form action="{{ route('admin.tasks.update', $task->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Only admin can assign user --}}
        @role('admin')
        <div>
            <label for="user_id" class="block text-gray-700 font-medium mb-1">Assign User</label>
            <select name="user_id" id="user_id" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @endrole

        <div>
            <label for="title" class="block text-gray-700 font-medium mb-1">Title</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}" required
                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="description" class="block text-gray-700 font-medium mb-1">Description</label>
            <textarea name="description" id="description" rows="4"
                      class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ $task->description }}</textarea>
        </div>

        {{-- User can only change status --}}
        @unlessrole('admin')
            <input type="hidden" name="user_id" value="{{ $task->user_id }}">
        @endunlessrole

        <div>
            <label for="status" class="block text-gray-700 font-medium mb-1">Status</label>
            <select name="status" id="status" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @foreach(['pending','process','QA','completed'] as $s)
                    <option value="{{ $s }}" {{ $task->status == $s ? 'selected' : '' }}>
                        {{ ucfirst($s) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center gap-3 mt-4">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                Update
            </button>
            <a href="{{ route('admin.tasks.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition">
                Back
            </a>
        </div>
    </form>

</div>

</x-task::layouts.master>
