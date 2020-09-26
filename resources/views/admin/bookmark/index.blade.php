@extends('layouts.nav')

@section('title', 'ブックマーク')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-3">
            <div class="col-md-10 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="border-bottom pb-1 mb-4">
                        <h2 class="content-title">ブックマーク </h2>
                    </div>
                    <div class="row">
                       <!-- headlineで最初の記事だけここに入れる -->
                    </div>
                </div>
            </div>
        </div>
            @foreach ( $articles as $article )
            <a class="card no_gutters" href="{{ action('Admin\ArticleController@show', ['id' => $article->id]) }}">
                <div class="row">
                    <div class="col-md-3 ml-md-5 my-4" style="text-align: center;">
                        @if ( $article->book_image_path != null )
                            <img src="{{ asset('/storage/image/'.$article->book_image_path) }}" alt="本の画像" class="index-img img-thumbnail ">
                        @else
                            <img src="{{ asset('/image/no_image.png') }}" alt="画像がありません" class="index-img img-thumbnail">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body pt-2">
                            <div class="card-title text-right mb-0">
                                <object><a class="btn" href="{{ action('ArticleController@unbookmark', ['id' => $article->id]) }}">削除</a></object>
                            </div>
                            <h4 class="card-title">{{ \Str::limit ( $article->book_title, 50 ) }}</h4>
                            <p class="card-title">{{ \Str::limit ( $article->author, 50 ) }}</p>
                            <p class="card-title subtitle"><i>「{{ \Str::limit ( $article->subtitle, 100 ) }}」</i></p>
                            <p class="card-title">{{ \Str::limit ( $article->body, 150 ) }}</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
　　</div>
</div>
@endsection