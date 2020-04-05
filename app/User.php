<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
    // users that are followed by this user
public function following() {
    return $this->belongsToMany(User::class, 'followers', 'follower_id', 'following_id');
}

// users that follow this user
public function followers() {
    return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id');
}
public function posts(){
    return $this->hasMany(App\Post,'userId','id');
}
}
