<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //

    // mass assignment for all the columns
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function heading(){
        return $this->belongsTo(Heading::class);
    }
}
