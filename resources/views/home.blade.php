@extends('layouts.nav')

@section('title', 'noveleco')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-3">
            <form action="{{ action('HomeController@index') }}" method="get">
                @csrf
                <div class="form-group input-group">
                    <input type="text" class="form-control" placeholder="キーワード" name="q" value="{{ $q }}">
                    <span class="input-group-btn">
                		<button type="submit" class="submit-btn btn" style="border-top-left-radius:0; border-bottom-left-radius:0; border-left:none;"
                		       >検索</button>
                	</span>
                </div>
            </form>
        </div>
        
        <div class="col-md-10 mt-3">
            
                @foreach ( $articles as $article )
                <a class="card no_gutters" href="{{ action('ArticleController@show', ['id' => $article->id]) }}">
                    <div class="row">
                        <div class="col-md-3 my-4 ml-md-5" style="text-align: center;">
                            @if ( $article->book_image_path != null )
                                <img src="{{ asset('/storage/image/'.$article->book_image_path) }}" alt="本の画像" class="index-img img-thumbnail">
                            @else
                                <img src="{{ asset('/image/no_image.png') }}" alt="画像がありません" class="index-img img-thumbnail">
                            @endif
                        </div>
                        <div class="col-md-8 mt-3">
                            <div class="card-body">
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
                        該当する記事がありません
                    </div>
                </div>
            @endif
        </div>
        
    </div>
    
</div>
@endsection