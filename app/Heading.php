<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Heading extends Model
{
    //

    // needed for mass-assignment
    protected $guarded = [];

    // Get the post that owns the heading.
    public function post(){
        return $this->belongsTo(Post::class);
    }

    // Get the articles for the heading.
    public function articles() {
        return $this->hasMany(Article::class);
    }
}
