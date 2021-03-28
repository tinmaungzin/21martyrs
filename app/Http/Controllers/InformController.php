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
//        dd($post->detained_date);
        return view('web.inform.edit_detained', compact('post', 'states', 'cities'));
    }

    public function store_edit_detained(EditDetainedRequest $request, Post $post)
    {
        $data = $request->except('photo');
        if ($request->has('photo')) {
            $path = Str::uuid() . '-' . $request->file('photo')->getClientOriginalName();
            $data['profile_url'] = ImageModule::uploadFromRequest('photo', $path);
        }
        $data['status'] = 'detained';
        $data['post_id'] = $post->id;
        $data['publishing_status'] = 'None';
        //TODO add user id
        DB::transaction(function () use ($data) {
            $pendingPost = PendingPost::create($data);
            //            Image::create($this->getImageData($pendingPost));
        });


        Session::flash('msg', __('messages.inform_success'));
        return redirect(route('index'));
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
        $data = $request->except('photo');
        $path = Str::uuid() . '-' . $request->file('photo')->getClientOriginalName();
        $data['profile_url'] = ImageModule::uploadFromRequest('photo', $path);
        $data['gender'] = strtolower($data['gender']);
        $data['publishing_status'] = 'None';
        //TODO add user id

        DB::transaction(function () use ($data) {
            $pendingPost = PendingPost::create($data);
        });


        Session::flash('msg', __('messages.inform_success'));
        return redirect(route('index'));

    }


    public function store_edit(InformEditRequest $request, Post $post)
    {
        $data = $request->except('photo');
        if ($request->has('photo')) {
            $path = Str::uuid() . '-' . $request->file('photo')->getClientOriginalName();
            $data['profile_url'] = ImageModule::uploadFromRequest('photo', $path);
        }
        $data['post_id'] = $post->id;
        $data['publishing_status'] = 'None';
        //TODO add user id
        DB::transaction(function () use ($data) {
            $pendingPost = PendingPost::create($data);
        });


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


    public function store_edit_dead(EditDeadRequest $request, Post $post)
    {
        $data = $request->except('photo');
        if ($request->has('photo')) {
            $path = Str::uuid() . '-' . $request->file('photo')->getClientOriginalName();
            $data['profile_url'] = ImageModule::uploadFromRequest('photo', $path);
        }

        $data['status'] = 'dead';
        $data['post_id'] = $post->id;
        $data['publishing_status'] = 'None';
        //TODO add user id
        DB::transaction(function () use ($data) {
            $pendingPost = PendingPost::create($data);
            //            Image::create($this->getImageData($pendingPost));
        });


        Session::flash('msg', __('messages.inform_success'));
        return redirect(route('index'));
    }
}
