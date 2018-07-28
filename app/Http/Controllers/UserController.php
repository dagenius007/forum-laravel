<?php

namespace App\Http\Controllers;

use App\User;


class UserController extends Controller
{
    
    public function index()
    {
        $users = User::where('role_id' , 1)->get();
        return view('admin.user' , compact('users'));
    }

    public function delete($id)
    {
       $user = User::find($id);
       $user->delete();
       return back()->with('flash', 'User Deleted');
    }

}
