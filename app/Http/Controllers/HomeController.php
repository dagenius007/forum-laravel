<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use App\Thread;
use App\FeaturedTopic;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $number = FeaturedTopic::all()[0]->number;
        $channels = Channel::orderBy('id' , 'desc')->get();
        $topics = Thread::orderBy('id' , 'desc')->limit($number)->get();
        return view('welcome', compact('channels' , 'topics'));
    }

    public function search(Request $request){
        $q = $request['search'];
        $results = Thread::where('title','LIKE','%'.$q.'%')->get();
        return view('search', compact(['results', 'q']));
    }
}
