@extends('layouts.app')


@section('content')

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
	$(document).ready(function() {
		/** ajax reference :http://tutsnare.com/post-data-using-ajax-in-laravel-5/ **/
		$.ajaxSetup({
		   headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
		});

		var Calendar_Today = new Date();
		/*
		var now_date = new Date();
		var now_time = now_date.getTime();
		*/
		$('#calendar').fullCalendar({
			header: {
				left: 'title',
				center: '',
				right: 'month prev,next,today add_meet', //another options: ,agendaWeek,agendaDay
			},
			defaultDate: Calendar_Today,
			editable: false, // allow event slip
			eventLimit: true, // allow "more" link when too many events
			events: {
				url: 'calendar-feed',
				type: 'POST',
				error: function() {
					$('#script-warning').show();
				}
			},
			loading: function(bool) {
				$('#loading').toggle(bool);
			},
			eventClick: function(calEvent, jsEvent, view) {
		        //alert(calEvent.id);
		    },
		    eventRender: function (event, element) {
		        element.attr('href', 'javascript:void(0);');
		        element.click(function() {
		            $("#startTime").html(moment(event.start).format('MMM Do h:mm A'));
		            $("#endTime").html(moment(event.endtime).format('MMM Do h:mm A'));
		            $("#eventInfo").html(event.description);
		            $("#eventLink").attr('href', event.url);
		            $("#eventContent").dialog({ modal: true, title: event.title, width:350});
		        });
		    },
		    customButtons: {
		        add_meet: {
		            text: 'New Meeting',
		            click: function() {
		            	var domain= document.location.href;
		            	window.location.href = domain + '/new_meet';
		            }
		        }
		    },
		});
	});
</script>
<style>
	body {
		margin: 0;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#script-warning {
		display: none;
		background: #eee;
		border-bottom: 1px solid #ddd;
		padding: 0 10px;
		line-height: 40px;
		text-align: center;
		font-weight: bold;
		font-size: 12px;
		color: red;
	}

	#loading {
		display: none;
		position: absolute;
		top: 10px;
		right: 10px;
	}

	#calendar {
		max-width: 900px;
		margin: 40px auto;
		padding: 0 10px;
	}

	.fc-content {
	    cursor: pointer;
	}
</style>
</head>
<body>
	<!-- System busy -->
	<div id='script-warning'>
		<code>php/get-events.php</code> 
		must be running.
	</div>
	<!-- Page loading in top/right -->
	<div id='loading'>loading...</div>
	<!-- Fullcalendar -->
	<div id='calendar'></div>
	<!-- Fullcalendar event click -->
	<div id="eventContent" title="Event Details" style="display:none;">
		Start: <span id="startTime"></span><br>
		End: <span id="endTime"></span><br><br>
		<p id="eventInfo"></p>
		<p><strong><a id="eventLink" href="" target="_blank">Read More</a></strong></p>
	</div>

</body>
</html>

@endsection