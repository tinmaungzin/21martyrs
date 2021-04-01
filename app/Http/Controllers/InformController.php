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
        if ($request->has('photo'))
        {
            $path = Str::uuid() . '-' . $request->file('photo')->getClientOriginalName();
            $data['profile_url'] = ImageModule::uploadFromRequest('photo', $path);
        }
        if(!is_null($request->released_date)) $data['status'] = 'released';

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

    public function getDataForStatusChange($request,$post)
    {
        $data = $request->all();
        if($data['status'] == 'Released')
        {
            $fields = ['name','comment', 'age', 'profile_url', 'gender', 'occupation', 'organization_name',
                'state_id', 'prison' ,'reason_of_arrest','reason_of_dead','detained_date','address'
            ];
        }
        if($data['status'] == 'Dead')
        {
            $fields = ['name','comment', 'age', 'profile_url', 'gender', 'occupation', 'organization_name',
                'state_id', 'prison' ,'reason_of_arrest' ,'address'
            ];
        }
        if($data['status'] == 'Detained')
        {
            $fields = ['name','comment', 'age', 'profile_url', 'gender', 'occupation', 'organization_name',
                'state_id', 'prison' ,'reason_of_dead' ,'address'
            ];
        }
        if($data['status'] == 'Missing')
        {
            $fields = ['name','comment', 'age', 'profile_url', 'gender', 'occupation', 'organization_name',
                'state_id', 'prison' ,'reason_of_dead' , 'reason_of_arrest' ,'address'
            ];
        }

        foreach($fields as $field )
        {
            if($post[$field] != '') $data[$field] = $post[$field];
        }
        $data['post_id'] = $post->id;
        $data['publishing_status'] = 'None';
        return $data;
    }

    public function change_status( Request $request , Post $post)
    {

        PendingPost::create($this->getDataForStatusChange($request,$post));

        Session::flash('msg', __('messages.inform_success'));
        return redirect(route('index'));

    }


}
