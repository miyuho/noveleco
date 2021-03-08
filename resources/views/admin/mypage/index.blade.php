@extends('layouts.nav')

@section('title', 'マイページ')

@section('css')<link href="{{ secure_asset('css/mypage.css') }}" rel="stylesheet">@endsection

@section('content')

    <div class="profile">
        
        <div class="user-img">
            @if ( $user->icon_image_path != null )
                <img src="{{ $user->icon_image_path }}" alt="プロフィール画像">
            @else
                <img src="{{ asset('/image/no_image.png') }}" alt="画像がありません">
            @endif
        </div>
        
        <div class="profile-right">
            
            <div class="top-right">
              <a class="edit-btn" href="{{ action('Admin\ProfileController@edit') }}">プロフィール編集</a>
              <i class="icon-favorite fas fa-star"><span class="pl-1">{{ $user->count_favorites }}</span></i>
            </div>
            
            <h1 class="user-name">{{ $user->name }}</h1>
            
            <p class="introduction">{!! nl2br (e($user->introduction)) !!}</p>
        </div>
        
    </div>
    
    <p class="partition">投稿記事</p>
    
    <div class="article-wrapper">
        @foreach ( $articles as $article )
        <a class="article" href="{{ action('Admin\ArticleController@show', ['id' => $article->id]) }}">
            
            <div class="article-item">
                @if ( $article->book_image_path != null )
                    <img src="{{ $article->book_image_path }}" alt="本の画像">
                @else
                    <img src="{{ asset('/image/no_image.png') }}" alt="画像がありません">
                @endif
            </div>
            
            <div class="article-txt">
                
                <div class="top-right">
                    <form method="post" action="{{ route('article_delete', ['id' => $article->id]) }}">
                    @csrf
                    <input type="submit" value="削除" class="delete-btn" onclick="return confirm('「 {{$article->book_title}} 」を削除して宜しいですか？');">
                    </form>
                    
                    <i class="icon-like fas fa-heart"><span class="pl-1">{{ $article->count_likes }}</span></i>
                </div>
                
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