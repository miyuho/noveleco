@extends('layouts.nav')

@section('title', 'アカウント設定')

@section('css')<link href="{{ mix('css/account_config.css') }}" rel="stylesheet">@endsection

@section('content')
<div class="container">
    
    <h1 class="content-title">アカウント設定</h1>
    
    <form class="account_delete" method="POST" action="{{ route('account_delete', ['id' => $user->id]) }}">
        @csrf
        <h2 class="item-name"><i class="fa fa-trash pr-1"></i>
            アカウント削除
        </h2>
        
        <div class="item-contents">
            <p class="mb-0">アカウントを削除すると、投稿した記事など、全てのデータが削除されます。</p>
            <p class="caution">一度削除すると元には戻せませんのでご注意下さい。</p>
            
            <p>ログイン中ユーザー：{{$user->name}}</p>
            <input class="submit-btn" type="submit" value="アカウントを削除する" onclick="return confirm('ユーザー名：{{$user->name}} を削除して宜しいですか？');">
        </div>
    </form>
   
</div>
@endsection