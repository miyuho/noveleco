@extends('layouts.nav')

@section('title', 'ブックマーク')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-3">
            <div class="card">
                <div class="card-body pb-3 pt-4">
                    <div class="">
                        <h2 class="content-title mb-0">ブックマーク </h2>
                    </div>
                    
                </div>
            </div>
            @foreach ( $articles as $article )
            <a class="card no_gutters" href="{{ action('ArticleController@show', ['id' => $article->id]) }}">
                <div class="row">
                    <div class="col-md-3 ml-md-5 my-4" style="text-align: center;">
                        @if ( $article->book_image_path != null )
                            <img src="{{ $article->book_image_path }}" alt="本の画像" class="index-img img-thumbnail ">
                        @else
                            <img src="{{ asset('/image/no_image.png') }}" alt="画像がありません" class="index-img img-thumbnail">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body pt-5">
                            <h3 class="book-title">{{ \Str::limit ( $article->book_title, 50 ) }}</h3>
                            <p class="index-author">{{ \Str::limit ( $article->author, 50 ) }}</p>
                            <p class="index-subtitle"><i>「{{ \Str::limit ( $article->subtitle, 100 ) }}」</i></p>
                            <p class="index-body">{{ \Str::limit ( $article->body, 150 ) }}</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
            
            <!--該当するものが無ければメッセージを表示させる-->
            @if ( $articles->isEmpty() )
                <div class="card">
                    <div class="card-body text-center">
                        ブックマークした記事はありません
                    </div>
                </div>
            @endif
        </div>
　　</div>
</div>
@endsection