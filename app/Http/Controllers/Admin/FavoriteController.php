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
    public function favorite(Request $request, User $each_account)
    {
        $each_account->favorite_users()->detach($request->user()->id);
        $each_account->favorite_users()->attach($request->user()->id);
        
        return [
            'id' => $each_account->id,
            'countFavorites' => $each_account->count_favorites,
        ];
    }

    public function unfavorite(Request $request, User $each_account)
    {
        
        $each_account->favorite_users()->detach($request->user()->id);
        
        return [
            'id' => $each_account->id, 
            'countFavorites' => $each_account->count_favorites,
        ];
    }
    
}
