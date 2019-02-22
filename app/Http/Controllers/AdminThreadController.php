<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Reply;
use App\Channel;
use App\Activity;
use App\FeaturedTopic;
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

    public function topics(){
        $number = FeaturedTopic::all()[0]->number;
        return view('admin.topics' , compact('number'));
    }
}
