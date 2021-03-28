<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\State;
use Illuminate\Http\Request;

class PublishedPostsController extends Controller
{
    public function published_posts()
    {
        $posts = Post::orderBy('id','desc')->paginate(10);
        return view('admin.published_posts.index',compact('posts'));
    }

    public function edit(Post $post)
    {
        $states= State::all();
        return view('admin.published_posts.edit',compact('post','states'));
    }

    public function update(Post $post)
    {

    }
}
