<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('posts.index',[
            'posts' => Post::latest()->filter(\request(['search','user','likes']))->paginate(4)
        ]);
    }
    public function show(Post $post){
        return view('posts.show',[
            'post' => $post
        ]);
    }
    public function create(){
        return view('posts.create');
    }
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $formFields['user_id'] = auth()->id();

        Post::create($formFields);
        return redirect('/dashboard')->with('message','Post successfully created');
    }

    public function destroy(Post $post){
        $post->delete();

        return redirect('/dashboard')->with('message','Post successfully deleted!');
    }

    public function edit(Post $post){
        return view('posts.edit',[
            'post' => $post
        ]);
    }

    public function update(Request $request,Post $post){
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $post->update($formFields);
        return redirect('/dashboard')->with('message','Post updated successfully');
    }
}
