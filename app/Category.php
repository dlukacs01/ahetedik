<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    // mass assignment for all the columns
    protected $guarded = [];

    public function works(){
        return $this->belongsToMany(Work::class);
    }

    public function getCategoryImageAttribute($value) {

        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }

        if (strpos($value, 'default_category_image') !== FALSE) {
            return asset('web/' . $value);
        }

        if(empty($value)){
            return asset('web/images/default_category_image.jpg');
        }

        return asset('storage/' . $value);
    }
}
