<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    //
    public function show()
    {
        $user = Auth::user();
        $posts = $user->posts()->where('approved', 1)->latest()->get();
        return view('users.profile', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function update_avatar(Request $request)
    {

        $user = Auth::user();
        if ($request->hasFile('profile_img')) {
            $avatar = $request->file('profile_img');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));

            $user->profile_img = $filename;
            $user->save();

        }
        $posts = $user->posts()->latest()->get();
        return view('users.profile', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function visit($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $posts = $user->posts()->where('approved', 1)->latest()->get();
        return view('users.profile', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

}
