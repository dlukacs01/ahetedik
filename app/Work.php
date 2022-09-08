<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //

    // mass assignment for all the columns
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function getWorkImageAttribute($value) {

        // there is an uploaded image
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }

        // no image but there is avatar
        if(strpos($value, 'default_work_image') !== FALSE and strpos($this->user->avatar, 'default_avatar') === FALSE) {
            return $this->user->avatar;
        }

        // no image, no avatar
        if (strpos($value, 'default_work_image') !== FALSE) {
            return asset('web/' . $value);
        }

        return asset('storage/' . $value);
    }
}
