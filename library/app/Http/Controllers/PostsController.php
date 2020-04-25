<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Notification;
use App\Notifications\postApproved;
use App\Post;
use DB;

use App\Postfield;
use App\Citation;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    public function show($id)
    {
        $post = Post::where('id', $id)->firstOrFail();
        return view('posts.post', [
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

    public function create() {

        $fields = DB::select('SELECT DISTINCT fname FROM postfields');
        // foreach($fields as $field){
        //   dd($field->fname);
        // }
        return view('posts.create', [
            'fields' => $fields,
        ]);
    }

    public function store(Request $request) {
        //create post
        dd($request);
        $user = Auth::user();
        $post = Post::create([
            'user_id' => $user->id,
            'title' => $request->get('title'),
            'abstract'  => $request->get('abstract'),
            'doc_url' => $request->get('link'),
            'approved' => '1'
        ]);
       if($post)
        {
            $fnames = explode(',',$request->get('fields'));
            // $fieldnames = [];
            // foreach($fnames as $fname)
            // {

            //     // $tag = App\Tag::firstOrCreate(['name'=>$tagName]);
            //     // if($tag)
            //     // {
            //     //   $tagIds[] = $tag->id;
            //     // }


            // }
            $post->fields()->sync($fnames);
            $avatar = $request->get('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/images/posts/' . $filename));
            $post->avatar = $avatar;
        }
        //store post
        $post.save();
        return redirect('/posts/{$post->id}');
    }

    public function edit(Post $post) {

    }
    public function update(Request $request, Post $post) {

    }

    public function destroy(Post $post) {

    }
}
