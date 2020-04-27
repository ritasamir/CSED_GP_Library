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
        if($post->approved == 0) {
            return redirect()->back()->withError("This post is un-approved!");
        }
        return view('posts.post', [
            'post' => $post,
        ]);
    }

    public function showUnapproved()
    {
        $user = Auth::user();
        $citations = Citation::where('user_id', $user->id)->get();
        $posts = array();
        foreach($citations as $citation) {
            $post = $citation->post;
            array_push($posts, $post);
        }

        //$posts = Post::where('approved', 0)->get();
        if (count($posts) == 0) {
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
        $user = Auth::user();
        if($user) {
            $fields = DB::select('SELECT * from fields');
            return view('posts.create', [
                'user' => Auth::user(),
                'fields' => $fields
            ]);
        } else {
            return redirect('/login');
        }
    }

    public function store(Request $request)
    {

        //create post
        $user = Auth::user();

        $avatar = $request->file('avatar');
        if($avatar) {
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/images/posts' . $filename));
        }
        $fields = $request->get('fields');

        if(!$fields or !$request->get('title') or  !$request->get('link')or  !$request->get('abstract')) {
            return redirect('/posts')
            ->withInput($request->input())
            ->withErrors(['fields' => 'ERROR: Must enter fields!']);
        }
        $post = Post::create([
            'user_id' => $user->id,
            'title' => $request->get('title'),
            'avatar' => $avatar? $filename : 'post1.png',
            'abstract' => $request->get('abstract'),
            'doc_url' => $request->get('link'),
            'approved' => $user->isTS == '0' ? '0' : '1',
        ]);

        $availableTS = 0;
        if ($post) {
            $collaborators = $request->get('collaborators');
            //check atleast one TS
            if($user->isTS) {
                $availableTS = 1;
            }
           
            $user_ids =  array();
            array_push($user_ids, $user->id);
            foreach ($collaborators as $collaborator) {
                $user_s = User::where('name', $collaborator)->first();
                //check if user exist
                if($user_s) {
                    if($user_s->isTS) {
                        $availableTS = 1;
                    }
                    array_push($user_ids, $user_s->id);
                    // Citation::create([
                    //     'post_id' => $post->id,
                    //     'user_id' => $user_s->id
                    // ]);
                }
            }
            if($availableTS == 1) {
                foreach($user_ids as $user_id) {
                    Citation::create([
                        'post_id' => $post->id,
                        'user_id' => $user_id
                    ]);
                }

                $post->fields()->attach($fields);      
                if ($post->approved == '1')
                   return $this->show($post->id);
                else {
                   return $this->showUnapproved();
                }                
            } 
           
        } else {
            Post::destroy($post->id);
            return redirect('/posts')
            ->withInput($request->input())
            ->withErrors('Error in inputs');        
        }
        Post::destroy($post->id);
        return redirect('/posts')
        ->withInput($request->input())
        ->withErrors(['collabrators' => 'ERROR: User doesn not exist!']);
 
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
