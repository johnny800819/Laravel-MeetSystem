@extends('layouts.admin')

@section('header', 'Create Role')

@section('content')
<div class="max-w-2xl mx-auto">
    <form action="{{ route('admin.roles.store') }}" method="POST" class="space-y-6 bg-white p-6 shadow sm:rounded-md">
        @csrf
        
        <div>
            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Role Name</label>
            <div class="mt-2">
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium leading-6 text-gray-900">Permissions</label>
            <div class="mt-2 grid grid-cols-2 gap-4 border border-gray-200 rounded-md p-4 max-h-60 overflow-y-auto">
                @foreach($permissions as $permission)
                <div class="flex items-center">
                    <input id="perm_{{ $permission->id }}" name="permissions[]" type="checkbox" value="{{ $permission->name }}"
                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="perm_{{ $permission->id }}" class="ml-3 block text-sm leading-6 text-gray-900">{{ $permission->name }}</label>
                </div>
                @endforeach
            </div>
        </div>

        <div class="flex items-center justify-end gap-x-6">
            <a href="{{ route('admin.roles.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create Role</button>
        </div>
    </form>
</div>
@endsection
