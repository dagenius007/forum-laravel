<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminUserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['index', 'show']);
    // }
    
    public function index()
    {
        $adminusers = User::where('role_id' , 1)->get();
        return view('admin.adminuser.index', compact('adminusers'));
    }

    public function create(){
        return view('admin.adminuser.create');
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required|confirmed',
        ]);

        if ($request->hasFile('avatar')) {
        
            $image = $request->file('avatar');
            
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/users');
            $image->move($destinationPath, $name);
            // echo $name;

            User::create([
                'name' => request('name'),
                'email' => request('email'),
                'display_img' => $name ,
                'password' => bcrypt(request('password')),
                'role_id' => 1,
                'slug' => '',
                'blocked' => 0
            ]);
            return redirect('/admin/adminusers')->with('flash', 'Admin has been created!');
        }

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'display_img' => 'avatar.png' ,
            'password' => bcrypt(request('password')),
            'role_id' => 1,
            'slug' => '',
            'blocked' => 0
        ]);
        return redirect('/admin/adminusers')->with('flash', 'Admin has been created!');
    }


    public function edit($id)
    {
        $adminuser = User::where('id' , $id )->first();
        return view('admin.adminuser.edit', compact('adminuser'));
    }

    public function update($id , Request $request)
    {   
        
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('avatar')) {
            
                $image = $request->file('avatar');
                // echo $image;
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/img/users');
                $image->move($destinationPath, $name);
    
    
                User::where('id' , $id )->update([
                    'name' => request('name'),
                    'email' => request('email'),
                    'display_img' => $name ,
                ]);
                return redirect('/admin/adminusers')->with('flash', 'Your thread has been published!');
            }

            User::where('id' , $id )->update([
                'name' => request('name'),
                'email' => request('email'),
                'display_img' => $name ,
            ]);
            return redirect('/admin/adminusers')->with('flash', 'Your thread has been published!');
        
        
        
        return redirect('/admin/adminusers')->with('flash', 'Your thread has been published!');
    }

    function updatePassword($id , Request $request){
        $this->validate($request , [
            'password' => 'required|confirmed',
        ]);

        try{
            User::where('id' , $id)->update([
                'password'=> bcrypt(request('password')),
            ]);
        } catch(\Exception $e) {
            // echo $e;
        }
        return back();

    }

    public function delete($id)
    {
        $category = User::where('id' , $id )->first();
        $category->delete();
        return back()->with('flash', 'Category has been deleted');
    }
}
