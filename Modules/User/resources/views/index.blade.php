<x-user::layouts.master>
<div class="max-w-6xl mx-auto p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">User Management</h1>
        <a href="{{ route('admin.users.create') }}"
           class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
            + Create User
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Role</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($user as $u)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $u->name }}</td>
                    <td class="px-4 py-2">{{ $u->email }}</td>
                    <td class="px-4 py-2">{{ $u->getRoleNames()->first() }}</td>

                    <td class="px-4 py-2 flex gap-2">
                        <a href="{{ route('admin.users.edit', $u->id) }}"
                           class="text-blue-600 hover:underline">Edit</a>

                        <form action="{{ route('admin.users.destroy', $u->id) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')

                            <button class="text-red-600 hover:underline">
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

</x-user::layouts.master>
