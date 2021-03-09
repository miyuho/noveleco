@extends('layouts.no_nav')

@section('title', '新規アカウント作成')

@section('css')<link href="{{ mix('css/register.css') }}" rel="stylesheet">@endsection

@section('content')
<div class="container">
    
    <h1 class="content-title">新規アカウント作成</h1>
    
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <div class="name">
            <label for="name">名前</label>
                <input id="name" type="text" class="@error('name') is-invalid @enderror" 
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
        </div>
        
        
        <div class="email">
            <label for="email">メールアドレス</label>
                <input id="email" type="email" class="@error('email') is-invalid @enderror" 
                    name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
        </div>
        
        
        <div class="password">
            <label for="password">パスワード</label>
                <input id="password" type="password" class="@error('password') is-invalid @enderror" 
                    name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
        </div>
        
        
        <div class="password-confirm">
            <label for="password-confirm">パスワード確認</label>
                <input id="password-confirm" type="password"
                    name="password_confirmation" required autocomplete="new-password">
        </div>
        
        <div class="action">
            <button type="submit" class="submit-btn">
                登録する
            </button>
        </div>
        
    </form>
</div>
@endsection
