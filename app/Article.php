<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //

    // needed for mass-assignment
    protected $guarded = [];

    // Get the heading that owns the article.
    public function heading(){
        return $this->belongsTo(Heading::class);
    }
    // Get the user that owns the article.
    public function user(){
        return $this->belongsTo(User::class);
    }
}
