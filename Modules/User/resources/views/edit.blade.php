<x-user::layouts.master>
<div class="max-w-lg mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-4">Edit User</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('user::form')
    </form>
</div>

</x-user::layouts.master>
