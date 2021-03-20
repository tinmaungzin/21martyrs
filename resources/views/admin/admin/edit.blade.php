@extends('admin.layout.master')
@section('title', 'Edit Admin')
@section('content')
    <div class="main-container">
        <header class="header pl-2">
            <nav>
                <a href="#" class="a-clear text-dark fm-roboto fs17">Edit Admin</a>

            </nav>
        </header>
        <div>

            <form class="position-relative w-100 h-100 bg-white p-2 mt-3" method="post" action="/admins/{{$admin->id}}">
                @csrf
                @method('patch')
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Name</label>
                        <input type="text" class="input-form" style="border-radius: 6px;" name="name" value="{{$admin->name}}"
                               placeholder="Name">
                        <span class="text-danger">{{$errors->first('name')}}</span>
                    </div>
                </div>
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Email</label>
                        <input type="text" class="input-form" style="border-radius: 6px;" name="email" value="{{$admin->email}}"
                               placeholder="Email">
                        <span class="text-danger">{{$errors->first('email')}}</span>
                    </div>
                </div>

                <div class="ml-4 pl-1 mt-4">
                    <button type="submit" class="btn btn-primary pl-3" style="font-size: 16px!important;"
                            id="confirm-add-button"> Update Admin </button>

                </div>
                <div class="mb-4"></div>
            </form>
        </div>
    </div>
@endsection
