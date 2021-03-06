<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Article;
use App\Like;
use App\Bookmark;
use Storage;

class ArticleController extends Controller
{
    public function show(Request $request)
    {
        $article = Article::find($request->id);
        if (empty($article)) {
            abort(404);
        }
        
        $user = User::find($article->user_id);
      
        return view('article.show', [ 'article'=>$article, 'user'=>$user]);
        
    }
    
}
