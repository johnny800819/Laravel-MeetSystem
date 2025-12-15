@extends('layouts.app')

@section('header', 'Edit Meeting')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex justify-end mb-4">
        <form action="{{ route('meets.destroy', $meet->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this meeting? This action cannot be undone.');">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-sm text-red-600 hover:text-red-900 font-semibold px-4 py-2 border border-red-200 rounded-md hover:bg-red-50">Cancel Meeting</button>
        </form>
    </div>

    <form action="{{ route('meets.update', $meet->id) }}" method="POST" class="space-y-8 divide-y divide-gray-200 bg-white p-8 shadow-lg rounded-xl">
        @csrf
        @method('PUT')
        
        <div class="space-y-6 pt-4 first:pt-0">
            <div>
                <h3 class="text-lg font-medium leading-6 text-gray-900">Meeting Details</h3>
                <p class="mt-1 text-sm text-gray-500">Update the information for this meeting.</p>
            </div>

            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <x-form.input name="title" label="Meeting Title" :value="$meet->title" required />
                </div>

                <div class="sm:col-span-6">
                    <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description / Agenda</label>
                    <div class="mt-2">
                        <textarea id="description" name="description" rows="3"
                            class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('description', $meet->description) }}</textarea>
                    </div>
                </div>

                <div class="sm:col-span-6">
                    <x-form.input name="location" label="Location / Link" :value="$meet->location" />
                </div>
            </div>
        </div>

        <div class="space-y-6 pt-8">
            <div>
                <h3 class="text-lg font-medium leading-6 text-gray-900">Date & Time</h3>
                <p class="mt-1 text-sm text-gray-500">Reschedule the meeting if needed.</p>
            </div>

            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <x-form.input name="start_time" type="datetime-local" label="Start Time" :value="$meet->start_time->format('Y-m-d\TH:i')" required />
                </div>

                <div class="sm:col-span-3">
                    <x-form.input name="end_time" type="datetime-local" label="End Time" :value="$meet->end_time->format('Y-m-d\TH:i')" required />
                </div>
            </div>
        </div>

        @php
            $chairmanId = $meet->members->where('role', \App\Models\MeetingMember::ROLE_CHAIRMAN)->first()?->user_id;
            $recorderId = $meet->members->where('role', \App\Models\MeetingMember::ROLE_RECORDER)->first()?->user_id;
            $memberIds = $meet->members->where('role', \App\Models\MeetingMember::ROLE_MEMBER)->pluck('user_id')->toArray();
        @endphp

        <div class="space-y-6 pt-8">
            <div>
                <h3 class="text-lg font-medium leading-6 text-gray-900">Participants</h3>
                <p class="mt-1 text-sm text-gray-500">Modify the key roles and attendees.</p>
            </div>

            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="chairman_id" class="block text-sm font-medium leading-6 text-gray-900">Chairman (Host)</label>
                    <div class="mt-2">
                        <select id="chairman_id" name="chairman_id" required
                            class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">Select Chairman</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $chairmanId == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="recorder_id" class="block text-sm font-medium leading-6 text-gray-900">Recorder (Secretary)</label>
                    <div class="mt-2">
                        <select id="recorder_id" name="recorder_id" required
                            class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">Select Recorder</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $recorderId == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="sm:col-span-6">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Attendees</label>
                    <div class="mt-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 border border-gray-200 rounded-md p-4 max-h-60 overflow-y-auto bg-gray-50">
                        @foreach($users as $user)
                        <div class="relative flex items-start">
                            <div class="flex h-6 items-center">
                                <input id="member_{{ $user->id }}" name="members[]" type="checkbox" value="{{ $user->id }}"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
                                    {{ in_array($user->id, $memberIds) ? 'checked' : '' }}>
                            </div>
                            <div class="ml-3 text-sm leading-6">
                                <label for="member_{{ $user->id }}" class="font-medium text-gray-900">{{ $user->name }}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-8 flex items-center justify-end gap-x-6">
            <a href="{{ route('meets.index') }}" class="text-sm font-semibold leading-6 text-gray-900 hover:text-gray-700">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition duration-150 ease-in-out">Update Meeting</button>
        </div>
    </form>
</div>
@endsection
