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
Route::get('/posts/unapproved', 'PostsController@showUnapproved');
Route::get('/posts/disapproved', 'PostsController@showdisapproved')->name('posts.disapproved');
Route::get('/posts/{id}', 'PostsController@show')->name('posts');
Route::get('/posts/{id}/edit', 'PostsController@edit');
Route::post('/posts', 'PostsController@store');
Route::get('/posts', 'PostsController@create');
Route::put('/posts/{id}/update', 'PostsController@update')->name('posts.update');
Route::get('/posts/{id}/delete', 'PostsController@delete')->name('posts.delete');


Route::get('/comments/{id}', 'CommentsController@show');
Route::get('comments/{id}/create', 'CommentsController@create');
Route::post('comments/{id}/create', 'CommentsController@store');

Route::get('/profile/edit', 'UserController@editProfile')->name('userInfo.edit');
Route::put('/profile/update', 'UserController@update')->name('userInfo.update');
Route::get('/profile/{id}', 'UserController@show')->name('user.profile');
Route::post('/profile/{id}', 'UserController@update_avatar');
Route::get('/pendingPosts', 'PostsController@showUnapproved');
Route::get('/pendingPostsapproving', 'PostsController@approvePost');
Route::get('/pendingPostsdisapproving', 'PostsController@disapprovePost')->middleware('auth');
Route::get('/pendingPostsdisapproving', 'PostsController@disapprovePost')->middleware('auth');
Route::get('/notification', 'UserNotificationController@show')->middleware('auth');


Route::any('/fields', 'FieldController@store');
Route::any('/search', 'HomeController@search');
Auth::routes();



