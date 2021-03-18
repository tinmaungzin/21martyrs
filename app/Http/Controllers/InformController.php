<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetainedRequest;
use App\Models\City;
use App\Models\PendingPost;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InformController extends Controller
{
    public function detained_form()
    {
        $states = State::all();
        $cities = City::all();
        return view('web.inform.detained',compact('states','cities'));
    }

    public function store_detained(DetainedRequest $request)
    {
        $data = $request->except('photo');
        //TODO save photo and get url
        $data['status'] = 'detained';

        PendingPost::create($data);

        Session::flash('msg','အချက်အလက် ပေးပို့မှု အောင်မြင်ပါသည်။');
        return redirect(route('index'));


    }

    public function getCities(Request $request)
    {
        $state_id = $request->state_id;
        $cities = City::where('state_id',$state_id)->get();
        return response()->json(array('success' => true,'cities'=> $cities) , 200);
    }

    public function dead_form()
    {
        return view('web.inform.dead');
    }
}
