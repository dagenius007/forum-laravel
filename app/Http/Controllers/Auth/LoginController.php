<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   // protected $redirectTo = '/home' || '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected function authenticated(Request $request, $user)
    {
        if ( Auth::user()->isAdmin() ) {// do your margic here
            // echo 'admin';
            return redirect('/admin'); 
        }
        elseif(Auth::user()->isUser()){
            return redirect('/home'); 
        }
       return redirect('/login'); 
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
