<x-user::layouts.master>
<div class="max-w-lg mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-4">Create User</h1>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        @include('user::form')
    </form>
</div>


</x-user::layouts.master>
