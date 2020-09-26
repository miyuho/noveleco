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
}
