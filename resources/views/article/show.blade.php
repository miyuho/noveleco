@extends('layouts.nav')

@section('title', $article->book_title)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row border-bottom">
                        <div class="col-md-4 mx-md-4 mb-4" style="text-align:center;">
                            @if ( $article->book_image_path != null )
                                <img src="{{ asset('/storage/image/'.$article->book_image_path) }}" alt="本の画像" class="show-img card-img img-thumbnail ">
                            @else
                                <img src="{{ asset('/image/no_image.png') }}" alt="画像がありません" class="show-img card-img img-thumbnail">
                            @endif
                        </div>
                        
                        <div class="col-md-7">
                            <div class="text-right">
                                <a class="pr-3" href="{{ action('EachAccountController@add', ['id' => $user->id]) }}">
                                    <img src="{{ asset('/storage/image/'.$user->icon_image_path) }}" alt="ユーザーアイコン" class="icon">
                                    {{ $user->name }}
                                </a>
                                <span class="date">
                                    {{ $article->created_at->format('Y年m月d日') }}
                                </span>
                            </div>
                            <div class="mb-3 mt-4">
                                <h2>{{ $article->book_title }}</h2>
                            </div>
                            <div class="my-3">
                                <p>{{ $article->author }}</p>
                            </div>
                            <div class="my-3">
                                <p><i>「{{ $article->subtitle }}」</i></p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-11 my-5">
                            {!! nl2br (e($article->body)) !!}
                            
                            <div class="pt-3">
                                <div class="d-flex justify-content-center">
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
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection