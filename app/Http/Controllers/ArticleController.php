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
    
    //いいね機能
    public function like(Request $request, Article $article)
    {
        $article->like_user()->detach($request->user()->id);
        $article->like_user()->attach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }

    public function unlike(Request $request, Article $article)
    {
        
        $article->like_user()->detach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }
    
    //ブックマーク機能
    public function bookmark(Request $request, Article $article)
    {
        $article->bookmark_user()->detach($request->user()->id);
        $article->bookmark_user()->attach($request->user()->id);

        return [
            'id' => $article->id,
            'countBookmarks' => $article->count_bookmarks,
        ];
    }

    public function unbookmark(Request $request, Article $article)
    {
        
        $article->bookmark_user()->detach($request->user()->id);

        return [
            'id' => $article->id,
            'countBookmarks' => $article->count_bookmarks,
        ];
    }
    
}
