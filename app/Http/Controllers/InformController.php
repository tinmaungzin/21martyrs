<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeadRequest;
use App\Http\Requests\DetainedRequest;
use App\Http\Requests\EditDeadRequest;
use App\Http\Requests\EditDetainedRequest;
use App\Http\Requests\InformEditRequest;
use App\Http\Requests\InformRequest;
use App\Models\City;
use App\Models\Image;
use App\Models\PendingPost;
use App\Models\Post;
use App\Models\State;
use App\Utility\ImageModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class InformController extends Controller
{
    public function detained_form()
    {
        $states = State::all();
        $cities = City::all();
        return view('web.inform.detained', compact('states', 'cities'));
    }

    public function edit_detained_form(Post $post)
    {
        $states = State::all();
        $cities = City::all();
        return view('web.inform.edit_detained', compact('post', 'states', 'cities'));
    }

    public function getImageData($pendingPost)
    {
        $image_data['url'] = $pendingPost->profile_url;
        $image_data['post_id'] = $pendingPost->id;
        $image_data['post_type'] = 'PendingPost';

        return $image_data;
    }


    public function store(InformRequest $request)
    {
        PendingPost::create(PendingPost::getDataForStore($request));
        Session::flash('msg', __('messages.inform_success'));
        return redirect(route('index'));

    }


    public function store_edit(InformEditRequest $request, Post $post)
    {

        PendingPost::create(Post::getDataForStoreEdit($request,$post));
        Session::flash('msg', __('messages.inform_success'));
        return redirect(route('index'));
    }

    public function dead_form()
    {
        $states = State::all();
        $cities = City::all();
        return view('web.inform.dead', compact('states', 'cities'));
    }


    public function edit_dead_form(Post $post)
    {
        $states = State::all();
        $cities = City::all();
        return view('web.inform.edit_dead', compact('post', 'states', 'cities'));
    }

    public function missing_form()
    {
        $states = State::all();
        $cities = City::all();
        return view('web.inform.missing', compact('states', 'cities'));
    }


    public function edit_missing_form(Post $post)
    {
        $states = State::all();
        $cities = City::all();
        return view('web.inform.edit_missing', compact('post', 'states', 'cities'));
    }

    public function edit_released_form(Post $post)
    {
        $states = State::all();
        $cities = City::all();
        return view('web.inform.edit_released', compact('post', 'states', 'cities'));
    }

    public function change_status( Request $request , Post $post)
    {

        PendingPost::create(Post::getDataForStatusChange($request,$post));
        Session::flash('msg', __('messages.inform_success'));
        return redirect(route('index'));

    }


}
