<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <script src="{{ mix('js/app.js') }}" defer></script>

        <link rel="dns-prefetch" href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        @yield('css')
    </head>
    <body>
        <div id="app">
            <header>
                <h1 class="header-logo"><a href="{{ url('/') }}">noveLeco</a></h1>
            </header>
            
            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>