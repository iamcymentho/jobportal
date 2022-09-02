<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $posts = Post::latest()->simplePaginate(10);
        return view('admin.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'title' => 'required | min:3',
            'content' => 'required',
            'image' => 'required | mimes:jpeg,jpg,png',
        ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $path = $file->store('uploads', 'public');

            Post::create([

                'title' => $title = $request->get('title'),
                'slug' => str::slug($title),
                'content' => $request->get('content'),
                'image' => $path,
                'status' => $request->get('status'),
            ]);
        }

        return redirect('/dashboard')->with('message', 'Post published successfully');
    }


    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.edit', compact('post'));
    }


    // update all fields 

    public function update($id, Request $request)
    {
        $this->validate($request, [

            'title' => 'required | min:3',
            'content' => 'required',
        ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $path = $file->store('uploads', 'public');

            Post::where('id', $id)->update([

                'title' => $title = $request->get('title'),
                'content' => $request->get('content'),
                'image' => $path,
                'status' => $request->get('status'),
            ]);
        }

        $this->updateALLExceptImage($request, $id);
        return redirect()->back()->with('message', 'Post successfully updated');
    }


    // dont update image field method , the call function in update all function 

    public function updateALLExceptImage(Request $request, $id)
    {

        return  Post::where('id', $id)->update([

            'title' => $title = $request->get('title'),
            'content' => $request->get('content'),
            'status' => $request->get('status'),
        ]);
    }


    public function trash()
    {
        $posts = Post::onlyTrashed()->simplePaginate(10);
        return view('admin.trash', compact('posts'));
    }


    public function restore($id)
    {
        Post::onlyTrashed()->where('id', $id)->restore();

        return redirect()->back()->with('message', 'Post restored successfully');
    }

    public function destroy(Request $request)
    {
        $id = $request->get('id');
        $post = Post::find($id);
        $post->delete();

        return redirect()->back()->with('message', 'Post deleted successfully');
    }

    public function toggle($id)
    {
        $post = Post::find($id);
        $post->status = !$post->status; // This line of code toggles between 0 and 1 that represents the post status in the database
        $post->save();

        return redirect()->back()->with('message', 'Status updated successfully');
    }


    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.read', compact('post'));
    }
}
