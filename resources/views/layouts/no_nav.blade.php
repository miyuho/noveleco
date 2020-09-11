<!DOCTYPE ntml>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <script src="{{ secure_asset('js/app.js') }}" defer></script>

        <link rel="dns-prefetch" href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/no_nav.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <header>
                <nav class="navbar navbar-expand-md">
                    <div class="container">
                        <h1><a class="navbar-brand" href="{{ url('/') }}">noveLeco</a></h1>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                    </div>
                </nav>
            </header>

            <main class="my-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>