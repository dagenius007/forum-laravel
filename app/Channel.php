<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Thread;

class Channel extends Model
{    
    protected $fillable = ['name' ,'slug', 'channel_img'];

    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public function threads()
    {
    	return $this->hasMany(Thread::class);
    }
    public function countthread($id){
        return count(Thread::where('channel_id' , $id)->get());
    }
}
