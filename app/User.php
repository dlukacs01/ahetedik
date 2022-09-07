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
        'username',
        'name',
        'avatar',
        'cv',
        'email',
        'password'
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

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function works(){
        return $this->hasMany(Work::class);
    }

    public function stories(){
        return $this->hasMany(Story::class);
    }

    // mutator for hashing password
    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }

    // accessor (get after db)
    public function getAvatarAttribute($value) {

        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }

        if (strpos($value, 'default_avatar') !== FALSE) {
            return asset('web/' . $value);
        }

        return asset('storage/' . $value);
    }

    public function userHasRole($input_role) {
        foreach($this->roles as $role) {
            if($role->slug == $input_role) {
                return true;
            }
        }
        return false;
    }
}
