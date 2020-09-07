<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('home');
});*/

Auth::routes();

Route::get('/', 'HomeController@index');
//registerやloginのページへ飛ぶためのルーティングも書いておくべき？
Route::get('/article', 'ArticleController@show');
Route::get('/each-account', 'EachAccountController@index');


Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
    //Route::get('', '');アカウント設定ページ
    Route::get('profile/create', 'Admin\ProfileController@create');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    
    Route::get('article', 'Admin\ArticleController@show');
    Route::get('article/create', 'Admin\ArticleController@create');
    Route::get('article/edit', 'Admin\ArticleController@edit');
    
    Route::get('mypage', 'Admin\MypageController@index');
    
    Route::get('favorite', 'Admin\FavoriteController@index');
    
    Route::get('bookmark', 'Admin\BookmarkController@index');
});

Route::get('/home', 'HomeController@index')->name('home');
