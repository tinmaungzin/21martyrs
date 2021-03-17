<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>21 Martyrs | @yield('title')</title>

    <link
        rel="icon"
        href="{{asset('images/21martyrs.webp')}} "
        sizes="16x16"
    />

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.css') }}">

    <link rel="stylesheet" href=" {{asset('web/css/bootstrap-theme.min.css')}} " />
    <link rel="stylesheet" href=" {{asset('web/css/fontAwesome.css')}} " />
    <link rel="stylesheet" href="{{asset('web/css/hero-slider.css')}} " />
    <link rel="stylesheet" href="{{asset('web/css/owl-carousel.css')}}" />
    <link rel="stylesheet" href="{{asset('web/css/datepicker.css')}} " />
    <link rel="stylesheet" href="{{asset('web/css/headerFooter-style.css')}} "/>
    <link rel="stylesheet" href="{{asset('web/css/templatemo-style.css')}} " />
    <link rel="stylesheet" href="{{asset('web/css/style.css')}} ">

    @laravelPWA
    <link
        href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900"
        rel="stylesheet"
    />

    <script src="{{asset('web/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}} "></script>
    <!--
	Venue Template
	http://www.templatemo.com/tm-522-venue
-->
</head>

<body>
<!-- Header -->
<div class="wrap">
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <button id="primary-nav-button" type="button">Menu</button>
                    <a href="index.html"
                    ><div class="logo">
                            <img src="{{asset('web/img/logo.png')}} " alt="Venue Logo" /></div
                        ></a>
                    <nav id="primary-nav" class="dropdown cf">
                        <ul class="dropdown menu">
                            <li class="active"><a href="{{route('index')}}">Home</a></li>
                            <li class="active"><a href="{{route('about')}}">About Us</a></li>
                            <li class="active"><a href="ExpSharing.html">Expreience Sharing</a></li>
                            <li>
                                <a href="#">Inform Us</a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('form.detained')}}">Detained</a></li>
                                    <li><a href="{{route('form.dead')}}">Dead</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
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
                        <img src="{{asset('web/img/footer_logo.png')}} " alt="Venue Logo" />
                    </div>
                    <p>
                        Mauris sit amet quam congue, pulvinar urna et, congue diam.
                        Suspendisse eu lorem massa. Integer sit amet posuere tellus, id
                        efficitur leo. In hac habitasse platea dictumst.
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
            <div class="col-md-4">
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
            </div>
            <div class="col-md-3">
                <div class="contact-info">
                    <div class="footer-heading">
                        <h4>Contact Information</h4>
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
        </div>
    </div>
</footer>
<!-- End footer -->

<div class="sub-footer">
    <p>
        Copyright &copy; 2018 Company Name - Design:
        <a rel="nofollow" href="http://www.templatemo.com">Template Mo</a>
    </p>
</div>

<script
    src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"
    type="text/javascript"
></script>
<script>
    window.jQuery ||
    document.write(
        '<script src="web/js/vendor/jquery-1.11.2.min.js"><\/script>'
    );
</script>

<script src="{{asset('web/js/vendor/bootstrap.min.js')}} "></script>

<script src="{{asset('web/js/datepicker.js')}} "></script>
<script src="{{asset('web/js/plugins.js')}} "></script>
<script src="{{asset('web/js/main.js')}} "></script>
</body>
</html>
