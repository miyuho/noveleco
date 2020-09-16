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
        
        $cond_word = $request->cond_word;
        if ($cond_word != ''){
            $articles = Article::where('book_title', $cond_word)->get();
        } else{
            $articles = Article::all();
        }
        
        return view('home', ['articles'=>$articles, 'cond_word'=>$cond_word]);
        
        
    }
}
//後で複数のワードで検索できるように書き換える