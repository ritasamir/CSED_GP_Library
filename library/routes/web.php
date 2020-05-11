<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Mail\VerifiedMail;
use App\Mail\UnverifiedMail;
use Illuminate\Support\Facades\URL;




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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index')->name('welcome');



// Route::get('/verifyEmail', function () {
//     Mail::to('sohaylamohammed734@gmail.com')->send(new VerifiedMail());
//     return new VerifiedMail();
// });

// Route::get('/unverifyEmail', function () {
    //    // Mail::to('sohaylamohammed734@gmail.com')->send(new VerifiedMail());
    //    $user =  factory(User::class)->create([
    //     'name' => 'sohayla',
    //     'isTS' => '1',
    //     'department' => 'csed',
    //     'phone_number' => '01258036758',
    //     'graduation_year' => '2020',
    //     'national_id' => '1253',
    // ]);
    //     $url = URL::to('home');
    //     return new UnverifiedMail($user,$url );

// });

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
Route::get('/register/verify/{id}/{confirmation_code}', 'UserController@verify');

Route::any('/search', 'HomeController@search');
Route::any('/show_results', 'HomeController@show_results');

Auth::routes();

Route::get('/admin', 'AdminController@admin')
    ->middleware('is_admin')
    ->name('admin');

Route::get('/users/pending', 'AdminController@pending')
    ->middleware('is_admin')
    ->name('admin.pending');

Route::any('/users/pending/verify', 'AdminController@verify')
    ->middleware('auth')
    ->middleware('is_admin')
    ->name('admin.verify');

Route::any('/users/pending/unverify', 'AdminController@unverify')
    ->middleware('is_admin')
    ->name('admin.unverify');



