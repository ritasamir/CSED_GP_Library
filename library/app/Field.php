<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public $table = "fields";

    public function posts(){
        return $this->belongsToMany(Post::class);
    }

}
