@extends('layouts.nav')

@section('title', $each_account->name.'さんのページ')

@section('css')<link href="{{ secure_asset('css/each_account.css') }}" rel="stylesheet">@endsection

@section('content')
    
    <div class="profile">
        
        <div class="user-img">
            @if ( $each_account->icon_image_path != null )
                <img src="{{ asset('/storage/image/'.$each_account->icon_image_path) }}" alt="プロフィール画像">
            @else
                <img src="{{ asset('/image/no_image.png') }}" alt="画像がありません">
            @endif
        </div>
        
        <div class="profile-right">
            <div class="action">
                <favorite :initial-is-favorite='@json($each_account->isFavorite(Auth::user()))'
                          :initial-count-favorites='@json($each_account->count_favorites)'
                          :authorized='@json(Auth::check())'
                          endpoint="{{ route('favorite', ['each_account' => $each_account]) }}">
                </favorite>
            </div>
            
            <h1 class="user-name">{{ $each_account->name }}</h1>
            
            <p class="introduction">{!! nl2br (e($each_account->introduction)) !!}</p>
        </div>
        
    </div>
    
    <p class="partition">投稿記事</p>
    
    
    <div class="article-wrapper">
        @foreach ( $articles as $article )
        <a class="article" href="{{ action('ArticleController@show', ['id' => $article->id]) }}">
            
            <div class="article-item">
                @if ( $article->book_image_path != null )
                    <img src="{{ asset('/storage/image/'.$article->book_image_path) }}" alt="本の画像">
                @else
                    <img src="{{ asset('/image/no_image.png') }}" alt="画像がありません">
                @endif
            </div>
            
            <div class="article-txt">
                <h1 class="book-title">{{ \Str::limit ( $article->book_title, 50 ) }}</h1>
                <p class="author">{{ \Str::limit ( $article->author, 500 ) }}</p>
                <p class="subtitle"><i>「{{ \Str::limit ( $article->subtitle, 60 ) }}」</i></p>
                <p class="body">{{ \Str::limit ( $article->body, 150 ) }}</p>
            </div>
        </a>
        @endforeach
    </div>
    
    
    @if ( $articles->isEmpty() )
        <p class="no-articles">投稿した記事がありません</p>
    @endif
    

@endsection