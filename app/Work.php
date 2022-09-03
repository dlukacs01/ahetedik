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

        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }

        if (strpos($value, 'work_image_default') !== FALSE) {
            return asset('web/' . $value);
        }

        return asset('storage/' . $value);
    }
}
