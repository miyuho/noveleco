<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Article;
use App\Favorite;
use Storage;

class FavoriteController extends Controller
{
    public function add()
    {
        return view('admin.favorite.index');
    }
    
    //お気に入り機能
    public function favorite(Request $request, User $user)
    {
        $user->favorite_users()->detach($request->user()->id);
        $user->favorite_users()->attach($request->user()->id);

        return [
            'id' => $user->id,
            'countFavorites' => $user->count_favorites,
        ];
    }

    public function unfavorite(Request $request, User $user)
    {
        
        $user->favorite_users()->detach($request->user()->id);

        return [
            'id' => $user->id,
            'countFavorites' => $user->count_favorites,
        ];
    }
}
