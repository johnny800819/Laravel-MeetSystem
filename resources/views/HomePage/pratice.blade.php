@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading" style="background-color:lightyellow">The design program</div>
		<div class="panel-body">
		<p>Description : 
		<br>I used my trivial time on these design. 
		<br>It's not a full integrity program, but truly on myself. 
		<br>I trust, practing these can make better for me, so just record it and exhibition</p>
		</div>

		<!-- List group -->
		<ol class="list-group">
			<li class="list-group-item">
				<a href="{{URL::route('sub1_pratice')}}">JavaScript and JQuery Ajax Exhibition</a>
			</li>
			<li class="list-group-item">
				<a href="{{URL::route('sub2_pratice')}}">PHP Form Exhibition</a>
			</li>
		</ol>
	</div>
	<div class="div_right_bottom"></div>
</div>
@endsection