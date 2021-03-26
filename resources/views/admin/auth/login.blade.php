<!DOCTYPE html>
<html lang="en">

<head>
    <title>21 Martyrs - Login</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=yes">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href=" {{ asset('css/ui.css') }} ">
    <link rel="stylesheet" type="text/css" href=" {{ asset('css/style.css') }} ">
    <link rel="stylesheet" href=" {{ asset('fontawesome/css/all.css') }} ">
    <script src=" {{ asset('js/bootstrap.popper.min.js') }} "></script>
    <script src=" {{ asset('js/jquery.js') }} "></script>
    <script src=" {{ asset('js/jquery-ui.min.js') }} "></script>
    <script src=" {{ asset('js/bootstrap.js') }} "></script>
    <script src=" {{ asset('js/bs.js') }} "></script>
    <script src=" {{ asset('js/vue.js') }} "></script>
    <script src=" {{ asset('js/sorting.js') }} "></script>
    <script src=" {{ asset('js/jquery.autosize.js') }} "></script>


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script defer src="{{ asset('js/app.js') }}"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js">
    </script> --}}

</head>

<body style="background-color: #f3f7fa">
<div id="app" class="overall-container">

    <form action="/admin/login" method="post">
        @csrf
        @if (session('status'))
            <div class="font-medium alert alert-success p-3 text-center">
                {{ session('status') }}
            </div>
        @endif
        <div class="login-container">
            <div class="login-leftside py-4">
                <div style="margin-top: 11%;margin-bottom: 14%">
                    <h2 style="color: #111;font-weight: 900;font-family: 'Roboto', sans-serif" class="text-center mb-5">
                        Login</h2>
                    <div class="mb-4 justify-content-center d-flex mt-3">
                        <input type="text" style="" value="{{old('email')}}" name="email" class="login-input px-2"
                               placeholder="Email">
                    </div>
                    <span class="text-danger"
                          style="font-size: 12px; margin-left: 100px;">{{$errors->first('email')}}</span>
                    <div class="mb-4 justify-content-center d-flex">
                        <input type="password" style="" name="password" class="login-input px-2" placeholder="Password">
                    </div>
                    <span class="text-danger"
                          style="font-size: 12px; margin-left: 100px;">{{$errors->first('password')}}</span>
                    <div class="mb-4 justify-content-center d-flex">
                        <input type="checkbox" name="remember" class="mr-2">
                        <p style="line-height: 0.7">Remember me</p>
                    </div>
                    <div class="justify-content-center d-flex pt-2">
                        <button type="submit" class="btn-danger border-0 px-5"
                                style="border-radius: 12px;padding-top: 5px;padding-bottom: 5px">LOG IN
                        </button>
                    </div>
                </div>
            </div>
            <div class="login-rightside">
                <div style="margin-top: 12%;margin-bottom: 15%">
                    <div class="d-flex justify-content-center pt-4">
                        <img src="{{asset('images/21martyrs.webp')}}"
                             style="height: 80px;width: 80px;border-radius: 50%" alt="">
                    </div>
                    <div class="px-4 my-3 py-3">
                        <p class="font-weight-bold text-white text-center" style="font-size: 26px!important;"><span
                                style="font-size: 28px!important;">21 Martyrs</span><br> Admin Panel</p>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
</body>

</html>
