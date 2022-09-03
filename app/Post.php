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

        return asset('storage/' . $value);
    }
}
