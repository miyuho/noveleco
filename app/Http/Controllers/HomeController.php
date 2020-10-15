<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     
    //未ログインでもhomeを表示する
    /*public function __construct()
    {
       $this->middleware('auth');
    }*/


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
        $q = $request->q;
        
        if ($q != '') {
            $_q = str_replace('　', ' ', $q);
            $_q = preg_replace('/\s(?=\s)/', '', $_q);
            $_q = trim($_q);
            $_q = str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $_q);
            $cond_words = array_unique(explode(' ', $_q));
            
            $query = Article::query();
            foreach ($cond_words as $cond_word){
                $query->where(function($_query) use($cond_word){
                    $_query->where('book_title', 'LIKE', "%{$cond_word}%")
                          ->orWhere('author', $cond_word)
                          ->orWhere('subtitle', 'like', "%{$cond_word}%")
                          ->orWhere('body', 'like', "%{$cond_word}%");
                });
            }
            $articles = $query->orderBy('created_at','desc')->get();
            
        } else{
             $articles = Article::orderBy('created_at','desc')->get();
        }
        
        return view('home', ['articles'=>$articles, 'q'=>$q]);
        
        
    }
}
