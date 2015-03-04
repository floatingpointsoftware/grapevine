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
                    <a class="logo" href="/">{!! Theme::image('img/logo.png') !!}</a>

                    <div class="user-actions col-lg-6">

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
                <div id="pjaxContainer" class="col-md-9">
                    @yield('main')
                </div>

                <div class="left-menu col-md-3">
                    @include('partials.aside')
                </div>
            </div>
        </section>

        <section class="footer">

        </section>
    </body>
</html>
