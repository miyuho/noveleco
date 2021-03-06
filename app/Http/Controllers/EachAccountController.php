<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Article;
use Storage;

class EachAccountController extends Controller
{
    public function each_account(Request $request)
    {
        $each_account = User::find($request->id);
        if (empty($each_account)) {
            abort(404);
        }
        
        $articles = Article::where('user_id', $each_account->id)->orderBy('created_at','desc')->get();
        
        return view('each_account', [ 'each_account'=>$each_account, 'articles'=>$articles ]);
    }
}
