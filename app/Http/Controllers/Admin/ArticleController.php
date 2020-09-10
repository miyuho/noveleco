<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Article;


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
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $article->image_path = basename($path);
        }else {
            $article->image_path = null;
        }
        
        /* 後で書き換え
        if (isset($form['image'])){
            $path = Storage::disk('s3')->putfile('/',$form['image'],'public');
            $article->image_path = Storage::disk('s3')->url($pash);
        }else {
            $article->image_path = null;
        }
        */
        
        unset($form['_token']);
        unset($form['image']);
        
        $article->fill($form);
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
