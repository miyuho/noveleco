@extends('layouts.nav')

@section('title', 'noveleco')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-3">
            <form action="{{ action('HomeController@index') }}" method="get">
                @csrf
                <div class="form-group input-group">
                    <input type="text" class="form-control" placeholder="キーワード" name="cond_word" value="{{ $cond_word }}">
                    <span class="input-group-btn">
                		<button type="submit" class="btn btn-default">検索</button>
                	</span>
                </div>
            </form>
        </div>
        
        <div class="col-md-10 mt-3">
            
            @foreach ( $posts as $article )
            <a class="card no_gutters" href="{{ action('ArticleController@show', ['id' => $article->id]) }}">
                <div class="row">
                    <div class="col-md-3 m-4">
                        @if ( $article->book_image_path != null )
                            <img src="{{ asset('/storage/image/'.$article->book_image_path) }}" alt="本の画像" class="card-img img-thumbnail ">
                        @else
                            <img src="{{ asset('/image/no_image.png') }}" alt="画像がありません" class="card-img img-thumbnail">
                        @endif
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h4 class="card-title">{{ \Str::limit ( $article->book_title, 100 ) }}</h4>
                            <p class="card-title">{{ \Str::limit ( $article->author, 100 ) }}</p>
                            <p class="card-title subtitle">{{ \Str::limit ( $article->subtitle, 100 ) }}</p>
                            <p class="card-title">{{ \Str::limit ( $article->body, 200 ) }}</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
            <!--該当するものが無ければメッセージを表示させる-->
        </div>
        
    </div>
    
</div>
@endsection