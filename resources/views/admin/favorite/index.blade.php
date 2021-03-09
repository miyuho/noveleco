@extends('layouts.nav')

@section('title', 'お気に入りユーザー')

@section('css')<link href="{{ mix('css/favorite.css') }}" rel="stylesheet">@endsection

@section('content')

    <h1 class="content-title">お気に入りユーザー</h1>
    
    <div class="favorite-wrapper">
        @foreach ( $favorite_users as $favorite_user )
        <a class="favorite-user" href="{{ action('EachAccountController@index', ['id' => $favorite_user->id]) }}">
            
            <div class="user-img">
                @if ( $favorite_user->icon_image_path != null )
                    <img src="{{ $favorite_user->icon_image_path }}" alt="ユーザーの画像">
                @else
                    <img src="{{ asset('/image/no_image.png') }}" alt="画像がありません">
                @endif
            </div>
            
            <div class="txt">
                <h1 class="user-name">{{ \Str::limit ( $favorite_user->name, 30 ) }}</h1>
                <p class="introduction">{{ \Str::limit ( $favorite_user->introduction, 150 ) }}</p>
            </div>
            
        </a>
        @endforeach
    </div>

    <!--該当するものが無ければメッセージを表示させる-->
    @if ( $favorite_users->isEmpty() )
        <p class="no-favorites">お気に入り登録したユーザーはいません</p>
    @endif

@endsection