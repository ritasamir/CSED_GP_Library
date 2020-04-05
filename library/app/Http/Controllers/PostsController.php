<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function show($post)
    {

        return view('home', [
            'user' => auth()->user()
        ]);

    }
}
