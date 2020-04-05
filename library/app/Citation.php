<?php

namespace App;
use App\Post;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Citation extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->belongsTo(Pots::class);
    }
}
