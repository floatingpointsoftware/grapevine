<!DOCTYPE html>
<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
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
            @yield('main')
        </section>

        <section class="footer">

        </section>
    </body>
</html>
