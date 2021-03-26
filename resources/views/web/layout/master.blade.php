<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>21 Martyrs | @yield('title')</title>

    <link rel="icon" href="{{ asset('web/img/MM-Martyrs-500px.png') }} " sizes="16x16"/>

    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

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
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }} ">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">


    {{-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css"> --}}
    {{-- <link rel="stylesheet" type="text/css" media="screen" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css"> --}}


    {{-- <script src=" {{ asset('js/bootstrap.popper.min.js') }} "></script> --}}


    @laravelPWA
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet"/>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script src="{{ asset('web/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }} "></script>
    <!--
 Venue Template
 http://www.templatemo.com/tm-522-venue
-->
</head>

<body>
<!-- Header -->
@inject("constants", "\App\Utility\Constants")
<div class="wrap">
    <header id="header">
        <div class="container-fluid" style="padding: 0">
            {{-- <div class="row"> --}}
            {{-- <div class="col-md-12"> --}}
            <button id="primary-nav-button" style="right: 0;" type="button">Menu</button>
            <a href="{{ route('index') }}">
                <div class="logo">
                   <img src="{{ asset('web/img/MM-Martyrs-500px.png') }} " alt="Logo"/>
                    <h2>martyrs21mm.com</h2>
                </div>
            </a>
            <nav id="primary-nav" class="dropdown cf" >
                <ul class="dropdown menu">
                    <li class="active"><a href="{{ route('index') }}">{{ __('ui.home') }}</a></li>
                    <li class="active"><a href="{{ route('about') }}">{{ __('ui.about_us') }}</a></li>
                    <li class="active"><a href="{{route('list.experiences')}}">{{ __('ui.experience_sharing') }}</a>
                    </li>
                    <li>
                        <a href="#">{{ __('ui.inform_us') }}</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('form.detained') }}">{{ __('ui.detained') }}</a>
                            </li>
                            <li><a href="{{ route('form.dead') }}">{{ __('ui.dead') }}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">{{ __('ui.lang') }}:
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
                                {{ asset('web/img/MM-Martyrs-500px.png') }} " alt=" Venue Logo"/>
                    </div>
                    <p>
                        {{ __('ui.about_us_long') }}
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
            {{-- <div class="col-md-4">
                <div class="useful-links">
                    <div class="footer-heading">
                        <h4>Useful Links</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <li>
                                    <a href="#"><i class="fa fa-stop"></i>Help FAQs</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-stop"></i>Register</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-stop"></i>Login</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-stop"></i>My Profile</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-stop"></i>How It Works?</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-stop"></i>More About Us</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul>
                                <li>
                                    <a href="#"><i class="fa fa-stop"></i>Our Clients</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-stop"></i>Partnerships</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-stop"></i>Blog Entries</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-stop"></i>Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-3">
                <div class="contact-info">
                    <div class="footer-heading">
                        <h4>{{ __('ui.contact_information') }}</h4>
                    </div>
                    <p>
                        Praesent iaculis gravida elementum. Proin fermentum neque
                        facilisis semper pharetra. Sed vestibulum vehicula tincidunt.
                    </p>
                    <ul>
                        <li><span>Phone:</span><a href="#">010-050-0550</a></li>
                        <li><span>Email:</span><a href="#">hi@company.co</a></li>
                        <li><span>Address:</span><a href="#">company.co</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ContactUs">
                 <div class="footer-heading">
                     <h4 class="ContactTitle">Contact Form</h4>
                 </div>
                 <div class="ContactBox">
                     <form>
                         <div class="contactInput">
                           <label for="name" class="form-label">Name</label>
                           <input type="text" class="form-control" id="name" placeholder="name">
                         </div>
                         <div class="contactInput">
                           <label for="email" class="form-label">Email</label>
                           <input type="eamil" class="form-control" id="email" placeholder="email">
                         </div>
                         <div class="contactInput">
                             <label for="Message" class="form-label">Message</label>
                             <textarea class="form-control" id="Message" rows="5" placeholder="message"></textarea>
                           </div>
                        <div class="buttonArea">
                            <button  type="submit" class="btn">Send Message</button>

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
        Copyright &copy; 2021 Martyrs Myanmar - Design:
        <a rel="nofollow" href="http://www.templatemo.com">Template Mo</a>
    </p>
</div>
</footer>
<!-- End footer -->




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
</body>

</html>
