<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Postfield;
use App\Citation;

class PostsController extends Controller
{
    public function show($id){
        $post = Post::where('id',$id)->firstOrFail();
    	return view('post', [
            'post' => $post
        ]);
    }
}
