<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Demo</title>

    <!-- jquery -->
    <link rel='stylesheet' href="{{ asset('/jquery-ui-1.12.1/jquery-ui.css') }}">
    <!-- bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <!-- fullcalendar -->
    <link rel='stylesheet' media='print' href="{{ asset('/fullcalendar-2.9.1/fullcalendar.print.css') }}">
    <link rel='stylesheet' href="{{ asset('/fullcalendar-2.9.1/fullcalendar.css') }}">
    <!-- flatpickr -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{ asset('flatpickr-gh-pages/dist/flatpickr.min.css') }}">

    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="{{ asset('/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>
    <!-- flatpickr -->
    <script src="{{ asset('flatpickr-gh-pages/dist/flatpickr.min.js') }}"></script>
    <!-- myJS -->
    <script src="{{ asset('js/myJS.js') }}"></script>
    <!-- bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- recaptcha -->
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=zh-TW"></script>
    <!-- fullcalendar -->
    <script src="{{ asset('/fullcalendar-2.9.1/lib/moment.min.js') }}"></script>
    <script src="{{ asset('/fullcalendar-2.9.1/fullcalendar.min.js') }}"></script>
</head>

<body id="app-layout" onload="myJSaction()">
    <!-- 巡覽top -->
    <nav class="navbar navbar-inverse navbar-scroll" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Home
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav navbar-left">
                    <li class="avtive"><a href="{{ url('/meethome') }}">MeetSystem</a></li>
                    <!--
                    <li><a href="{{ url('/my_test') }}">My_Test</a></li>
                    -->
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- 
                    Authentication Links 
                    <li><a href="{{ url('/admin') }}">Enter BackGround</a></li>
                    -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="min-height:670px">
        @yield('content')
    </div>
    <!-- 巡覽bot -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container" style="text-align:center;">
            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
            This Demo display for Bootstrap Framework
        </div>
    </nav>
    <input type="hidden" name="csrf-token" value="{!! csrf_token() !!}">
</body>
</html>
