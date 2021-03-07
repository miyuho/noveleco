@extends('layouts.nav')

@section('title', 'プロフィール編集')

@section('css')<link href="{{ secure_asset('css/profile_edit.css') }}" rel="stylesheet">@endsection

@section('content')
<div class="container">
    
    <h1 class="content-title">プロフィール編集</h1>
    
    <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="profile">
            
            <div>
                <label class="select-img">
                    @if ( $user_form->icon_image_path != null )
                        <img src="{{ asset('/storage/image/'.$user_form->icon_image_path) }}" alt="プロフィール画像">
                        <input type="file" name="icon_image">
                    @else
                        <img src="{{ asset('/image/no_image.png') }}" alt="画像がありません">
                        <input type="file" name="icon_image">
                    @endif
                </label>
                
                <label class="delete-image">
                    <input type="checkbox" name="remove" value="true">画像を削除
                </label>
            </div>
            
            <div class="text">
                <h2 class="user-name">{{ Auth::user()->name }}</h2>
                
                @if ( $user_form->introduction != null )
                    <textarea class="form-control" name="introduction">{{ $user_form->introduction }}</textarea>
                @else
                    <textarea class="form-control" name="introduction" 
                        placeholder="自己紹介文：どんな本が好きなのか等記入して、プロフィールを公開してみましょう。" >{{ $user_form->introduction }}</textarea>
                @endif
            </div>
            
        </div>
        
        <div class="action">
            <input type="hidden" name="id" value="{{ $user_form->id }}">
            <button type="submit" class="submit-btn">
                更新する
            </button>
        </div>
        
    </form>
</div>

@endsection