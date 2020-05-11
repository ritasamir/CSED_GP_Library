<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts/{id}', 'PostsController@show');
Route::post('/posts', 'PostsController@store');
Route::get('/posts', 'PostsController@create');
Route::get('/posts/unapproved', 'PostsController@showUnapproved');

Route::get('/comments/{id}', 'CommentsController@show');
Route::get('comments/{id}/create', 'CommentsController@create');
Route::post('comments/{id}/create', 'CommentsController@store');

Route::get('/profile', 'UserController@show');
Route::post('/profile', 'UserController@update_avatar');
Route::get('/pendingPosts', 'PostsController@showUnapproved');
Route::get('/pendingPostsapproving', 'PostsController@approvePost');
Route::get('/pendingPostsdisapproving', 'PostsController@disapprovePost')->middleware('auth');
Route::get('/pendingPostsdisapproving', 'PostsController@disapprovePost')->middleware('auth');
Route::get('/notification', 'UserNotificationController@show')->middleware('auth');

Route::any('/search', 'HomeController@search');
Route::any('/show_results', 'HomeController@show_results');

Auth::routes();



