<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function create()
    {
        return view('admin.article.create');
    }
    
    public function show()
    {
        return view('admin.article.show');
    }
    
    public function edit()
    {
        return view('admin.article.edit');
    }
    
    public function update()
    {
        return redirect('admin/profile/edit');
    }
}
