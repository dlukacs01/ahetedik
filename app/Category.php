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
}
