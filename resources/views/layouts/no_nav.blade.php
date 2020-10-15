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
                <div class="container">
                    <div class="row header-nav">
                        <div class="col-md-3">
                            <h1><a class="header-logo" href="{{ url('/') }}">noveLeco</a></h1>
                        </div>
                    </div>
                </div>
            </header>
             @if (session('account_created_message'))
                <div class="account_created_message alert text-center py-2 my-0" style="background-color:#c1d1b0;">
                    {{ session('account_created_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <main class="my-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>