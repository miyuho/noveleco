@extends('layouts.nav')

@section('title', '新規作成')

@section('css')<link href="{{ mix('css/article_create.css') }}" rel="stylesheet">@endsection

@section('content')
<div class="container">
    
    <h1 class="content-title">新規作成</h1>
    
    <form action="{{ action('Admin\ArticleController@create') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="top">
            
            <label class="select-img">
                <img src="{{ asset('/image/no_image.png') }}" alt="本の画像">
                <input type="file" name="book_image">
            </label>
            
            <div class="top-txt">
                <div class="book_title">
                    <input type="text" placeholder="本のタイトル" name="book_title" value="{{ old('book_title') }}" required>
                </div>
                <div class="author">
                    <input type="text" placeholder="本の著者" name="author" value="{{ old('author') }}" required>
                </div>
                <div class="subtitle">
                    <input type="text" placeholder="記事のタイトル" name="subtitle" value="{{ old('subtitle') }}" required>
                </div>
            </div>
        </div>
        
        <div class="bottom">
            <textarea class="body" rows="30" placeholder="おすすめポイントを記入しましょう！" name="body" value="{{ old('body') }}" required></textarea>
            <button type="submit" class="submit-btn">
                投稿する
            </button>
        </div>
        
    </form>

</div>

@endsection