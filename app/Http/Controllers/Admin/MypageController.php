<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Article;
use Storage;

class MypageController extends Controller
{
    public function add(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);
        if (empty($user)) {
            abort(404);
        }
        
        $articles = Article::where('user_id', $id)->orderBy('created_at','desc')->get();
        
        return view('admin.mypage.index', [ 'user'=>$user, 'articles'=>$articles ]);
    }
    
}

