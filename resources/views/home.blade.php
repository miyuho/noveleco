@extends('layouts.nav')

@section('title', 'noveleco')

@section('css')<link href="{{ secure_asset('css/home.css') }}" rel="stylesheet">@endsection

@section('content')
    <div class="container">
        
        <form action="{{ action('HomeController@index') }}" method="get">
            @csrf
            <div class="search-box">
                <input class="keyword" type="search" placeholder="キーワード" name="q" value="{{ $q }}"
                 ><input class="search-btn" type="submit" name="search" value="検索">
            </div>
        </form>
        
        
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
                    <p class="author">{{ \Str::limit ( $article->author, 50 ) }}</p>
                    <p class="subtitle"><i>「{{ \Str::limit ( $article->subtitle, 50 ) }}」</i></p>
                    <p class="body">{{ \Str::limit ( $article->body, 130 ) }}</p>
                </div>
            </a>
        @endforeach
        
        
        <!-- 検索して該当する記事が無ければメッセージを表示 -->
        @if ( $articles->isEmpty() )
            <p class="no-articles">該当する記事がありません</p>
        @endif
       
    </div>    
   
@endsection