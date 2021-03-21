<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\State;
use App\Utility\ImageModule;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index()
    {
        $states = State::all();

        $posts= Post::orderBy('id','desc')->paginate(12);
        return view('web.index',compact('posts','states'));
    }

    public function about_us()
    {
        return view('web.about_us');
    }

    public function profile(Post $post)
    {
        return view('web.profile',compact('post'));
    }

    public function search(Request $request)
    {
        $posts = Post::where('state_id',$request->state_id)
            ->orderBy('id','desc')->paginate(12);
//        $posts = new Collection();
//        if( isset($request->state_id))
//        {
//            $state = Post::where('state_id',$request->state_id)->get();
//            $posts = $posts->merge($state);
//
//        }
//        if( isset($request->status))
//        {
//            $status = Post::where('status',$request->status)->get();
//            $posts = $posts->merge($status);
//
//        }
//        if( isset($request->gender))
//        {
//            $gender = Post::where('gender',$request->gender)->get();
//            $posts = $posts->merge($gender);
//        }
//
//
        $states = State::all();
//        $posts = $posts->paginate(12);

        return view('web.index',compact('posts','states'));

    }
}
