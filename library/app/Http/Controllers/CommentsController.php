<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;



class CommentsController extends Controller
{
    public function show($postID){
        $comments = Comment::where('post_id',$postID)->get();
        $post = Post::where('id', $postID)->firstOrFail();
    	return view('comments', [
            'post' => $post, 
            'comments' => $comments
        ]);

    }
}
