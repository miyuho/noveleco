@extends('layouts.nav')

@section('title', 'ブックマーク')

@section('css')<link href="{{ mix('css/bookmarks.css') }}" rel="stylesheet">@endsection

@section('content')
    
    <h1 class="content-title">ブックマーク</h1>
    
    <div class="article-wrapper">
        @foreach ( $articles as $article )
        <a class="article" href="{{ action('ArticleController@show', ['id' => $article->id]) }}">
            
            <div class="article-img">
                @if ( $article->book_image_path != null )
                    <img src="{{ $article->book_image_path }}" alt="本の画像">
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
        <p class="no-articles">ブックマークした記事はありません</p>
    @endif
   
@endsection