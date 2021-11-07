<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $guarded = [];

    // The permissions that belong to the role.
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }
    // The users that belong to the role.
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
