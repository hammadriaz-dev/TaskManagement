<x-task::layouts.master>

    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-xl p-6">

        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Create Task</h1>

        <form action="{{ route('admin.tasks.store') }}" method="POST" class="space-y-5">
            @csrf

            {{-- User Dropdown--}}
            <div>
                <label for="user_id" class="block mb-2 text-gray-700 font-medium">Assign To User</label>
                <select name="user_id" id="user_id"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Title --}}
            <div>
                <label for="title" class="block mb-2 text-gray-700 font-medium">Title</label>
                <input type="text" name="title" id="title" required
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block mb-2 text-gray-700 font-medium">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>

            {{-- Status --}}
            <div>
                <label for="status" class="block mb-2 text-gray-700 font-medium">Status</label>
                <select name="status" id="status"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="pending">Pending</option>
                    <option value="process">Process</option>
                    <option value="QA">QA</option>
                    <option value="completed">Completed</option>
                </select>
            </div>

            {{-- Buttons --}}
            <div class="flex gap-3 pt-4">
                <button type="submit"
                    class="px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                    Create Task
                </button>

                <a href="{{ route('admin.tasks.index') }}"
                    class="px-5 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                    Back
                </a>
            </div>

        </form>

    </div>

</x-task::layouts.master>