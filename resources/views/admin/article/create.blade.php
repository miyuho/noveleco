@extends('layouts.nav')

@section('title', '新規作成')

@section('css')<link href="{{ mix('css/article_create.css') }}" rel="stylesheet">@endsection

@section('content')
<div class="container">
    
    <h1 class="content-title">新規作成</h1>
    
    <form action="{{ action('Admin\ArticleController@create') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        @if( count($errors) > 0 )
          <ul class="pt-3">
            @foreach( $errors->all() as $e )
                <li class="error-message">{{ $e }}</li>
            @endforeach
          </ul>
        @endif
        
        <div class="top">
            
            <label class="select-img">
                <img src="{{ asset('/image/no_image.png') }}" alt="本の画像">
                <input type="file" name="book_image">
            </label>
            
            <div class="top-txt">
                <div class="book_title">
                    <input type="text" placeholder="本のタイトル" name="book_title" value="{{ old('book_title') }}">
                </div>
                <div class="author">
                    <input type="text" placeholder="著者" name="author" value="{{ old('author') }}">
                </div>
                <div class="subtitle">
                    <input type="text" placeholder="記事のタイトル" name="subtitle" value="{{ old('subtitle') }}">
                </div>
            </div>
        </div>
        
        <div class="below">
            <textarea class="body" rows="30" placeholder="" name="body" value="{{ old('body') }}"></textarea>
            <button type="submit" class="submit-btn">
                投稿する
            </button>
        </div>
        
    </form>

</div>

@endsection