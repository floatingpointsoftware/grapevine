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
                    <nav class="navbar">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <a class="navbar-brand" href="/">{!! Theme::image('img/logo.png') !!}</a>
                        </div>
                    </nav>
                </div>
            </div>
        </section>

        <section class="main container">
            <div id="pjaxContainer" class="col-md-9">
                @yield('main')
            </div>

            <div class="left-menu col-md-3">
                @include('partials.aside')
            </div>
        </section>

        <section class="footer">

        </section>
    </body>
</html>
