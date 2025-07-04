<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
}
