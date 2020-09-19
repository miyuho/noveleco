<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

use Illuminate\Support\Facades\Auth;//リセット機能実装のため追記
use Illuminate\Support\Facades\Password;//リセット機能実装のため追記

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    
    /**
     * パスワードリセットの間、使用されるガードの取得
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()//リセット機能実装のため追記
    {
        return Auth::guard('guard-name');
    }
    
    /**
     *パスワードリセットに使われるブローカの取得
     *
     * @return PasswordBroker
     */
    public function broker()//リセット機能実装のため追記
    {
        return Password::broker('name');
    }
}
