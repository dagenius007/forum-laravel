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

    public function create(){
        return view('admin.categories.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'channel' => 'required',
            'channel_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $slug = str_slug($request->channel, '-');

        if ($request->hasFile('channel_img')) {
            $image = $request->file('channel_img');
            
            $name = str_slug($request->channel).'.'.$image->getClientOriginalExtension();
            
            $destinationPath = public_path('/img/category');
                
            $image->move($destinationPath, $name);

            Channel::create([
                'name' => strtolower(request('channel')),
                'slug' => $slug,
                'channel_img' => $name
            ]);

            return redirect('/admin/categories')->with('flash', 'Category has been created');
        }

        Channel::create([
            'name' => strtolower(request('channel')),
            'slug' => $slug,
            'channel_img' => 'cat_bg.jpg'
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
        $this->validate($request, [
            'channel' => 'required',
            'channel_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slug = str_slug($request->channel, '-');

        if($request->hasFile('channel_img')){

            $image = $request->file('channel_img');
            
            $name = str_slug($request->channel , '-').'.'.$image->getClientOriginalExtension();
            
            $destinationPath = public_path('/img/category');
                
            $image->move($destinationPath, $name);

           

            Channel::where('id' , $id )->update([
                'name' => request('channel'),
                'slug' => $slug,
                'channel_img' => $name  
            ]);
    
            return redirect('/admin/categories/')->with('flash', 'Category has been updated');
        }

        Channel::where('id' , $id )->update([
            'name' => request('channel'),
            'slug' => $slug
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
