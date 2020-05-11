<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\support\Facades\Notification;
use App\Notifications\commentNotification;

class CommentsController extends Controller
{
    public function show($postID)
    {
        $comments = Comment::where('post_id', $postID)->get();
        $post = Post::where('id', $postID)->firstOrFail();
        return view('posts.comments', [
            'post' => $post,
            'comments' => $comments
        ]);

    }

    public function create($postId)
    {
        if(Auth::user()) {
            return view('add_comment', [
                'id' => $postId
            ]);
        }
        return redirect('/login');

    }

    public function store($postId)
    {
        $post = Post::where('id', $postId)->firstOrFail();
        try {
            $this->validate(request(), ['body' => 'required | min:2']);
        } catch (ValidationException $e) {
            return redirect('/comments/'.$post->id.'/create')
            ->withInput(request()->input())
            ->withErrors(['body' => 'ERROR: Must enter a body!']);
        }
        $post->addComment(\request('body'));
        $followers = $post->followers->except(Auth::id());
        foreach ( $followers as $follower) {
            $status = 'addComment';
            $follower->notify(new commentNotification($status,$postId,Auth::user()->name));
        }
        return redirect('/comments/'.$postId);
    }
}
