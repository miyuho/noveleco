<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Article;
use Carbon\Carbon;
use Storage;


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
        
        if (isset($form['book_image'])) {
            $path = $request->file('book_image')->store('image', 'public');
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
        unset($form['book_image']);
        
        $article->fill($form);
        $article->user_id = $request->user()->id;
        $article->created_at = Carbon::now();
        $article->save();
        
        return redirect('admin/article/create');
    }
    
    
    public function show(Request $request)
    {
        $article = Article::find($request->id);
        if (empty($article)) {
            abort(404);
        }
        
        $user = User::find($article->user_id);
        
        return view('admin.article.show', [ 'article'=>$article, 'user' => $user ]);
    }
    
    
    public function edit(Request $request)
    {
        $article = Article::find($request->id);
        if (empty($article)) {
            abort(404);
        }
        
        return view('admin.article.edit', [ 'article_form'=>$article ]);
    }
    
    
    public function update(Request $request)
    {
        $this->validate($request, Article::$rules);
        $article = Article::find($request->id);
        $article_form = $request->all();
        
        if ($request->remove == 'true'){
            $article_form['book_image_path'] = null;
        } elseif ($request->file('book_image')){
            $path = $request->file('book_image')->store('public/image');
            $article_form['book_image_path'] = basename($path);
        } else {
            $article_form['book_image_path'] = $article->book_image_path;
        }
        
        unset($article_form['_token']);
        unset($article_form['remove']);
        unset($article_form['book_image']);
        
        $article->fill($article_form)->save();
        
        return view('admin.article.show', [ 'article'=>$article ]);
    }
    
    
    public function delete(Request $request)
    {
        $article = Article::find($request->id);
        $article->delete();
        return redirect('admin/mypage');
    }
}