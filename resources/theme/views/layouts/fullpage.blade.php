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
                    <nav class="navbar">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <a class="navbar-brand" href="/">{!! Theme::image('img/logo.png') !!}</a>
                        </div>

                        <nav class="nav navbar-nav">
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li><a href="{!! route('category.create') !!}">Setup category</a></li>
                                </ul>
                            </div>
                        </nav>
                    </nav>
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
