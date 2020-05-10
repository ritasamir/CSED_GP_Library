<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Postfield;
use App\User;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use function MongoDB\BSON\toJSON;
use function Sodium\add;

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

    public function show_results(Request $request) {
        $keyword = $request->input('keywords');
        $year = $request->input('year');
        $users_ids = User::select('id')->where([['name','LIKE','%'.$keyword.'%'], ['id', '!=', auth()->id()]])->get();
        if($users_ids) {
            $posts = array();
            if(isset($year)) {
                $posts = Post::whereIn('user_id', $users_ids)->where('created_at', 'LIKE', $year.'%')->get();
            } else {
                $posts = Post::whereIn('user_id', $users_ids)->get();
            }
        } else {
            if (isset($year)) {
                $posts = Post::where([['title', 'LIKE', '%'.$keyword .'%'], ['created_at', 'LIKE', $year.'%']])
                    ->orWhere([['abstract', 'LIKE', '%'.$keyword .'%'], ['created_at', 'LIKE', $year.'%']])->get();
            } else {
                $posts = Post::where('title', 'LIKE', '%'.$keyword .'%')
                    ->orWhere('abstract', 'LIKE', '%'.$keyword .'%')->get();

            }
        }
        if(count($posts) > 0)
            return view('/home', [
                'posts' => $posts
            ])->withMessage('The Search results for your query!')->withQuery ( $keyword );
        else return view ('/home', [
            'posts' => $posts
        ])->withMessage('No Details found. Try to search again !');
    }
}
