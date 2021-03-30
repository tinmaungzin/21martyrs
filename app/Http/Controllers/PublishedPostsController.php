<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\State;
use App\PostFilter;
use Illuminate\Http\Request;

class PublishedPostsController extends Controller
{
    public function published_posts(PostFilter $filters)
    {
//        dd($filters);
//        $posts = Post::orderBy('id','desc')->paginate(10);
        $query_string = $this->getQueryString();
        $posts = Post::filter($filters)->orderBy('id', 'desc')->paginate(12);
        return view('admin.published_posts.index',compact('posts','query_string'));
    }

    public function getQueryString()
    {
        return request()->except('page'); //to append in paginator in blade file
    }

    public function edit(Post $post)
    {
        $states= State::all();
        return view('admin.published_posts.edit',compact('post','states'));
    }

    public function update(Post $post)
    {

    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }
}
