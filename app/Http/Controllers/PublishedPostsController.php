<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PublishedPostsController extends Controller
{
    public function published_posts()
    {
        $posts = Post::orderBy('id','desc')->paginate(10);
        return view('admin.published_posts.index',compact('posts'));
    }
}
