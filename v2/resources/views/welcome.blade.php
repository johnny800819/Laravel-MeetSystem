@extends('layouts.app')

@section('header', 'Welcome')

@section('content')
<div class="bg-white py-24 sm:py-32 rounded-lg shadow">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl text-center">
      <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">MeetSystem v2</h2>
      <p class="mt-2 text-lg leading-8 text-gray-600">Modern Meeting Management & Administration Platform.</p>
    </div>
    <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-6 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-2 lg:gap-8">
      <div class="flex gap-x-4 rounded-xl bg-gray-50 p-6 ring-1 ring-inset ring-gray-200 hover:bg-gray-100 transition">
        <div class="text-base leading-7">
          <h3 class="font-semibold text-gray-900">Meeting Calendar</h3>
          <p class="mt-2 text-gray-600">Schedule, view, and manage your team meetings efficiently.</p>
          <p class="mt-4">
            <a href="{{ route('meets.index') }}" class="text-indigo-600 hover:text-indigo-500 font-semibold">Go to Calendar <span aria-hidden="true">&rarr;</span></a>
          </p>
        </div>
      </div>
      <div class="flex gap-x-4 rounded-xl bg-gray-50 p-6 ring-1 ring-inset ring-gray-200 hover:bg-gray-100 transition">
        <div class="text-base leading-7">
          <h3 class="font-semibold text-gray-900">Admin Panel</h3>
          <p class="mt-2 text-gray-600">Manage users, roles, and system permissions.</p>
          <p class="mt-4">
            <a href="{{ route('admin.dashboard') }}" class="text-indigo-600 hover:text-indigo-500 font-semibold">Go to Admin <span aria-hidden="true">&rarr;</span></a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
