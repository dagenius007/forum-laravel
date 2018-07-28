<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Reply;
use App\Channel;
use App\Activity;
use App\Filters\ThreadFilters;
use Illuminate\Http\Request;

class AdminThreadController extends Controller
{

    /**
     * Threads constructor
     */
    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['index', 'show']);
    // }

    /**
     * Display a listing of the resource.
     */
    public function index(Channel $channel, ThreadFilters $filters)
    {

        $threads = $this->getThreads($channel, $filters);

        if(request()->wantsJson()){
            return $threads;
        }

        return view('admin.threads.thread', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function replies($id)
    {
         $replies= Reply::where('thread_id' , $id)->get();
        return view('admin.threads.replies' , compact('replies') );
    }

    public function deletereply($id)
    {
        $reply= Reply::where('id' , $id)->first();
        // dd($reply);
        $reply->delete();

         return back()->with('flash', 'Reply deleted');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'thread_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'title' => 'required',
    //         'body' => 'required',
    //         'channel_id' => 'required|exists:channels,id' // laravel validation helpers
    //     ]);

    //     if ($request->hasFile('thread_img')) {
            
    //         $image = $request->file('thread_img');
    //         echo $image;
    //         $name = time().'.'.$image->getClientOriginalExtension();
    //         $destinationPath = public_path('/img');
    //         $image->move($destinationPath, $name);

    //         // $this->save();

    //         $thread = Thread::create([
    //             'user_id' => auth()->id(),
    //             'channel_id' => request('channel_id'),
    //             'title' => request('title'),
    //             'thread_img' => $name ,
    //             'body' => request('body')
    //         ]);
    //         return redirect()->back()->with('flash', 'Your thread has been published!');
    //     }
    // }

    /**
     * Display the specified resource.
     */
    // public function show($channel, Thread $thread)
    // {
    //     // $topics = Thread::orderBy('id' , 'desc')->limit(4)->get();
    //     return view('threads.show', compact('thread'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit($id)
    // {   
    //     $categories = Channel::all();
    //     $title = Thread::where('id' , $id )->first();

    //     return view('threads.edit' , compact('title' , 'categories'));
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request , $id)
    // {
    //     $this->validate($request, [
    //         'thread_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'title' => 'required',
    //         'body' => 'required',
    //         'channel_id' => 'required|exists:channels,id' // laravel validation helpers
    //     ]);

    //     if ($request->hasFile('thread_img')) {

    //         $image = $request->file('thread_img');
    //         echo $image;
    //         $name = time().'.'.$image->getClientOriginalExtension();
    //         $destinationPath = public_path('/img');
    //         $image->move($destinationPath, $name);

    //         Thread::where('id' , $id)->update([
    //             'channel_id' => request('channel_id'),
    //             'title' => request('title'),
    //             'thread_img' => $name ,
    //             'body' => request('body')
    //         ]);
            
    //         return redirect('/home')->with('flash', 'Your thread has been updated!');
    //     }
    //     else{
    //         Thread::where('id' , $id)->update([
    //             'channel_id' => request('channel_id'),
    //             'title' => request('title'),
    //             'body' => request('body')
    //         ]);
            
    //         return redirect('/home')->with('flash', 'Your thread has been updated!');
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $thread = Thread::where('id' , $id )->first();
        $reply = Reply::where('thread_id' , $id);

        $thread->delete();
        $reply->delete();

        return back()->with('flash', 'Category has been deleted');
    }

    // Fetch all relevant threads
    public function getThreads(Channel $channel, ThreadFilters $filters)
    {
        $threads = Thread::latest()->filter($filters);
        if($channel->exists){
            $threads->where('channel_id', $channel->id);
        }

        return $threads->get();
    }
}
