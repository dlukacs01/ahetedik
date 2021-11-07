<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $guarded = [];

    // The roles that belong to the permission.
    public function roles(){
        return $this->belongsToMany(Role::class);
    }
    // The users that belong to the permission.
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
