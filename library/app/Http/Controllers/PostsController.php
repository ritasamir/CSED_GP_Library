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
        $citations = Citation::where('post_id', $id)->get();
        $users = array();
        foreach ($citations as $citation) {
            array_push($users, $citation->user_id);

        }
        return view('posts.post', [
            'post' => $post,
            'users_id'=>$users
        ]);
    }

    public function showUnapproved()
    {
        $user = Auth::user();
        $citations = Citation::where('user_id', $user->id)->get();
        $posts = array();
        foreach ($citations as $citation) {
            $post = $citation->post;
            if ($post->approved == 0 && $post->disapproved == 0) {
                array_push($posts, $post);
            }
        }

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

    public function showdisapproved()
    {

        $posts = Post::where('user_id', Auth::user()->id)->get();
        return view('posts.disapproved_posts', [
            'posts' => $posts
        ]);

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
            if (!$post->followers()->syncWithoutDetaching([$citation->user['id']])) {
                $post->followers()->attach($citation->user['id']);
            }
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
        $post->disapproved = '1';
        $post->save();

        return redirect()->back();
    }

    public function create()
    {
        $user = Auth::user();
        if ($user) {
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
        if ($avatar) {
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('uploads/images/' . $filename));
        }
        $fields = $request->get('fields');

        if (!$fields or !$request->get('title') or !$request->get('link') or !$request->get('abstract')) {
            return redirect('/posts')
                ->withInput($request->input())
                ->withErrors(['fields' => 'ERROR: Must enter fields!']);
        }
        $post = Post::create([
            'user_id' => $user->id,
            'title' => $request->get('title'),
            'avatar' => $avatar ? $filename : 'post1.png',
            'abstract' => $request->get('abstract'),
            'doc_url' => $request->get('link'),
            'approved' => $user->isTS == '0' ? '0' : '1',
        ]);

        $availableTS = 0;
        if ($post) {
            $collaborators = $request->get('collaborators');
            //check atleast one TS
            if ($user->isTS) {
                $availableTS = 1;
            }

            $user_ids = array();
            array_push($user_ids, $user->id);
            foreach ($collaborators as $collaborator) {
                $user_s = User::where('name', $collaborator)->first();
                //check if user exist
                if ($user_s) {
                    if ($user_s->isTS) {
                        $availableTS = 1;
                    }
                    array_push($user_ids, $user_s->id);
                }
            }
            if ($availableTS == 1) {
                foreach ($user_ids as $user_id) {
                    Citation::create([
                        'post_id' => $post->id,
                        'user_id' => $user_id
                    ]);
                    if ($post->approved == '1') {
                        if (!$post->followers()->syncWithoutDetaching([$user_id])) {
                            $post->followers()->attach($user_id);
                        }
                    }
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

    public function edit($id)
    {
        $user = Auth::user();
        if ($user) {
            $post = Post::where('id', $id)->firstOrFail();
            $fields = DB::select('SELECT * from fields');
            $collabs = DB::table('users')->join('citation', function ($join) use ($post) {
                $join->on('users.id', '=', 'citation.user_id');
                $join->on('citation.post_id', '=', DB::raw($post->id));
            })->get();
            return view('posts.edit', [
                'post' => $post,
                'user' => Auth::user(),
                'fields' => $fields,
                'collabs' => $collabs
            ]);
        } else {
            return redirect('/login');
        }

    }

    public function update(Request $request, $id)
    {

        // save the updated data
        $input = $request->all();
        $post = Post::find($id);
        $post->fill($input)->all();
        $avatar = $request->file('avatar');
        if ($avatar) {
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('uploads/images/' . $filename));
            $post->avatar = $filename;
        }

        $post->fields()->detach();
        $post->fields()->attach($request->fields);
        $availableTS = 0;
        $collaborators = $request->get('collaborators');
        //check atleast one TS
        $user = Auth::user();
        if ($user->isTS) {
            $availableTS = 1;
        }
//
        $user_ids = array();
        array_push($user_ids, $user->id);
        foreach ($collaborators as $collaborator) {
            $user_s = User::where('name', $collaborator)->first();
            //check if user exist
            if ($user_s) {
                if ($user_s->isTS) {
                    $availableTS = 1;
                }
                array_push($user_ids, $user_s->id);
            }
        }
        $old_ids = array();
        foreach ($post->citations()->get() as $citation) {
            array_push($old_ids, $citation->user_id);
        }
        $removeList = array_diff($old_ids, $user_ids);
        DB::table('citation')->whereIn('user_id', $removeList)->where('post_id', '=', $id)->delete();
        $addList = array_diff($user_ids, $old_ids);
        foreach ($addList as $user_id) {
            Citation::create([
                'post_id' => $post->id,
                'user_id' => $user_id
            ]);
        }

        $post->save();

        return redirect()->route('posts', [$post]);
    }

    public function destroy(Post $post)
    {

    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();

        return redirect('/posts/disapproved');


    }


}
