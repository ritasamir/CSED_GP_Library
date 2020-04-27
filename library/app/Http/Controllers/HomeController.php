<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Postfield;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::where('approved', 1)->latest()->get();
        return view('home', [
            'posts' => $posts
        ]);
    }
    public function search (Request $request){
        $q = $request->input('q');
        $user = User::where('name','LIKE','%'.$q.'%')->first();
        if($user){
            $posts = $user->posts;
        }else {
            $posts = Post::where('title','LIKE','%'.$q.'%')->orWhere('abstract','LIKE','%'.$q.'%')->get();
        }
        if(count($posts) > 0)
            return view('/home', [
                'posts' => $posts
            ])->withMessage('The Search results for your query!')->withQuery ( $q );
        else return view ('/home', [
                'posts' => $posts
            ])->withMessage('No Details found. Try to search again !');
    }
}
