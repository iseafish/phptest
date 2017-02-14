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

Route::get('/', function () {
    return view('welcome');
});

//1.Return articles list.
Route::get('api/v1/articles','articleController@articles');
//2.Return article by article id
Route::get('api/v1/article/{article_id?}','articleController@article');
//3.Return comments by article id
Route::get('api/v1/article/{article_id}/comments','commentController@comments');
//4.Create a new article
Route::post('api/v1/article/create','articleController@create');
//5.Create a new comment
Route::post('api/v1/comment/create','commentController@create');
//6.Search related articles and comments 
Route::get('api/v1/search/{key_word?}','articleController@search');
