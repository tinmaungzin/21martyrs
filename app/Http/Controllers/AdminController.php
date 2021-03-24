<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('admin');
//    }

    public function index()
    {
        $admins = Admin::orderBy('id','desc')->paginate(10);
        return view('admin.admin.index',compact('admins'));
    }


    public function create()
    {
        return view('admin.admin.create');
    }


    public function store(AdminRequest $request)
    {
        $data = $request->except('password_confirm');
        $data['password'] = bcrypt($data['password']);
        Admin::create($data);
        Session::flash('msg','New admin created successfully!');
        return redirect(route('admins.index'));
    }


    public function show(Admin $admin)
    {
        //
    }


    public function edit(Admin $admin)
    {
        return view('admin.admin.edit',compact('admin'));
    }


    public function update(AdminUpdateRequest $request, Admin $admin)
    {
        $data = $request->all();
        $admin->update($data);
        Session::flash('msg','Admin updated successfully!');
        return redirect(route('admins.index'));
    }


    public function destroy(Admin $admin)
    {
        //
    }
}
