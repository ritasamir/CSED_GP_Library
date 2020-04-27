<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Notification;
use App\Notifications\postApproved;
use App\Post;
use DB;

use App\Postfield;
use App\Citation;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class PostsController extends Controller
{
    public function show($id)
    {
        $post = Post::where('id', $id)->firstOrFail();
        return view('posts.post', [
            'post' => $post,
        ]);
    }

    public function showUnapproved()
    {
        $posts = Post::where('approved', 0)->get();
        if ($posts->count() == 0) {
            return view('pending_posts_empty');
        } else {
            if (Auth::user()->isTS) {
                return view('pending_posts', [
                    'posts' => $posts
                ]);
            } else {
                return view('posts.unapproved_posts', [
                    'posts' => $posts
                ]);
            }

        }
    }


    public function approvePost(Request $request)
    {
        $id = $request->input('id');
        $post = Post::where('id', $id)->update(['approved' => 1]);
        $post = Post::where('id', $id)->firstOrFail();
        //send notification to users
        foreach ($post->citations as $citation) {
            $status = 'approved';
            $citation->user->notify(new postApproved($status, $id));
        }

        return redirect()->back();
    }

    public function disapprovePost(Request $request)
    {
        $id = $request->input('id');
        $post = Post::where('id', $id)->firstOrFail();
        //send notification to users
        foreach ($post->citations as $citation) {
            $status = 'disapproved';
            $citation->user->notify(new postApproved($status, $id));
        }
        Post::where('id', $id)->delete();

        return redirect()->back();
    }

    public function create()
    {

        $fields = DB::select('SELECT * from fields');
        return view('posts.create', [
            'user' => Auth::user(),
            'fields' => $fields
        ]);
    }

    public function store(Request $request)
    {
        //create post
        $user = Auth::user();
        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save(public_path('uploads/images/' . $filename));
        $post = Post::create([
            'user_id' => $user->id,
            'title' => $request->get('title'),
            'avatar' => $filename,
            'abstract' => $request->get('abstract'),
            'doc_url' => $request->get('link'),
            'approved' => $user->isTS == '0' ? '0' : '1',
        ]);
        Citation::create([
            'post_id' => $post->id,
            'user_id' => $user->id
        ]);
        if ($post) {
            $collaborators = $request->get('collaborators');
            $fields = $request->get('fields');
            foreach ($collaborators as $collaborator) {
                $user_s = User::where('name', $collaborator)->first();
                Citation::create([
                    'post_id' => $post->id,
                    'user_id' => $user_s->id
                ]);
            }
            $post->fields()->attach($fields);
        }
        //store post
        if ($post->approved == '1')
            return $this->show($post->id);
        else {
            return $this->showUnapproved();
        }
    }

    public function edit(Post $post)
    {

    }

    public function update(Request $request, Post $post)
    {

    }

    public function destroy(Post $post)
    {

    }

}
