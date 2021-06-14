@extends('layouts.no_nav')

@section('title', 'プロフィール作成')

@section('css')<link href="{{ mix('css/profile_create.css') }}" rel="stylesheet">@endsection

@section('content')

<div class="container">
    
    <h1 class="content-title">プロフィール作成</h1>
    
    <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="profile">
            
            <label class="select-img">
                <img src="{{ asset('/image/no_image.png') }}" alt="プロフィール画像">
                <input type="file" name="icon_image">
            </label>
            
            <div class="text">
                <h2 class="user-name">{{ Auth::user()->name }}</h2>
                <textarea class="introduction" name="introduction" value="{{ old('introduction') }}" 
                    placeholder="自己紹介文：どんな本が好きなのか等、あなたのプロフィールを公開してみましょう。" ></textarea>
            </div>
            
        </div>
        
        <div class="action">
            <button type="submit" class="submit-btn">
                作成する
            </button>
            <a href="{{ action('HomeController@index') }}"><i>後でにする</i></a>
        </div>
        
    </form>
</div>

@endsection