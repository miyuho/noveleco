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
    public function index()
    {
        $id = Auth::id();
        $user = User::find($id);
        
        $favorite_users = $user->favorite_users;
        
        return view('admin.favorite.index', [ 'favorite_users'=>$favorite_users ]);
    }
    
    //お気に入り機能
    public function favorite(Request $request, User $each_account)
    {
        $each_account->favorite_user()->detach($request->user()->id);
        $each_account->favorite_user()->attach($request->user()->id);
        
        return [
            'id' => $each_account->id,
            'countFavorites' => $each_account->count_favorites,
        ];
    }

    public function unfavorite(Request $request, User $each_account)
    {
        
        $each_account->favorite_user()->detach($request->user()->id);
        
        return [
            'id' => $each_account->id, 
            'countFavorites' => $each_account->count_favorites,
        ];
    }
    
}
