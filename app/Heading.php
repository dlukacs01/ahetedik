<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Heading extends Model
{
    //

    // mass assignment for all the columns
    protected $guarded = [];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function articles() {
        return $this->hasMany(Article::class);
    }
}
