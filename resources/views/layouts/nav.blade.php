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
        <link href="{{ secure_asset('css/nav.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <header>
                <div class="container">
                    <div class=" header-nav">
                        <div class="col-md-3">
                            <h1><a class="header-logo" href="{{ url('/') }}">noveLeco</a></h1>
                        </div>
                        
                        <div class="col-md-4 offset-md-5">
                            <ul class="header-right">
                                @guest
                                    <div class="row">
                                        <div class="col-md-7 text-right">
                                            <li class="nav-link"><a href="{{ route('register') }}">アカウント作成</a></li>
                                        </div>
                                        <div class="col-md-5 text-right">
                                            <li class="nav-link"><a href="{{ route('login') }}">ログイン</a></li>
                                        </div>
                                    </div>
                                    @else
                                    <div class="row">
                                        <div class="col-md-7 text-right">
                                            <li class="nav-link"><a href="{{ action('Admin\ArticleController@add') }}">投稿する</a></li>
                                        </div>
                                        <div class="col-md-5 text-right">
                                            <li class="dropdown nav-link">
                                                <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                    <a class="dropdown-item" href="{{ action('Admin\MypageController@add') }}">マイページ</a>
                                                    <a class="dropdown-item" href="#">アカウント設定</a>
                                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                        ログアウト
                                                    </a>
                                                    
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                        </div>
                                    </div>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
            
            <main class="my-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>