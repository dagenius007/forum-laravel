<?php

namespace App\Http\Controllers;

use App\User;


class UserController extends Controller
{
    
    public function index()
    {
        $users = User::where('role_id' , 2)->get();
        return view('admin.user' , compact('users'));
    }

    public function delete($id)
    {
       $user = User::find($id);
       $user->delete();
       return back()->with('flash', 'User Deleted');
    }

    public function block($id)
    {
       $user = User::find($id);
       $user->blocked = 1;
       $user->save();
       return back()->with('flash', 'User Deleted');
    }

    public function unblock($id)
    {
       $user = User::find($id);
       $user->blocked = 0;
       $user->save();
       return back()->with('flash', 'User Deleted');
    }

}
