@extends('admin.layout.master')

@section('title',"Reset your password")

@section('content')
    <div class=" main-container">
        <header class="header mb-3">
            <nav>
                <a href="#" class="a-clear text-dark fm-roboto fs17">Reset password</a>
            </nav>
        </header>
        <form action="/admin/reset-password" method="POST" class="position-relative w-100 h-100 bg-white p-2 mt-3">
            @csrf
            <input type="hidden" name="token" value="{{request()->route('token')}}">
            <input type="hidden" name="email" value="{{auth('admin')->user()->email}}">
            {{--            <div class="mb-2">--}}
            {{--                <label for="email" class="form-label">--}}
            {{--                    Email--}}
            {{--                </label>--}}
            {{--                <input type="email" class="form-control" id="email" name="email">--}}
            {{--                <div class="form-text text-danger">{{$errors->first('email')}}</div>--}}
            {{--            </div>--}}
            <div class="mb-2">
                <label for="password" class="form-label">
                    Password
                </label>
                <input type="password" class="form-control" id="password" name="password">
                <div class="form-text text-danger">{{$errors->first('password')}}</div>
            </div>
            <div class="mb-2">
                <label for="password_confirmation" class="form-label">
                    Confirm password
                </label>
                <input
                    type="password" class="form-control" id="password_confirmation"
                    name="password_confirmation">
                <div class="form-text text-danger">{{$errors->first('password_confirmation')}}</div>
            </div>
            <div class="mb-2 mt-4">
                <button type="submit" class="btn btn-primary">Reset password</button>
            </div>
        </form>
    </div>
@endsection
