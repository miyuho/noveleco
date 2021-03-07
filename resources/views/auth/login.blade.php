@extends('layouts.no_nav')

@section('title', 'ログイン')

@section('css')<link href="{{ secure_asset('css/login.css') }}" rel="stylesheet">@endsection

@section('content')
<div class="container">
    
    <h1 class="content-title">ログイン</h1>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="email">
            <label for="email">メールアドレス</label>
                <input id="email" type="email" class="@error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        </div>
        
        
        <div class="password"> 
            <label for="password">パスワード</label>
                <input id="password" type="password" class="@error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        </div>   
        
        
        <div class="form-check">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">
                次回から自動でログインする
            </label>
        </div>
        
      
        <button type="submit" class="submit-btn">
            ログインする
        </button>
        
        
        <!--@if (Route::has('password.request'))-->
        <!--    <a class="pl-2" href="{{ route('password.request') }}" style="color:#dbd6d3;">-->
        <!--        <i>パスワードをお忘れですか？</i>-->
        <!--    </a>-->
        <!--@endif-->
                
    </form>
                
</div>
@endsection
