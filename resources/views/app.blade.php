<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Internal</title>
		<meta charset="UTF-8">
		<meta name=description content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Minified app stylesheet -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet" media="screen">
        <!-- Page Styles -->
        @yield('styles')
	</head>
	<body>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">Internal</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        {{-- <li><a href="home"><i class="fa fa-home fa-fw"></i> Home</a></li> --}}
                        <li><a href="{{ action('EventController@index') }}"><i class="fa fa-calendar fa-fw"></i> Events</a></li>
                        <li><a href="{{ action('AgentController@index') }}"><i class="fa fa-user fa-fw"></i> Agents</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/about"><i class="fa fa-question-circle fa-fw"></i> About</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="wrap">
    		<div class="container">
    			@yield('content')
    		</div>
        </div>
        <div id="footer">
            <div class="container">
                <p class="text-muted">Developed by <a href="http://csanderson.me">Chris Anderson</a></p>
            </div>
        </div>

		<!-- Minified app javascript -->
		<script src="{{ asset('js/app.js') }}"></script>
        <!-- Flash Messages -->
        @include('flash')
        <!-- Page Scripts -->
        @yield('scripts')
	</body>
</html>