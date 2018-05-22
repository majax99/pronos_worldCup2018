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
        'pseudo', 'email', 'groupe', 'password','isAdmin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Table name
    protected $table = 'users';

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function pronostics(){
        return $this->hasMany('App\Pronostic');
    }
}
