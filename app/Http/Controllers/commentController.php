<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\Comment;

use Validator;
use DB;

class commentController extends Controller
{
    public function comments($article_id){

    	$article = Article::find($article_id);
    	if($article==null){
    		return response()->json(['error'=>'Article is not exist.'],404);
    	}
    	$comments = DB::table('comments')->where('article_id',$article_id)->select('id','comment_content','created_at')->get();
    	return response()->json($comments);
    	
    }
    public function create(Request $request,Comment $new_comment){
    	
    	$validator = Validator::make($request->all(), [
            'article_id' => 'required|exists:articles,id',
            'comment_content' => 'required|max:150'
        ]);

    	if($validator->fails()){
    		return response($validator->errors(),406);
    	}

    	$new_comment->article_id =$request->input('article_id');
    	$new_comment->comment_content =$request->input('comment_content');
    	$new_comment->save();

    	return response()->json(['result'=>'Add comment success.']);
    }
}
