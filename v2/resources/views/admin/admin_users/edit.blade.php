@extends('layouts.admin')

@section('header', 'Edit Admin User')

@section('content')
<div class="max-w-2xl mx-auto">
    <form action="{{ route('admin.admin_users.update', $admin_user->id) }}" method="POST" class="space-y-6 bg-white p-6 shadow sm:rounded-md">
        @csrf
        @method('PUT')
        
        <x-form.input name="name" label="Name" :value="$admin_user->name" required />

        <x-form.input name="email" type="email" label="Email" :value="$admin_user->email" required />

        <x-form.input name="password" type="password" label="Password (Leave blank to keep current)" />

        <x-form.input name="password_confirmation" type="password" label="Confirm Password" />

        <div>
            <label class="block text-sm font-medium leading-6 text-gray-900">Roles</label>
            <div class="mt-2 space-y-2">
                @foreach($roles as $role)
                <div class="flex items-center">
                    <input id="role_{{ $role->id }}" name="roles[]" type="checkbox" value="{{ $role->name }}"
                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
                        {{ $admin_user->hasRole($role->name) ? 'checked' : '' }}>
                    <label for="role_{{ $role->id }}" class="ml-3 block text-sm leading-6 text-gray-900">{{ $role->name }}</label>
                </div>
                @endforeach
                @error('roles')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex items-center">
            <input id="is_super" name="is_super" type="checkbox" value="1"
                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
                {{ $admin_user->is_super ? 'checked' : '' }}>
            <label for="is_super" class="ml-3 block text-sm leading-6 text-gray-900">Is Super Admin?</label>
        </div>

        <div class="flex items-center justify-between mt-6">
            <button form="delete-form" type="submit" onclick="return confirm('Are you sure you want to delete this user?')" class="text-sm font-semibold text-red-600 hover:text-red-500">Delete User</button>
            <div class="flex gap-x-6">
                <a href="{{ route('admin.admin_users.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>
        </div>
    </form>
    
    <form id="delete-form" action="{{ route('admin.admin_users.destroy', $admin_user->id) }}" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</div>
@endsection
