<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    // needed for mass-assignment
    protected $guarded = [];

    // Get the user that owns the post.
    public function user(){
        return $this->belongsTo(User::class);
    }

    // MUTATOR
//    public function setPostImageAttribute($value){
//        $this->attributes['post_image'] = asset($value);
//    }

    // ACCESSOR
    public function getPostImageAttribute($value) {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
    }
}
