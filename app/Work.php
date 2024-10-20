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

        // external URLs
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }

        // image
        if(strpos($value, 'default_work_image') === FALSE && !empty($value)) {
            return asset('storage/' . $value);
        }

        // avatar
        if(strpos($this->user->avatar, 'default_avatar') === FALSE && !empty($this->user->avatar)) {
            return $this->user->avatar;
        }

        // default
        if (strpos($value, 'default_work_image') !== FALSE) {
            return asset('web/' . $value);
        }

        // null
        if (empty($value)) {
            return asset('web/images/default_work_image.jpg');
        }

        return asset('storage/' . $value);
    }
}
