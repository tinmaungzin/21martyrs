<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Utility\ImageModule;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts= Post::orderBy('id','desc')->paginate(12);
        return view('web.index',compact('posts'));
    }

    public function about_us()
    {
        return view('web.about_us');
    }

    public function profile(Post $post)
    {
        return view('web.profile',compact('post'));
    }
}
