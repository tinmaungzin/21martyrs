<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Post;
use App\Models\Stat;
use App\Models\State;
use App\PostFilter;
use App\Utility\ImageModule;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index(PostFilter $filters)
    {
        $query_string = $this->getQueryString();
        $states = State::all();
        $stat = Stat::all()->last();
        $posts = Post::filter($filters)->orderBy('id', 'desc')->paginate(12);
//        dd($query_string);
        return view('web.index', compact('posts', 'states', 'states', 'stat','query_string'));
    }

    public function getQueryString()
    {
        return request()->except('page'); //to append in paginator in blade file
    }

    public function about_us()
    {
        return view('web.about_us');
    }

    public function profile(Post $post)
    {
        return view('web.profile', compact('post'));
    }


    public function articles()
    {
        $articles = Article::orderBy('id','desc')->paginate(3);
        return view('web.exp_sharing.list',compact('articles'));
    }

    public function show_article(Article $article)
    {
        return view('web.exp_sharing.show', compact('article'));
    }

    public function fetchNames(Request $request)
    {
        $post_filter = new PostFilter($request);
        $names = Post::filter($post_filter)->limit(15)->get();
//        $names = Post::where('name', 'like', '%' . $request->name . '%')->get();
        return response()->json(array('success' => true, 'names' => $names), 200);
    }
}
