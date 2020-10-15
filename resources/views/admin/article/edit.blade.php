@extends('layouts.nav')

@section('title', '記事の編集')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="border-bottom pb-1 mb-4">
                        <h2 class="content-title">記事の編集</h2>
                    </div>
                    <form action="{{ action('Admin\ArticleController@update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        @if( count($errors) > 0 )
                          <ul>
                            @foreach( $errors->all() as $e )
                            <li>{{ $e }}</li>
                            @endforeach
                          </ul>
                        @endif
                        
                        <div class="row form-group">
                            <!--<label cass="col-md-4 inline-block">-->
                            <!--    <div class="ml-md-3">-->
                            <!--        <img src="{{ asset('/image/no_image.png') }}" alt="本の画像" class="select-img img-thumbnail"></img>-->
                            <!--        <input type="file" class="form-control-file d-none" name="book_image_path" vulue="{{ old('book_image_path') }}">-->
                            <!--    </div>-->
                            <!--</label>-->
                            <!-- できれば画像のプレビュー追加 -->
                            <div class="col-md-4">
                                <label class="ml-md-3" style="text-align:center;">
                                    @if ($article_form->book_image_path != null)
                                        <img src="{{ asset('/storage/image/'.$article_form->book_image_path) }}" alt="本の画像" class="select-img img-thumbnail">
                                        <input type="file" class="form-control-file" name="book_image">
                                    @else
                                        <img src="{{ asset('/image/no_image.png') }}" alt="本の画像" class="select-img img-thumbnail">
                                        <input type="file" class="form-control-file" name="book_image">
                                    @endif
                                </label>
                                <div class="form-check text-center">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="my-3">
                                    <input type="text" class="form-control" placeholder="本のタイトル" name="book_title" value="{{ $article_form->book_title }}">
                                </div>
                                <div class="my-3">
                                    <input type="text" class="form-control" placeholder="著者" name="author" value="{{ $article_form->author }}">
                                </div>
                                <div class="my-3">
                                    <input type="text" class="form-control" placeholder="記事のタイトル" name="subtitle" value="{{ $article_form->subtitle }}">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 border-top pt-3">
                                <textarea class="form-control" rows="30" placeholder="" name="body">{{ $article_form->body }}</textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="hidden" name="id" value="{{ $article_form->id }}">
                            <input type="submit" class="submit-btn btn" value="更新する">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection