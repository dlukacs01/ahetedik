<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //

    protected $guarded = [];

    // Get the user that owns the post.
    public function user(){
        return $this->belongsTo(User::class);
    }
    // Get the category that owns the work.
//    public function category(){
//        return $this->belongsTo(Category::class);
//    }

    // The categories that belong to the work.
    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    // ACCESSOR
    public function getWorkImageAttribute($value) {
        if(empty($value)) {
            return asset('web/images/work_image_default.jpg');
        }
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
    }
}
