<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

use DB;

class CommentController extends Controller
{
    public function getRequest(){
    	return 213;
    }
       public function postRequest(Request $request){
    			
    	$post =  new comment;
    	$post->user_id = '1';
    	$post->comment = $request->comment;
    	$post->save();
    	return $request->all();

    }
}
