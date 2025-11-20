<div class="space-y-4">

    <div>
        <label class="block text-sm font-medium">Name</label>
        <input type="text" name="name"
               value="{{ old('name', $user->name ?? '') }}"
               class="w-full p-2 border rounded">
        @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Email</label>
        <input type="email" name="email"
               value="{{ old('email', $user->email ?? '') }}"
               class="w-full p-2 border rounded">
        @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    {{-- Password only on create OR optional on edit --}}
    <div>
        <label class="block text-sm font-medium">Password</label>
        <input type="password" name="password"
               class="w-full p-2 border rounded">
        @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Confirm Password</label>
        <input type="password" name="password_confirmation"
               class="w-full p-2 border rounded">
    </div>

    {{-- Role selection --}}
    <div>
        <label class="block text-sm font-medium">Role</label>
        <select name="roles[]" class="w-full p-2 border rounded">
            <option value="admin" {{ isset($user) && $user->hasRole('admin') ? 'selected' : '' }}>Admin</option>
            <option value="user" {{ isset($user) && $user->hasRole('user') ? 'selected' : '' }}>User</option>
        </select>
    </div>

    <button
        class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
        Save
    </button>

</div>
