@extends('layouts.nav')

@section('title', 'マイページ')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-3">
            <div class="user-profile card">
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
                              <a class="btn" href="{{ action('Admin\ProfileController@edit') }}">プロフィール編集</a>
                              <i class="icon-favorite fas fa-star mr-2"><span class="pl-1" style="color:#7b7b7b;">{{ $user->count_favorites }}</span></i>
                            </div>
                            <div class="my-3">
                                <h2>{{ $user->name }}</h2>
                            </div>
                            <div class="my-3">
                                <p>{!! nl2br ($user->introduction) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ( $articles as $article )
            <form method="post" action="admin/article/delete/1">
            @csrf
            <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("君は本当に削除するつもりかい？");'>
            </form>
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
                            <div class="card-title d-flex justify-content-end text-right mb-0">
                                
                                    <button type="button" 
                                               class="btn" data-toggle="modal" data-target="#exampleModal">削除</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">記事の削除</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body text-left">
                                            投稿記事を削除します。削除してよろしいですか？
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
                                            <button type="button" class="btn btn-primary">はい</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                
                                <div class="mx-2 mt-2">
                                    <i class="icon-like fas fa-heart"><span class="pl-1" style="color:#7b7b7b;">{{ $article->count_likes }}</span></i>
                                </div>
                            </div>
                            <h4 class="card-title">{{ \Str::limit ( $article->book_title, 50 ) }}</h4>
                            <p class="card-title">{{ \Str::limit ( $article->author, 50 ) }}</p>
                            <p class="card-title subtitle"><i>「{{ \Str::limit ( $article->subtitle, 100 ) }}」</i></p>
                            <p class="card-title">{{ \Str::limit ( $article->body, 150 ) }}</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
            
        </div>
　　</div>
　　
</div>
@endsection