<?php

namespace App;
use App\Post;
use App\User;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    protected $fillable = array('user_id', 'body');

    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
