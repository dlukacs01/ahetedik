<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'avatar', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    // ACCESSOR
    public function getAvatarAttribute($value) {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
    }

    // Get the posts for the user.
    public function posts(){
        return $this->hasMany(Post::class);
    }

    // Get the works for the user.
    public function works(){
        return $this->hasMany(Work::class);
    }

    // The permissions that belong to the user.
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    // The roles that belong to the user.
    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function userHasRole($role_input){
        foreach($this->roles as $user_role){
            if(Str::lower($user_role->name) == Str::lower($role_input)) {
                return true;
            }
        }
        return false;
    }
}
