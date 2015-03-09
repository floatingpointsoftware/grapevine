<!DOCTYPE html>
<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,600,700,800' rel='stylesheet' type='text/css'>
        {!! Theme::style('css/grapevine.dev.css') !!}
        <title></title>
    </head>
    <body>
        <section class="header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <a class="logo" href="/">{!! Theme::image('img/logo.png') !!}</a>
                    </div>

                    <div class="user-actions col-lg-6 hi-icon-effect">
                        @if (Auth::check())
                            <a href="{{ $link->user->profile(Auth::user()) }}"><span class="glyphicon glyphicon-user hi-icon" aria-hidden="true"></span></a>
                            <a href="{{ $link->logout() }}"><span class="glyphicon glyphicon-log-out hi-icon" aria-hidden="true"></span></a>
                        @else
                            <a href="{{ $link->login() }}"><span class="glyphicon glyphicon-log-in hi-icon" aria-hidden="true"></span></a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <ol class="breadcrumb">
                            <li><a href="{!! route('home') !!}">Home</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="main container">
            <div class="row">
                <div class="col-md-9">
                    <div id="pjax-container">
                        @yield('main')
                    </div>

                    <div id="loader">
                        <div class="spinner">
                            <div class="cube1"></div>
                            <div class="cube2"></div>
                        </div>
                    </div>
                </div>

                <div class="left-menu col-md-3">
                    @include('partials.aside')
                </div>
            </div>
        </section>

        <section class="footer">

        </section>

        {!! HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js') !!}
        {!! Theme::script('/js/jquery.pjax.js') !!}
        {!! Theme::script('/js/grapevine.dev.js') !!}
    </body>
</html>
