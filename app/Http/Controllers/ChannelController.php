<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;

class ChannelController extends Controller
{
    
    public function index()
    {
        $channels = Channel::all();
        return view('admin.categories.index', compact('channels'));
    }

    public function add(){
        return view('admin.categories.create');
    }

    public function create(Request $request){
        $channel = Channel::create([
            'name' => strtolower(request('channel')),
            'slug' => strtolower(request('channel')),
        ]);
        return redirect('/admin/categories')->with('flash', 'Category has been created');
    }

    public function edit($id)
    {
        $channel = Channel::where('id' , $id )->first();
        return view('admin.categories.edit', compact('channel'));
    }

    public function update($id , Request $request)
    {
        Channel::where('id' , $id )->update([
            'name' => request('channel')
        ]);
        return redirect('/admin/categories/')->with('flash', 'Category has been updated');
    }

    public function delete($id)
    {
        $category = Channel::where('id' , $id )->first();
        $category->delete();
        return back()->with('flash', 'Category has been deleted');
    }
}
