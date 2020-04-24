<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Notification;
use App\Notifications\postApproved;
use App\Post;
use App\Postfield;
use App\Citation;

class PostsController extends Controller
{
    public function show($id)
    {
        $post = Post::where('id', $id)->firstOrFail();
        return view('post', [
            'post' => $post
        ]);
    }
    public function showUnapproved()
    {
        $posts = Post::where('approved', 0)->get();
        if ($posts->count() == 0){
        	return view('pending_posts_empty');
        }else {
        return view('pending_posts', [
            'posts' => $posts
        ]);
    	}
    }
     public function approvePost(Request $request)
    {
    	$id=$request->input('id');
        $post = Post::where('id', $id)->update(['approved' => 1]);
        $post =  Post::where('id', $id)->firstOrFail();
        //send notification to users
        foreach($post->citations as $citation){
        	$status = 'approved';
            $citation->user->notify(new postApproved($status,$id));
        }

    	return redirect()->back();
    }
    public function disapprovePost(Request $request)
    {
    	$id=$request->input('id');
    	$post =  Post::where('id', $id)->firstOrFail();
    	//send notification to users
        foreach($post->citations as $citation){
        	$status = 'disapproved';
            $citation->user->notify(new postApproved($status,$id));
        }
        Post::where('id', $id)->delete();
        
    	return redirect()->back();
    }
}
