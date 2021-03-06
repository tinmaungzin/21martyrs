@extends('admin.layout.master')

@section('title',"Reset your password")

@section('content')
    <div class=" main-container">
        <header class="header mb-3">
            <nav>
                <h4 class="a-clear text-dark fm-roboto mb-3">Please enter your password</h4>
                <p class="fs-18 fm-roboto text-info">
                    Please provide your password to continue this action. We won't ask your password again for a few
                    hours.
                </p>
            </nav>
        </header>
        <form action="/admin/user/confirm-password" method="POST"
              class="position-relative w-100 h-100 bg-white p-2 mt-3">
            @csrf

            <div class="mb-2">
                <label for="password" class="form-label">
                    Password
                </label>
                <input type="password" class="form-control" id="password" name="password">
                <div class="form-text text-danger">{{$errors->first('password')}}</div>
            </div>
            <div class="mb-2 mt-4">
                <button type="submit" class="btn btn-primary">Submit password</button>
            </div>
        </form>
    </div>
@endsection
