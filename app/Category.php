<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $guarded = [];

    // Get the works for the category.
    public function works() {

        return $this->hasMany(Work::class);

    }
    // ACCESSOR
    public function getCategoryImageAttribute($value) {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
    }
}
