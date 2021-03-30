<!DOCTYPE html>
<html>

<head>
    @inject("constants", "\App\Utility\Constants")
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>21 Martyrs | @yield('title')</title>

    <link rel="icon" href="{{ asset('web/img/MM-Martyrs-500px.png') }} " sizes="16x16"/>

    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    @if(App::environment('production'))
        @include('components.seo')
    @endif
    <meta property="og:description" content="{{__('ui.seo_description')}}">
    <meta property="og:image" content="{{asset('web/img/MM-Martyrs-Cover-withoutLogo.jpg')}}">
    <meta property="og:title" content="21 Maryrs | Heroes of 21st Reveloution">
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:locale" content="{{$constants::LOCALE_MAP[App::getLocale()]['code']}}">


    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href=" {{ asset('css/selectboot.css') }} "> --}}
    <link rel="stylesheet" href=" {{ asset('web/css/bootstrap-theme.min.css') }} "/>


    <link rel="stylesheet" href=" {{ asset('web/css/fontAwesome.css') }} "/>
    <link rel="stylesheet" href="{{ asset('web/css/hero-slider.css') }} "/>
    <link rel="stylesheet" href="{{ asset('web/css/owl-carousel.css') }}"/>
    <link rel="stylesheet" href="{{ asset('web/css/datepicker.css') }} "/>
    <link rel="stylesheet" href="{{ asset('web/css/headerFooter-style.css') }} "/>
    <link rel="stylesheet" href="{{ asset('web/css/templatemo-style.css') }} "/>

    <link rel="stylesheet" href="{{ asset('web/css/ExpSharing-style.css') }} "/>
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }} ">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">


    {{-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css"> --}}
    {{-- <link rel="stylesheet" type="text/css" media="screen" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css"> --}}


    {{-- <script src=" {{ asset('js/bootstrap.popper.min.js') }} "></script> --}}


    {{--    @if(!App::environment('local'))--}}
    {{--        @laravelPWA--}}
    {{--    @endif--}}
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet"/>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    {{--    <script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.7/dist/latest/bootstrap-autocomplete.min.js"></script>--}}

    <script src="{{ asset('web/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }} "></script>
    <!--
 Venue Template
 http://www.templatemo.com/tm-522-venue
-->
</head>

<body>
<!-- Header -->
<div class="wrap">
    <header id="header">
        <div class="container-fluid" style="padding: 0">
            {{-- <div class="row"> --}}
            {{-- <div class="col-md-12"> --}}
            <button id="primary-nav-button" style="right: 0;" type="button">Menu</button>
            <a href="{{ route('index') }}">
                <div class="logo">
                    <img src="{{ asset('web/img/MM-Martyrs-500px.png') }} " alt="Logo"/>
                    <h1 style="padding-top: 10px;">MARTYRS 21 MM </h1>
                </div>
            </a>
            <nav id="primary-nav" class="dropdown cf">
                <ul class="dropdown menu">
                    <li>
                        <x-nav-link
                            url="{{route('index')}}" text="{{__('ui.home')}}"></x-nav-link>
                    </li>
                    <li>
                        <x-nav-link url="{{route('about')}}" text="{{__('master.about_us')}}"></x-nav-link>
                    </li>
                    <li>
                        <x-nav-link url="{{route('list.experiences')}}" text="{{ __('master.stories') }}"></x-nav-link>
                    </li>
                    <li>
                        @php
                            $possible_urls = implode(",",[route('form.detained'), route('form.missing'), route('form.dead')]);
                        @endphp
                        <x-nav-link
                            url="#" text="{{ __('master.inform') }}"
                            possible-urls="{{$possible_urls}}">
                        </x-nav-link>
                        <ul class="sub-menu">
                            <li>
                                <x-nav-link url="{{ route('form.detained') }}"
                                            text="{{ __('home.detained') }}"></x-nav-link>
                            </li>
                            <li>
                                <x-nav-link url="{{ route('form.dead') }}" text="{{ __('home.dead') }}"></x-nav-link>
                            </li>
                            <li>
                                <x-nav-link url="{{ route('form.missing') }}"
                                            text="{{ __('home.missing') }}"></x-nav-link>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">{{ __('master.lang') }}:
                            <img class="locale-icon"
                                 src="{{ asset($constants::LOCALE_MAP[App::getLocale()]['pic']) }}"/>
                        </a>
                        <ul class="sub-menu">
                            @foreach ($constants::LOCALE_MAP as $locale => $arr)
                                <li class="change-locale" data-value={{ $locale }}>
                                    <a href="#">
                                        {{ $arr['text'] }} &nbsp;
                                        <img class="locale-icon" src="{{ asset($arr['pic']) }}"/>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </nav>
            {{-- </div> --}}
            {{-- </div> --}}
        </div>
    </header>
</div>
<!-- Header -->

@yield('content')


<!-- Footer -->

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="about-veno">
                    <div class="logo">
                        <img style="height: 100px;width: 100%;object-fit:contain;" src="
                                {{ asset('web/img/MM-Martyrs-500px.png') }} " alt="Logo"/>
                    </div>
                    <p>
                        {{ __('home.about_us_long') }}
                    </p>
                    <ul class="social-icons">
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-rss"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="contact-info">
                    <div class="footer-heading">
                        <h3>{{ __('master.contact_information') }}</h3>
                    </div>
                    {{--                    <p>--}}
                    {{--                        Praesent iaculis gravida elementum. Proin fermentum neque--}}
                    {{--                        facilisis semper pharetra. Sed vestibulum vehicula tincidunt.--}}
                    {{--                    </p>--}}
                    <ul style="margin-top: 100px;">
                        <li><span>Email:</span>support@martyrs21mm.com</li>
                        <li><span>Website:</span>Myanmar Martyrs 2021</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ContactUs">
                    <div class="footer-heading">
                        <h3 class="ContactTitle">{{__('master.message')}}</h3>
                    </div>
                    <div class="ContactBox">
                        <form action="{{route('feedback.store')}}" method="post">
                            @csrf
                            <div class="contactInput">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            </div>
                            <div class="contactInput">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                <span class="text-danger">{{$errors->first('email')}}</span>

                            </div>
                            <div class="contactInput">
                                <label for="Message" class="form-label">Message</label>
                                <textarea class="form-control" id="Message" name="message" rows="5"
                                          placeholder="Message"></textarea>
                                <span class="text-danger">{{$errors->first('email')}}</span>

                            </div>
                            <div class="SendArea">
                                <button type="submit" class="btn Message">Send Message</button>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
<!-- End footer -->

<div class="sub-footer">
    <p>
        Copyright &copy; 2021 Martyrs Myanmar
        {{--        <a rel="nofollow" href="http://www.templatemo.com">Template Mo</a>--}}
    </p>
</div>


{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script> --}}
<script type="text/javascript">
    window.jQuery ||
    document.write(
        '<script src="web/js/vendor/jquery-1.11.2.min.js"><\/script>'
    );
    // $(document).ready(function() {
    //     $('.selectpicker').selectpicker({
    //         style: 'btn-default',
    //         size: false
    //     });
    // });

</script>


<script src="{{ asset('web/js/vendor/bootstrap.min.js') }} "></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="{{ asset('web/js/datepicker.js') }} "></script>
<script src="{{ asset('web/js/plugins.js') }} "></script>
<script src="{{ asset('web/js/util.js') }}"></script>
<script src="{{ asset('web/js/main.js') }} "></script>
@yield('script')
</body>

</html>
