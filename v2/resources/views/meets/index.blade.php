@extends('layouts.app')

@section('header', 'Meeting Calendar')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <div class="mb-4 flex justify-end">
        <a href="{{ route('meets.create') }}" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">New Meeting</a>
    </div>
    <div id='calendar'></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: '/meets/events', // API endpoint for fetching events
            eventClick: function(info) {
                // Redirect to edit page
                window.location.href = '/meets/' + info.event.id + '/edit';
            }
        });
        calendar.render();
    });
</script>
@endsection
