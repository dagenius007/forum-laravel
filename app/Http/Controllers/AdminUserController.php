<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminUserController extends Controller
{
    
    public function index()
    {
        $adminusers = User::where('role_id' , 2)->get();
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
                'role_id' => 2
            ]);
            return redirect('/admin/adminusers')->with('flash', 'Your user has been published!');
        }
    }

    public function edit($id)
    {
        $adminuser = User::where('id' , $id )->first();
        return view('admin.adminuser.edit', compact('adminuser'));
    }

    public function update($id , Request $request)
    {   
        if($request->password == "" && $request->password_confirmation == ""){
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
        }
        else{
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'display_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'password' => 'required|confirmed',
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
                    'avatar' => $name ,
                    'password' => bcrypt(request('password'))
                ]);
                return redirect('/admin/adminusers')->with('flash', 'Your thread has been published!');
            }
        }
        return redirect('/admin/adminusers')->with('flash', 'Your thread has been published!');
    }

    public function delete($id)
    {
        $category = User::where('id' , $id )->first();
        $category->delete();
        return back()->with('flash', 'Category has been deleted');
    }
}
