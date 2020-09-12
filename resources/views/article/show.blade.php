@extends('layouts.nav')

@section('title', '{{$article->book_title}}')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mx-md-4 mb-4">
                            @if ( $article->book_image_path != null )
                                <img src="{{ asset('/storage/image/'.$article->book_image_path) }}" alt="本の画像" class="card-img img-thumbnail ">
                            @else
                                <img src="{{ asset('/image/no_image.png') }}" alt="画像がありません" class="card-img img-thumbnail">
                            @endif
                        </div>
                        
                        <div claas="col-md-6 mb-3">
                            <div class="my-3">
                                <h2>{{ $article->book_title }}</h2>
                            </div>
                            <div class="my-3">
                                <p>{{ $article->author }}</p>
                            </div>
                            <div class="my-3">
                                <p>{{ $article->subtitle }}</p>
                            </div>
                        </div>
                        
                        <div class="col-12 pt-3 border-top">
                            {{ $article->body }}
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection