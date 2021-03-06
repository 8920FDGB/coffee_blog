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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// 認証系のルーティング（ユーザー登録、ログイン・ログアウト）
Auth::routes();

// 記事関連のルーティング
Route::get('/', 'ArticleController@index')->name('articles.index');
Route::resource('/articles', 'ArticleController')->except(['index', 'show'])->middleware('auth');
Route::resource('/articles', 'ArticleController')->only(['show']);
// いいね機能のルーティング
Route::prefix('articles')->name('articles.')->group(function () {
    Route::put('/{article}/like', 'ArticleController@like')->name('like')->middleware('auth');
    Route::delete('/{article}/like', 'ArticleController@unlike')->name('unlike')->middleware('auth');
});

// ユーザー関連のルーティング
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{id}', 'UserController@show')->name('show');
    Route::middleware(['auth'])->group(function () {
        Route::get('/{id}/edit', 'UserController@edit')->name('edit');
        Route::put('/{id}', 'UserController@update')->name('update');
        Route::put('/{id}/follow', 'UserController@follow')->name('follow');
        Route::delete('/{id}/follow', 'UserController@unfollow')->name('follow');
    });
});
