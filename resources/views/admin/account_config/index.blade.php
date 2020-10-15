@extends('layouts.nav')

@section('title', 'アカウント設定')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            
            <div class="card">
                <div class="card-body">
                    <div class="border-bottom pb-1 mb-4">
                        <h2 class="content-title">アカウント設定</h2>
                    </div>
                    <form method="POST" action="{{ route('account_delete', ['id' => $user->id]) }}">
                        @csrf
                        <div class="account_delete">
                            <h4 class="pl-2"><i class="fa fa-trash pr-1"></i>
                                アカウント削除
                            </h4>
                            <div class="row justify-content-center">
                                <div class="col-md-11">
                                    <p>
                                        アカウントを削除すると、投稿した記事など、全てのデータが削除されます。<br>
                                        <span style="color:#ff6363;">一度削除すると元には戻せませんのでご注意下さい。</span>
                                    </p>
                                    <p>ログイン中ユーザー：{{$user->name}}</p>
                                    <input type="submit" value="アカウントを削除する" class="btn submit-btn" onclick="return confirm('ユーザー名：{{$user->name}} を削除して宜しいですか？');">
                                </div>
                            </div>
                            
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection