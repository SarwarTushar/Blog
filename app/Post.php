<?php

namespace App;
use App\Tag;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    function comments(){
        return $this->hasMany('App\Comment')->orderBy('id','desc');
    }
}


