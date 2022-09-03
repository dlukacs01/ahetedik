<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    // mass assignment for all the columns
    protected $guarded = [];

    public function users() {
        return $this->hasMany(User::class);
    }
}
