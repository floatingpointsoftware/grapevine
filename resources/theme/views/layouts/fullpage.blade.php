<!DOCTYPE html>
<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
        {!! HTML::style('css/grapevine.dev.css') !!}
        <title></title>
    </head>
    <body>
        <section class="header">
            <div class="container">
                <div class="logo">{!! HTML::link('/', 'Grapevine discussion forum') !!}</div>
                <div class="account"></div>
            </div>
        </section>

        <section class="main container">
            <div id="pjaxContainer" class="column-three-quarters">
                @yield('main')
            </div>

            <div class="left-menu column-one-quarter">
                @include('menus.right')
            </div>
        </section>

        <section class="footer">

        </section>
    </body>
</html>
