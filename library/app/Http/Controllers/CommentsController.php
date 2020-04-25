<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class CommentsController extends Controller
{
    public function show($postID)
    {
        $comments = Comment::where('post_id', $postID)->get();
        $post = Post::where('id', $postID)->firstOrFail();
        return view('comments', [
            'post' => $post,
            'comments' => $comments
        ]);

    }

    public function create($postId)
    {
        return view('add_comment', [
            'id' => $postId
        ]);
    }

    public function store($postId)
    {
        $post = Post::where('id', $postId)->firstOrFail();
        try {
            $this->validate(request(), ['body' => 'required | min:2']);
        } catch (ValidationException $e) {
            printf($e->getMessage());
        }
        $post->addComment(\request('body'));
        return $this->show($postId);
    }
}
