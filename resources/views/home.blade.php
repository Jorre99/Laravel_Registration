<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{mix('css/app.css')}}"/>
    @yield('css_after')
    <title>@yield('title', 'Zwembadregistratie')</title>
</head>

<body class="landingCanvas">
@include('shared.navigation')
<div class="container">
    <div class="row  justify-content-between landing-position">
        <div class="col-md-3">
            <h1>Zwembadregistraties</h1>
            <p>Welkom op onze website!</p>
        </div>
        <div class="offset-md-6 col-md-3 row">
            <div class="col-12">
                <button class="btn btn-outline-primary"><a class="nav-link" href="/lessonpref">Zwemlessen <br> <small>Registreer
                            voor zwemlessen!</small> </a></button>
            </div>
            <div class="col-12">
                <button class="btn btn-outline-primary"><a class="nav-link" href="/poolparties">Zwemfeesten <br> <small>Reserveer
                            een zwemfeest!</small></a></button>
            </div>
            <div class="col-12">
                <button class="btn btn-outline-primary"><a class="nav-link" href="/contact-us">Contact</a></button>
            </div>
        </div>
    </div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
@yield('script_after')
@if(env('APP_DEBUG'))
    <script>
        $('form').attr('novalidate', 'true');
    </script>
@endif
</body>
</html>
