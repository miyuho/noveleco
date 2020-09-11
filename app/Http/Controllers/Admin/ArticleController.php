<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Article;
use Carbon\Carbon;


class ArticleController extends Controller
{
    public function add()
    {
        return view('admin.article.create');
    }
    
    
    public function create(Request $request)
    {
        $this->validate($request, Article::$rules);
        $article = new Article;
        $form = $request->all();
        
        if (isset($form['book_image_path'])) {
            $path = $request->file('book_image_path')->store('public/image');
            $article->book_image_path = basename($path);
        }else {
            $article->book_image_path = null;
        }
        
        /* 後で書き換え
        if (isset($form['book_image_path'])){
            $path = Storage::disk('s3')->putfile('/',$form['book_image_path'],'public');
            $article->image_path = Storage::disk('s3')->url($pash);
        }else {
            $article->book_image_path = null;
        }
        */
        
        unset($form['_token']);
        unset($form['image']);
        
        $article->fill($form);
        $article->user_id = $request->user()->id;
        $article->created_at = Carbon::now();
        $article->save();
        
        return redirect('admin/article/create');
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
