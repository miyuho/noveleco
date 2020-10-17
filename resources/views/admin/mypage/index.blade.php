@extends('layouts.nav')

@section('title', 'マイページ')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-3">
            <div class="user-profile card" style="border-bottom-color:#6e4500 !important;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 ml-md-4" style="text-align: center;">
                            @if ( $user->icon_image_path != null )
                                <img src="{{ asset('/storage/image/'.$user->icon_image_path) }}" alt="プロフィール画像" class="show-img img-thumbnail ">
                            @else
                                <img src="{{ asset('/image/no_image.png') }}" alt="画像がありません" class="show-img img-thumbnail">
                            @endif
                        </div>
                        
                        <div class="col-md-7 mb-3">
                            <div class="text-right">
                              <a class="edit-btn " href="{{ action('Admin\ProfileController@edit') }}">プロフィール編集</a>
                              <i class="icon-favorite fas fa-star mx-2"><span class="pl-1" style="color: #877e7a;">{{ $user->count_favorites }}</span></i>
                            </div>
                            <div class="my-3">
                                <h2 class="user-name">{{ $user->name }}</h2>
                            </div>
                            <div class="my-3">
                                <p>{!! nl2br ($user->introduction) !!}</p>
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
                        <div class="card-body pt-2">
                            <div class="d-flex justify-content-end text-right mb-0">
                                <form method="post" action="{{ route('article_delete', ['id' => $article->id]) }}">
                                @csrf
                                <input type="submit" value="削除" class="article-delete-btn" onclick="return confirm('「 {{$article->book_title}} 」を削除して宜しいですか？');">
                                </form>
                                <div class="mx-2 mt-2">
                                    <i class="icon-like fas fa-heart"><span class="pl-1" style="color: #877e7a;">{{ $article->count_likes }}</span></i>
                                </div>
                            </div>
                            <h3 class="book-title">{{ \Str::limit ( $article->book_title, 50 ) }}</h3>
                            <p class="index-author">{{ \Str::limit ( $article->author, 50 ) }}</p>
                            <p class="index-subtitle"><i>「{{ \Str::limit ( $article->subtitle, 100 ) }}」</i></p>
                            <p class="index-body">{{ \Str::limit ( $article->body, 150 ) }}</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
            
            @if ( $articles->isEmpty() )
                <div class="card">
                    <div class="card-body text-center">
                        投稿した記事はありません
                    </div>
                </div>
            @endif
            
        </div>
　　</div>
　　
</div>
@endsection