<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => "This is  a post",
        'abstract'=> "This an abstract, This an abstract, This an abstract, 
             This an abstract, This an abstract, This an abstract, This an abstract ",
        'doc_url' => "www.google.com",
        'user_id' => '1',
        'approved' => '1',
    ];
});
