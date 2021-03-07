@extends('layouts.nav')

@section('title', $article->book_title)

@section('css')<link href="{{ secure_asset('css/article_show.css') }}" rel="stylesheet">@endsection

@section('content')
<div class="container">
    
    <div class="top">
        
        <div class="book-img">
            @if ( $article->book_image_path != null )
                <img src="{{ asset('/storage/image/'.$article->book_image_path) }}" alt="本の画像">
            @else
                <img src="{{ asset('/image/no_image.png') }}" alt="画像がありません">
            @endif
        </div>
        
        <div class="top-txt">
            
            <div class="user">
                <a href="{{ action('EachAccountController@index', ['id' => $user->id]) }}">
                    <img class="icon" src="{{ asset('/storage/image/'.$user->icon_image_path) }}">
                    <span class="name">{{ $user->name }}</span>
                </a>
                <span class="date">
                    {{ $article->created_at->format('Y年m月d日') }}
                </span>
            </div>
            
            <div class="">
                <h1 class="book-title">{{ $article->book_title }}</h1>
                <p class="author">{{ $article->author }}</p>
                <p class="subtitle"><i>「{{ $article->subtitle }}」</i></p>
            </div>
            
        </div>
    </div>
    
    
    <div class="body">
        
        {!! nl2br (e($article->body)) !!}
        
        <div class="action">
            
          <like :initial-is-like='@json($article->isLike(Auth::user()))'
                :initial-count-likes='@json($article->count_likes)'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('like', ['article' => $article]) }}">
          </like>
          
          <bookmark :initial-is-bookmark='@json($article->isBookmark(Auth::user()))'
                    :initial-count-bookmarks='@json($article->count_bookmarks)'
                    :authorized='@json(Auth::check())'
                    endpoint="{{ route('bookmark', ['article' => $article]) }}">
          </bookmark>
          
        </div>
    </div>
                    
</div>

@endsection