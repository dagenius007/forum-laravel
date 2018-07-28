<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Activity;
use App\Follower;
use Illuminate\Support\Facades\Auth;
use Session;

class ProfilesController extends Controller
{
	// Show a User's Profile page
    public function show($user_id)
    {
		$user = User::findorFail($user_id);
    	$followers = $user->followers;
		$followings = $user->followings;
		
    	return view('profiles.show', [
    		'profileUser' => $user,
			'activities' => Activity::feed($user),
			'followers' => $followers,
			'followings' => $followings,
			// 'logged_user_followings'=> $logged_user_followings,
    	]);
	}
	public function edit($profileId){
		$user = User::findorFail($profileId);
		return view('profiles.edit' , compact('user'));
	}

	public function update($profileId , Request $request){
		$user = User::findorFail($profileId);

		$this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'display_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('display_img')) {
        
            $image = $request->file('display_img');
            
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/users');
            $image->move($destinationPath, $name);
            // echo $name;

            User::where('id' , $profileId )->update([
                'name' => request('name'),
                'email' => request('email'),
                'display_img' => $name
			]);
			Session::flash('edit', 'sucess'); 

			return redirect()->route('profile', ['user' => $user->id]);
		}
		else{
			User::where('id' , $profileId )->update([
                'name' => request('name'),
                'email' => request('email')
			]);
			Session::flash('edit', 'sucess'); 

            return redirect()->route('profile', ['user' => $user->id]);
		}
	}

	public function password($profileId , Request $request){
		$user = User::findorFail($profileId);

		$this->validate($request, [
            'password' => 'required|confirmed'
        ]);

		User::where('id' , $profileId )->update([
			'password' => bcrypt(request('password'))
		]);
		Session::flash('message', 'sucess'); 

		return redirect()->route('profile', ['user' => $user->id]);
	}
	
	public function followUser($profileId)
	{
		$user = User::find($profileId);
		if(!$user) {
			
			return redirect()->back()->with('error', 'User does not exist.'); 
		}

		$user->followers()->attach(auth()->user()->id);
		return redirect()->back()->with('success', 'Successfully followed the user.');
	}

	public function unFollowUser($profileId)
	{
		$user = User::find($profileId);
		if(! $user) {
			return redirect()->back()->with('error', 'User does not exist.'); 
		}
		$user->followers()->detach(auth()->user()->id);

		return redirect()->back()->with('success', 'Successfully unfollowed the user.');
	}
	
}
