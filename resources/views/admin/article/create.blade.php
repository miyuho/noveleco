@extends('layouts.nav')

@section('title', '新規作成')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="border-bottom pb-1 mb-4">
                        <h2 class="content-title">新規作成</h2>
                    </div>
                    <form action="{{ action('Admin\ArticleController@create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        @if( count($errors) > 0 )
                          <ul>
                            @foreach( $errors->all() as $e )
                            <span style="color:red; font-size:13px;">
                                <li>{{ $e }}</li>
                                @endforeach
                            </span>
                          </ul>
                        @endif
                        
                        <div class="row form-group">
                            <label class="col-md-4">
                                <div class="ml-md-3">
                                    <img src="{{ asset('/image/no_image.png') }}" alt="本の画像" class="select-img img-thumbnail">
                                    <input type="file" class="form-control-file" name="book_image">
                                </div>
                            </label>
                            <div class="col-md-6 mb-3">
                                <div class="my-3">
                                    <input type="text" class="form-control" placeholder="本のタイトル" name="book_title" value="{{ old('book_title') }}">
                                </div>
                                <div class="my-3">
                                    <input type="text" class="form-control" placeholder="著者" name="author" value="{{ old('author') }}">
                                </div>
                                <div class="my-3">
                                    <input type="text" class="form-control" placeholder="記事のタイトル" name="subtitle" value="{{ old('subtitle') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 border-top pt-3">
                                <textarea class="form-control" rows="30" placeholder="" name="body" value="{{ old('body') }}"></textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="submit-btn btn" value="投稿する">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection