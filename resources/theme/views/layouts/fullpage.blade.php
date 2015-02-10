<!DOCTYPE html>
<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
        {!! Theme::style('css/grapevine.dev.css') !!}
        <title></title>
    </head>
    <body>
        <section class="header">
            <div class="container">
                <div class="row">
                    <div class="logo">{!! HTML::link('/', 'Grapevine discussion category') !!}</div>
                    <div class="account"></div>
                </div>
            </div>
        </section>

        <section class="main container">
            <div id="pjaxContainer" class="col-md-9">
                @yield('main')
            </div>

            <div class="left-menu col-md-3">
                @include('menus.right')
            </div>
        </section>

        <section class="footer">

        </section>
    </body>
</html>
