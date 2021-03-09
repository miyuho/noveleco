@extends('layouts.nav')

@section('title', '記事の編集')

@section('css')<link href="{{ mix('css/article_edit.css') }}" rel="stylesheet">@endsection

@section('content')
<div class="container">
    
    <h1 class="content-title">記事の編集</h1>
    
    <form action="{{ action('Admin\ArticleController@update') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        @if( count($errors) > 0 )
          <ul class="pt-3">
            @foreach( $errors->all() as $e )
                <li class="error-message">{{ $e }}</li>
            @endforeach
          </ul>
        @endif
        
        <div class="top">
            <div>
                <label class="select-img">
                    @if ($article_form->book_image_path != null)
                        <img src="{{ $article_form->book_image_path }}" alt="本の画像">
                        <input type="file" name="book_image">
                    @else
                        <img src="{{ asset('/image/no_image.png') }}" alt="本の画像">
                        <input type="file" name="book_image">
                    @endif
                </label>
                <label class="delete-image">
                    <input type="checkbox" name="remove" value="true"> 画像を削除
                </label>
            </div>
                
            <div class="top-txt">
                <div class="book_title">
                    <input type="text" placeholder="本のタイトル" name="book_title" value="{{ $article_form->book_title }}">
                </div>
                <div class="author">
                    <input type="text" placeholder="著者" name="author" value="{{ $article_form->author }}">
                </div>
                <div class="subtitle">
                    <input type="text" placeholder="記事のタイトル" name="subtitle" value="{{ $article_form->subtitle }}">
                </div>
            </div>
        </div>
        
        <div class="below">
            <textarea class="body" rows="30" placeholder="" name="body">{{ $article_form->body }}</textarea>
            
            <input type="hidden" name="id" value="{{ $article_form->id }}">
            <button type="submit" class="submit-btn">
                更新する
            </button>
        </div>
        
    </form>

</div>

@endsection