@extends('layouts.admin')

@section('header', 'Create Admin User')

@section('content')
<div class="max-w-2xl mx-auto">
    <form action="{{ route('admin.admin_users.store') }}" method="POST" class="space-y-6 bg-white p-6 shadow sm:rounded-md">
        @csrf
        
        <x-form.input name="name" label="Name" required />

        <x-form.input name="email" type="email" label="Email" required />

        <x-form.input name="password" type="password" label="Password" required />

        <x-form.input name="password_confirmation" type="password" label="Confirm Password" required />

        <div>
            <label class="block text-sm font-medium leading-6 text-gray-900">Roles</label>
            <div class="mt-2 space-y-2">
                @foreach($roles as $role)
                    <div class="flex items-center">
                        <input id="role_{{ $role->id }}" name="roles[]" type="checkbox" value="{{ $role->name }}" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        <label for="role_{{ $role->id }}" class="ml-3 text-sm leading-6 text-gray-900">{{ $role->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="relative flex gap-x-3">
            <div class="flex h-6 items-center">
                <input id="is_super" name="is_super" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
            </div>
            <div class="text-sm leading-6">
                <label for="is_super" class="font-medium text-gray-900">Super Admin Access</label>
                <p class="text-gray-500">Grants full system access regardless of roles (use carefully).</p>
            </div>
        </div>

        <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</div>
@endsection
