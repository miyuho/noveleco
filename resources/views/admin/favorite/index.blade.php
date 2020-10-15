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
                        <div class="card-body">
                            <h3 class="user-name mb-0">{{ \Str::limit ( $favorite_user->name, 30 ) }}</h3>
                            <p class="pt-2">{{ \Str::limit ( $favorite_user->introduction, 150 ) }}</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
            
            <!--該当するものが無ければメッセージを表示させる-->
            @if ( $favorite_users->isEmpty() )
                <div class="card">
                    <div class="card-body text-center">
                        お気に入り登録したユーザーはいません
                    </div>
                </div>
            @endif
        </div>
　　</div>
</div>
@endsection