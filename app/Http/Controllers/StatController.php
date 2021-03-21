<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatRequest;
use App\Models\Stat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StatController extends Controller
{

    public function index()
    {
        $stats = Stat::orderBy('id','desc')->paginate(10);
        return view('admin.stat.index',compact('stats'));
    }


    public function create()
    {
        return view('admin.stat.create');

    }


    public function store(StatRequest $request)
    {
        $data = $request->all();
        Stat::create($data);
        Session::flash('msg','New Stats added successfully!');
        return redirect(route('stats.index'));
    }


    public function show(Stat $stat)
    {

    }


    public function edit(Stat $stat)
    {
        return view('admin.stat.edit',compact('admin'));

    }


    public function update(StatRequest $request, Stat $stat)
    {
        $data = $request->all();
        $stat->update($data);
        Session::flash('msg','Stats updated successfully!');
        return redirect(route('stats.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stat $stat)
    {
        //
    }
}
