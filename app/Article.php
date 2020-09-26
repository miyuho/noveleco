<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array (
    'book_title' => 'required',
    'author' => 'required',
    'subtitle' => 'required',
    'body' => 'required',
    );
    
    
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }
    
    
    //いいね機能
    public function like_user(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }
    
    public function isLikedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->like_user->where('id', $user->id)->count()
            : false;
    }
    
    public function getCountLikesAttribute(): int
    {
        return $this->like_user->count();
    }
    
    //ブックマーク機能
    public function bookmark_user(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'bookmarks')->withTimestamps();
    }
    
    public function isBookmarkedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->bookmark_user->where('id', $user->id)->count()
            : false;
    }
    
    public function getCountBookmarksAttribute(): int
    {
        return $this->bookmark_user->count();
    }
}
