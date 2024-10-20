<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function PHPUnit\Framework\isEmpty;

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

        // uploaded image
        if(strpos($value, 'default_work_image') === FALSE && !isEmpty($value)) {
            return asset('storage/' . $value);
        }

        // avatar
        if(strpos($this->user->avatar, 'default_avatar') === FALSE && !isEmpty($value)) {
            return $this->user->avatar;
        }

        // default
        if (strpos($value, 'default_work_image') !== FALSE) {
            return asset('web/' . $value);
        }

        // no default
        if (isEmpty($value)) {
            return asset('web/' . 'images/default_work_image.jpg');
        }

        return asset('storage/' . $value);
    }
}
