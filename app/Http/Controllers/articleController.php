<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\Comment;

use Validator;
use DB;

class articleController extends Controller
{
    public function articles(){

    	$articles = DB::table('articles')->select('id','title','author','created_at')->get();
    	return response()->json($articles);
    }

    public function article($article_id=null){

    	if($article_id==null){
    		return response()->json(['error'=>'Please add article id after the url.'],406);
    	}

    	$article = Article::find($article_id);
    	if($article==null){
    		return response()->json(['error'=>'article is not exist.'],404);
    	}
    	return $article;
    }

    public function create(Request $request,Article $new_article){

    	$validator = Validator::make($request->all(), [
            'title' => 'required|max:20',
            'author' => 'required|max:20',
            'content'=> 'required|max:8000'
        ]);

    	if($validator->fails()){
    		return response($validator->errors(),406);
    	}

    	$new_article->author =$request->input('author');
    	$new_article->title =$request->input('title');
    	$new_article->content =$request->input('content');

    	$new_article->save();

    	return response()->json(['result'=>'Create article success.']);
    }

    public function search($key_word=null){

    	if($key_word==null){
    		return response()->json(['error'=>'Please add your key word after the url.'],406);
    	}

    	$mysql_key_word = '%'.$key_word.'%';
    	
    	$related_articles = DB::table('articles')->where('content','like',$mysql_key_word)->select('id','title','author','content','created_at')->get();
    	$related_comments = DB::table('comments')->where('comment_content','like',$mysql_key_word)->select('id','comment_content','created_at')->get();


    	return response()->json(['related_articles'=>$related_articles,'related_comments'=>$related_comments]);
    	
    }
}
