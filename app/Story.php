<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    //

    // mass assignment for all the columns
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getStoryImageAttribute($value) {

        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }

        if (strpos($value, 'default_story_image') !== FALSE) {
            return asset('web/' . $value);
        }

        if (empty($value)) {
            return asset('web/images/default_story_image.jpg');
        }

        return asset('storage/' . $value);
    }
}
