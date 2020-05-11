<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\Citation;
use App\User;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'title', 'abstract', 'doc_url', 'approved','avatar'
    ];
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function fields(){
        return $this->belongsToMany(Field::class);
    }
    public function citations(){
        return $this->hasMany(Citation::class);
    }
    public function followers(){
        return $this->belongsToMany(User::class, 'followers', 'post_id', 'user_id')->withTimestamps();
    }
    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'post_id')->withTimestamps();
    }
    public function addComment($body){
        if (! $this->followers()->syncWithoutDetaching([auth()->user()->id])) {
            $this->followers()->attach(auth()->user()->id);
        }        
        $this->comments()->create([
            'user_id'=>Auth::user()->getAuthIdentifier(),
            'body'=>$body
        ]);
    }


}
