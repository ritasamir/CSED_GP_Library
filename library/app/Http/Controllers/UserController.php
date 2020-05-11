<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use JavaScript;

class UserController extends Controller
{
    //
    public function show($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $posts = $user->posts()->where('approved', 1)->latest()->get();
        return view('users.profile', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function update_avatar(Request $request, $id)
    {

        $user = User::where('id', $id)->firstOrFail();
        if ($request->hasFile('profile_img')) {
            $avatar = $request->file('profile_img');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));

            $user->profile_img = $filename;
            $user->save();

        }
        return $this->show($id);
    }

    public function editProfile()
    {
        $user = Auth::user();
        Javascript::put([
            'graduation_year' => $user->graduation_year
        ]);
        return view('users.edit', [
            'user' => $user,

        ], compact('graduation_year'));
    }

    public function update(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();
        $user->fill($input)->all();
        $user->save();
        $posts = $user->posts()->where('approved', 1)->latest()->get();
        return redirect()->route('user.profile', $user->id);
    }

}
