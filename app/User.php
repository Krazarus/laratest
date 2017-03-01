<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function admin($role = null)
    {
        if($role){
            return $this->role == $role;
        }
        return !! $this->role;
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($user){
            $user->token = str_random(30);
        });
    }

//    public function setPasswordAttribute($password)
//    {
//        $this->attributes['password'] = bcrypt($password);
//    }

    public function confirmEmail()
    {
        $this->verified = true;
        $this->token = null;

        $this->save();
    }
}
