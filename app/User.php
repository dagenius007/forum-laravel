<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // Laravel notification
    // adds a notify method as well as others
    // https://laravel.com/docs/5.5/notifications
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','slug' , 'blocked'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email'
    ];

    public function threads()
    {
        // make database relationship and return threads in proper order
        return $this->hasMany(Thread::class)->latest();
    }

    // Get route key name for Laravel
    public function getRouteKeyName()
    {
        return 'name';
    }

    // Get all activity for the user
    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id')->withTimestamps();
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id')->withTimestamps();
    }

    public function role(){
        return $this->belongsTo('App\Role', 'role_id');
    }

    public function isAdmin(){
        if($this->role->name == 'admin' && $this->role->id == 1){
            return true;
        }
        return false;
    }
    public function isUser(){
        if($this->role->name == 'user' && $this->role->id == 2){
            return true;
        }
        return false;
    }
}
