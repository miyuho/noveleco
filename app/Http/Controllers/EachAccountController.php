<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Article;
use Storage;

class EachAccountController extends Controller
{
    public function add(Request $request)
    {
        $user = User::find($request->id);
        if (empty($user)) {
            abort(404);
        }
        
        $articles = Article::where('user_id', $user->id)->orderBy('created_at','desc')->get();
        
        return view('each_account.index', [ 'user'=>$user, 'articles'=>$articles ]);
    }
}
