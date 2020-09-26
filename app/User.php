<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'icon_image_path', 'introduction',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    /**
     * パスワードリセット通知の送信
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)//パスワードリセット機能実装のため追加
    {
        $this->notify(new ResetPasswordNotification($token));
    }
    
    
    protected $guarded = array('id');
    
    
    /* いいね
    -------------------------------------------------*/
    public function like_articles()
    {
        return $this->belongsToMany('App\Article', 'likes');
    }
    
    
    /* ブックマーク
    -------------------------------------------------*/
    public function bookmark_articles()
    {
        return $this->belongsToMany('App\Article', 'bookmarks');
    }
    
    
    /* お気に入りユーザー
    -------------------------------------------------*/
    public function favorite_users()
    {
        return $this->belongsToMany('App\User', 'favorites', 'user_id', 'favorite_user_id');
    }
}


