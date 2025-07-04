<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWriterPostRequest;
use App\Http\Requests\UpdateWriterPostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function index()
    {
        $id=Auth::id();
        $posts=Post::where('user_id',$id)->where('is_active',1)->paginate(2);
        return view('writer.index',compact('posts'));
    }
    public function create(){
        $categories=Category::where('is_active',1)->get();
        $tags=Tag::where('is_active',1)->get();
        return view('writer.create',compact('categories','tags'));
    }
    public function store(StoreWriterPostRequest $request){
        $post=Post::create([
            ...$request->all(),
            'user_id'=>Auth::id(),
            ]);
        if ($post) {
            $post->tags()->attach($request->tags);
            return redirect()->route('writer.posts');
        }
        return redirect()->back();
    }

    public function edit(Post $post)
    {
        $categories=Category::where('is_active',1)->get();
        $tags=Tag::where('is_active',1)->get();
        return view('writer.edit',compact('post','categories','tags'));
    }
    public function update(UpdateWriterPostRequest $request, Post $post){
        $status=$post->update($request->all());
        if ($status) {
            $post->tags()->sync($request->tags);
            return redirect()->route('writer.posts');
        }
        return redirect()->back();
    }
}
