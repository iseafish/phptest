<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*//1.Return article list.
Route::middleware('auth:api')->get('articles','articleController@articles');
//2.Return article by article id
Route::middleware('auth:api')->get('article/{article_id}','articleController@article');
//3.Return comments by article id
Route::middleware('auth:api')->get('comments/{article_id}','commentController@comments');
//4.Create a new article
Route::middleware('auth:api')->post('article/create','articleController@create');
//5.Create a new comment
Route::middleware('auth:api')->post('comment/create','commentController@create');
//6.Search related article articles and comments 
Route::middleware('auth:api')->get('search/{key_word}','articleController@search');
*/