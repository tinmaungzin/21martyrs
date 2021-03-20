@extends('admin.layout.master')
@section('title', 'Add New Admin')
@section('content')
    <div class="main-container">
        <header class="header pl-2">
            <nav>
                <a href="#" class="a-clear text-dark fm-roboto fs17">Add New Admin</a>

            </nav>
        </header>
        <div>

            <form class="position-relative w-100 h-100 bg-white p-2 mt-3" method="post" action="{{route('admins.store')}}">
                @csrf
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Name</label>
                        <input type="text" class="input-form" style="border-radius: 6px;" name="name" value="{{old('name')}}"
                               placeholder="Name">
                        <span class="text-danger">{{$errors->first('name')}}</span>
                    </div>
                </div>
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Email</label>
                        <input type="text" class="input-form" style="border-radius: 6px;" name="email" value="{{old('email')}}"
                               placeholder="Email">
                        <span class="text-danger">{{$errors->first('email')}}</span>
                    </div>
                </div>
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Password</label>
                        <input type="password" class="input-form" style="border-radius: 6px;" name="password"
                               placeholder="Password">
                        <span class="text-danger">{{$errors->first('password')}}</span>
                    </div>
                </div>
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Confirm Password</label>
                        <input type="password" class="input-form" style="border-radius: 6px;" name="password_confirm"
                               placeholder="Confirm Password">
                        <span class="text-danger">{{$errors->first('password_confirm')}}</span>
                    </div>
                </div>


                <div class="ml-4 pl-1 mt-4">
                    <button type="submit" class="btn btn-danger pl-3" style="font-size: 16px!important;"
                            id="confirm-add-button"> Add Admin</button>

                </div>
                <div class="mb-4"></div>
            </form>
        </div>
    </div>
@endsection
