<?php

namespace App;

use App\Citation;
use App\Comment;
use App\Postfield;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function user()
    {
        return @$this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function fields()
    {
        return $this->hasMany(PostField::class);
    }

    public function citations()
    {
        return $this->hasMany(Citation::class);
    }


}
