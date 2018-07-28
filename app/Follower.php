<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Follower extends Model
{
    public static function yourFollowing($id){
        $following = Follower::where('follower_id' , Auth::user()->id)->where('user_id' , $id)->first();
        return isset($following);
    }

    // public static function isFollowing($id){
    //     $following = Follower::where('follower_id' , $id)->where('user_id' , Auth::user()->id)->first();
    //     return isset($following);
    // }
}
