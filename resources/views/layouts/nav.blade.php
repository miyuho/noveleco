<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>@yield('title')</title>
        
        <script src="{{ mix('js/app.js') }}" defer></script>
        
        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/0c6142f230.js" crossorigin="anonymous"></script>
        
        <link rel="dns-prefetch" href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        @yield('css')
    </head>
    <body>
        <div id="app">
            <header>
                    
                <div class="header-nav">
                    
                    <h1 class="header-logo"><a href="{{ url('/') }}">noveLeco</a></h1>
                    
                    <ul class="header-right">
                        @guest
                            <li class="nav-link pr-4"><a href="{{ route('register') }}">アカウント作成</a></li>
                            <li class="nav-link"><a href="{{ route('login') }}">ログイン</a></li>
                        @else
                            <li class="nav-link pr-4"><a href="{{ action('Admin\ArticleController@add') }}">投稿する</a></li>
                            
                            <li class="dropdown nav-link">
                                <a class="dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ action('Admin\MypageController@index') }}">マイページ</a>
                                    <a class="dropdown-item" href="{{ action('Admin\BookmarkController@index') }}">ブックマーク</a>
                                    <a class="dropdown-item" href="{{ action('Admin\FavoriteController@index') }}">お気に入りユーザー</a>
                                    <a class="dropdown-item" href="{{ action('Admin\ConfigController@index') }}">アカウント設定</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        ログアウト
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    
                    <!-- SPメニューアイコン -->
                    <div class="menu-icon">
                        <i class="fas fa-align-justify" id="open"></i>
                    </div>
                </div>    
                
                <!-- SPメニュー -->
                <div class="overlay">
                    <i class="fas fa-times" id="close"></i>
                    <nav>
                        @guest
                            <div class="sp-menu-head">
                                <h1 class="auth-name">ゲスト</h1>
                            </div>
                            <ul class="sp-nav">
                                <li><a class="sp-link" href="{{ route('register') }}">アカウント作成</a></li>
                                <li><a class="sp-link" href="{{ route('login') }}">ログイン</a></li>
                            </ul>
                        @else
                            <h1 class="auth-name">{{ Auth::user()->name }}</h1>
                            <ul class="sp-nav">
                                <li><a class="sp-link" href="{{ action('Admin\ArticleController@add') }}">投稿する</a></li>
                                <li><a class="sp-link" href="{{ action('Admin\MypageController@index') }}">マイページ</a></li>
                                <li><a class="sp-link" href="{{ action('Admin\BookmarkController@index') }}">ブックマーク</a></li>
                                <li><a class="sp-link" href="{{ action('Admin\FavoriteController@index') }}">お気に入りユーザー</a></li>
                                <li><a class="sp-link" href="{{ action('Admin\ConfigController@index') }}">アカウント設定</a></li>
                                <li>
                                    <a class="sp-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        ログアウト
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        @endguest
                    </nav>
                </div>
                
                <script>
                    $(function() {
                       $('#open').on('click', function() {
                             $('.overlay').addClass('show');
                             $('.overlay').removeClass('hide');
                       });
                       $('#close').on('click', function() {
                             $('.overlay').addClass('hide');
                             $('.overlay').removeClass('show');
                       });
                    });
                </script>
            </header>
            
            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>