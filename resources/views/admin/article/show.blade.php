@extends('layouts.nav')

@section('title', $article->book_title)

@section('css')<link href="{{ secure_asset('css/admin_article.css') }}" rel="stylesheet">@endsection

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
            
            <div class="top-right">
                <a class="edit-btn" href="{{ action('Admin\ArticleController@edit', ['id' => $article->id]) }}">編集する</a>
                <span class="date">{{ $article->created_at->format('Y年m月d日') }}</span>
            </div>
            
            <div class="">
                <h2 class="book-title">{{ $article->book_title }}</h2>
                <p class="author">{{ $article->author }}</p>
                <p class="subtitle"><i>「{{ $article->subtitle }}」</i></p>
            </div>
        </div>
    </div>
    
    
    <div class="body">
        {!! nl2br (e($article->body)) !!}
    </div>
    
 
</div>

@endsection