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


Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/article', 'ArticleController@show');
Route::get('/each-account', 'EachAccountController@index');

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
    Route::get('account_config', 'Admin\ConfigController@index');
    Route::post('account_config/delete/{id}', 'Admin\ConfigController@delete')->name('account_delete');
    
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::post('profile/edit', 'Admin\ProfileController@update');
    
    Route::get('article', 'Admin\ArticleController@show');
    Route::get('article/create', 'Admin\ArticleController@add');
    Route::get('article/edit', 'Admin\ArticleController@edit');
    Route::post('article/create', 'Admin\ArticleController@create');
    Route::post('article/edit', 'Admin\ArticleController@update');
    Route::post('article/delete/{id}', 'Admin\ArticleController@delete')->name('article_delete');
    
    Route::get('mypage', 'Admin\MypageController@index');
    
    Route::get('favorite', 'Admin\FavoriteController@index');
    
    Route::get('bookmark', 'Admin\BookmarkController@index');
});

//いいね・ブックマーク機能
Route::group(['prefix'=>'article', 'middleware'=>'auth'], function(){
    Route::put('/{article}/like', 'Admin\LikeController@like')->name('like');
    Route::delete('/{article}/like', 'Admin\LikeController@unlike')->name('unlike');
    
    Route::put('/{article}/bookmark', 'Admin\BookmarkController@bookmark')->name('bookmark');
    Route::delete('/{article}/bookmark', 'Admin\BookmarkController@unbookmark')->name('unbookmark');
});
//お気に入り機能 
Route::group(['prefix'=>'each_account', 'middleware'=>'auth'], function(){
    Route::put('/{each_account}/favorite', 'Admin\FavoriteController@favorite')->name('favorite');
    Route::delete('/{each_account}/favorite', 'Admin\FavoriteController@unfavorite')->name('unfavorite');
});

Route::get('/home', 'HomeController@index')->name('home');
