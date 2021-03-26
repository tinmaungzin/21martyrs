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

    public function about_us()
    {
        return view('web.about_us');
    }

    public function profile(Post $post)
    {
        return view('web.profile', compact('post'));
    }

//    public function search(Request $request)
//    {
//        $query = Post::query();
//        $filters = array();
//
//        if (isset($request->state_id)) {
//            $query->where('state_id', $request->state_id);
//            $filters += ['State and Region' => State::FindOrFail($request->state_id)->name];
//        }
//        if (isset($request->name)) {
//            $query->where('name','like', '%' . $request->name . '%');
//            $filters += ['Name' => $request->name];
//
//
//        }
//        if (isset($request->status)) {
//            $query->where('status', $request->status);
//            $filters += ['Status' => $request->status];
//
//        }
//
//
//        $posts = $query->orderBy('id', 'desc')->paginate(12);
//        $states = State::all();
//        $stat = Stat::all()->last();
//
//
//        return view('web.index', compact('posts', 'states', 'filters','stat'));
//
//    }

    public function articles()
    {
        $articles = Article::orderBy('id','desc')->paginate(12);
        return view('web.exp_sharing.list',compact('articles'));
    }

    public function show_article(Article $article)
    {
        return view('web.exp_sharing.show',compact('article'));
    }

    public function getQueryString()
    {
        return request()->except('page'); //to append in paginator in blade file
    }
}
