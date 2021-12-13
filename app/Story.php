<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    //

    protected $guarded = [];

    // Get the user that owns the story.
    public function user(){
        return $this->belongsTo(User::class);
    }

    // ACCESSOR
    public function getStoryImageAttribute($value) {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
    }
}
