<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Article;
use App\Bookmark;
use Storage;

class BookmarkController extends Controller
{
    public function add(Request $request)
    {
        return view('admin.bookmark.index');
    }
    
    
    //ブックマーク機能
    public function bookmark(Request $request, Article $article)
    {
        $article->bookmark_users()->detach($request->user()->id);
        $article->bookmark_users()->attach($request->user()->id);

        return [
            'id' => $article->id,
            'countBookmarks' => $article->count_bookmarks,
        ];
    }

    public function unbookmark(Request $request, Article $article)
    {
        
        $article->bookmark_users()->detach($request->user()->id);

        return [
            'id' => $article->id,
            'countBookmarks' => $article->count_bookmarks,
        ];
    }
}
