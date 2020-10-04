@extends('layouts.nav')

@section('title', 'お気に入りユーザー')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-3">
            <div class="card">
                <div class="card-body pb-3 pt-4">
                    <div class="">
                        <h2 class="content-title mb-0">お気に入りユーザー</h2>
                    </div>
                    
                </div>
            </div>
            @foreach ( $favorite_users as $favorite_user )
            <a class="card no_gutters" href="{{ action('EachAccountController@index', ['id' => $favorite_user->id]) }}">
                <div class="row">
                    <div class="col-md-2 ml-md-4 my-3" style="text-align: center;">
                        @if ( $favorite_user->icon_image_path != null )
                            <img src="{{ asset('/storage/image/'.$favorite_user->icon_image_path) }}" alt="本の画像" class="favorite-user-img img-thumbnail ">
                        @else
                            <img src="{{ asset('/image/no_image.png') }}" alt="画像がありません" class="favorite-user-img img-thumbnail">
                        @endif
                    </div>
                    <div class="col-md-9">
                        <div class="card-body pt-2">
                            <div class="card-title text-right mb-0">
                                <favorite :initial-is-favorite='@json($favorite_user->isFavorite(Auth::user()))'
                                          :initial-count-favorites='@json($favorite_user->count_favorites)'
                                          :authorized='@json(Auth::check())'
                                          endpoint="{{ route('favorite', ['each_account' => $favorite_user]) }}">
                                </favorite>
                            </div>
                            <h4 class="card-title">{{ \Str::limit ( $favorite_user->name, 20 ) }}</h4>
                            <p class="card-title">{{ \Str::limit ( $favorite_user->introduction, 50 ) }}</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
　　</div>
</div>
@endsection