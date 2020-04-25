<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\Postfield;
use App\Citation;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function fields(){
        return $this->hasMany(PostField::class);
    }
    public function citations(){
        return $this->hasMany(Citation::class);
    }
    public function addComment($body){
        $this->comments()->create([
            'user_id'=>Auth::user()->getAuthIdentifier(),
            'body'=>$body
        ]);
    }

}
