@extends('layouts.nav')

@section('title', $each_account->name.'さんのページ')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-3">
            <div class="user-profile card" style="border-bottom-color:#6e4500 !important;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 ml-md-4" style="text-align: center;">
                            @if ( $each_account->icon_image_path != null )
                                <img src="{{ $each_account->icon_image_path }}" alt="プロフィール画像" class="show-img img-thumbnail ">
                            @else
                                <img src="{{ asset('/image/no_image.png') }}" alt="画像がありません" class="show-img img-thumbnail">
                            @endif
                        </div>
                        
                        <div class="col-md-7 mb-3">
                            <div class="text-right">
                                <favorite :initial-is-favorite='@json($each_account->isFavorite(Auth::user()))'
                                          :initial-count-favorites='@json($each_account->count_favorites)'
                                          :authorized='@json(Auth::check())'
                                          endpoint="{{ route('favorite', ['each_account' => $each_account]) }}">
                                </favorite>
                            </div>
                            <div class="">
                                <h2 class="user-name">{{ $each_account->name }}</h2>
                            </div>
                            <div class="my-3">
                                <p>{!! nl2br (e($each_account->introduction)) !!}</p>
                            </div>
                        </div>
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
                    <div class="col-md-8 mt-3">
                        <div class="card-body">
                            <h3 class="index-book-title">{{ \Str::limit ( $article->book_title, 50 ) }}</h3>
                            <p class="index-author">{{ \Str::limit ( $article->author, 50 ) }}</p>
                            <p class="index-subtitle"><i>「{{ \Str::limit ( $article->subtitle, 100 ) }}」</i></p>
                            <p class="index-body">{{ \Str::limit ( $article->body, 150 ) }}</p>
                        </div>
                        
                    </div>
                </div>
            </a>
            @endforeach
        </div>
　　</div>
</div>
@endsection