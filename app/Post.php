<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    // mass assignment for all the columns
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function headings() {
        return $this->hasMany(Heading::class);
    }

    public function getPostImageAttribute($value) {

        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }

        if (strpos($value, 'default_post_image') !== FALSE) {
            return asset('web/' . $value);
        }

        if(empty($value)){
            return asset('web/images/default_post_image.jpg');
        }

        return asset('storage/' . $value);
    }
}
