@extends('layouts.nav')

@section('title', 'マイページ')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-3">
            <div class="user-profile card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mx-md-4 mb-4" style="text-align: center;">
                            @if ( $user->icon_image_path != null )
                                <img src="{{ asset('/storage/image/'.$user->icon_image_path) }}" alt="プロフィール画像" class="show-img img-thumbnail ">
                            @else
                                <img src="{{ asset('/image/no_image.png') }}" alt="画像がありません" class="show-img img-thumbnail">
                            @endif
                        </div>
                        
                        <div class="col-md-7 mb-3">
                            <div class="text-right">
                              <a class="btn" href="{{ action('Admin\ProfileController@edit') }}">プロフィール編集</a>
                            </div>
                            <div class="my-3">
                                <h2>{{ $user->name }}</h2>
                            </div>
                            <div class="my-3">
                                <p>{{ $user->introduction }}</p>
                            </div>
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
                        <div class="card-body">
                            <div class="card-title text-right mb-0">
                              <object><a class="btn" href="{{ action('Admin\ArticleController@delete', ['id' => $article->id]) }}">削除</a></object>
                            </div>
                            <h4 class="card-title">{{ \Str::limit ( $article->book_title, 100 ) }}</h4>
                            <p class="card-title">{{ \Str::limit ( $article->author, 100 ) }}</p>
                            <p class="card-title subtitle">{{ \Str::limit ( $article->subtitle, 100 ) }}</p>
                            <p class="card-title">{{ \Str::limit ( $article->body, 200 ) }}</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
　　</div>
</div>
@endsection