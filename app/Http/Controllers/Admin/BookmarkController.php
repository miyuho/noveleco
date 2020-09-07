<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookmarkController extends Controller
{
    public function index()
    {
        return view('admin.bookmark.index');
    }
}
