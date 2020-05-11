<!DOCTYPE html>
<html lang="zxx">


<head>

    <!-- Meta -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">

    <!-- Title -->
    <title>..:: CSED GP LIBRARY ::..</title>

    <!-- Favicon -->
    <link href="../images/favicon.ico" rel="icon" type="image/x-icon"/>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i"
        rel="stylesheet"/>
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>


    <!-- Stylesheet -->
    <link href="{{ asset('style.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="screen"/>


</head>


<body>

<!-- Start: Header Section -->
<section class="page-banner services-banner">
    <header id="header-v1" class="navbar-wrapper inner-navbar-wrapper">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-default">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="navbar-header">
                                <div class="navbar-brand">
                                    <h1>
                                        <a href="/">
                                            <img src="{{asset('images/favicon.ico')}}" width="30" height="30" alt="CSED GP LIBRARY"/>
                                            CSED GP LIBRARY
                                        </a>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <!-- Header Topbar -->
                            <div class="header-topbar hidden-sm hidden-xs">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="topbar-info">
                                            <a href="tel:+20-12-1053-3087"><i class="fa fa-phone"></i>+20-12-1053-3087</a>
                                            <span>/</span>
                                            <a href="mailto:support@csed.gplib.com"><i class="fa fa-envelope"></i>support@csed.gplib.com</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="topbar-links">
                                            <div class="flex-center position-ref full-height">
                                                @guest
                                                    <a class="nav-link"
                                                       href="{{ route('login') }}">{{ __('Login') }}</a>
                                                    @if (Route::has('register'))
                                                        <a class="nav-link"
                                                           href="{{ route('register') }}">{{ __('Register') }}</a>
                                                    @endif
                                                @else
                                                <ul>
                                                    <li class="nav-item dropdown">
                                                        <a id="navbarDropdown" class="nav-link dropdown-toggle"
                                                           href="#" role="button" data-toggle="dropdown"
                                                           aria-haspopup="true"
                                                           aria-expanded="false" v-pre>
                                                            {{ Auth::user()->name }} <span class="caret"></span>
                                                        </a>
                                                        <div style="background-color:black; padding-left: 10px "
                                                             class="dropdown-menu dropdown-menu-right "
                                                             aria-labelledby="navbarDropdown">
                                                            <a class="dropdown-item fa fa-btn fa-user"
                                                               href="../profile">{{ __('    My Profile') }}</a>
                                                            <br>
                                                            <a class="dropdown-item fa fa-btn fa-user"
                                                               href="/notification">
                                                                Notifications
                                                            </a>
                                                            <br>
                                                            <a class="dropdown-item fa fa-btn fa-sign-out"
                                                               href="{{ route('logout') }}"
                                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                                {{ __('Logout') }}
                                                            </a>
                                                            <form id="logout-form" action="{{ route('logout') }}"
                                                                  method="POST" style="display: none;">
                                                                @csrf
                                                            </form>

                                                        </div>
                                                    </li>
                                                    @endguest
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="dropdown active">
                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="/home">Home</a>
                        </li>
                        @if(Auth::user())
                            @if(Auth::user()->isAdmin())
                                <li class="dropdown active">
                                    <a data-toggle="dropdown" class="dropdown-toggle disabled" href="/admin">Administration</a>
                                </li>
                            @endif
                        @endif
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="news-events-list-view.html">News &amp; Events</a>
                        </li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="#">Projects</a>
                            <ul class="dropdown-menu">
                                <li><a href="/search">Search on a topic</a></li>
                                <li><a href="/home">Recent</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="#">Services</a>
                            <ul class="dropdown-menu">
                                <li><a href="/search">Search</a></li>
                                <li><a href="/posts">Upload Project</a></li>
                                <li><a href="/profile">View Profile</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    `<!-- End: Header Section -->
</section>

<div id="app">
{{--    <main class="py-4">--}}
        @yield('content')
{{--    </main>--}}
</div>

<!-- Start: Social Network -->
<section class="social-network section-padding">
    <div class="container">
        <div class="center-content">
            <h2 class="section-title">Follow Us</h2>
            <span class="underline center"></span>
            <p class="lead"> </p>
        </div>
        <ul>
            <li>
                <a class="facebook" href="#" target="_blank">
                            <span>
                                <i class="fa fa-facebook-f"></i>
                            </span>
                </a>
            </li>
            <li>
                <a class="twitter" href="#" target="_blank">
                            <span>
                                <i class="fa fa-twitter"></i>
                            </span>
                </a>
            </li>
            <li>
                <a class="google" href="#" target="_blank">
                            <span>
                                <i class="fa fa-google-plus"></i>
                            </span>
                </a>
            </li>
            <li>
                <a class="rss" href="#" target="_blank">
                            <span>
                                <i class="fa fa-rss"></i>
                            </span>
                </a>
            </li>
            <li>
                <a class="linkedin" href="#" target="_blank">
                            <span>
                                <i class="fa fa-linkedin"></i>
                            </span>
                </a>
            </li>
            <li>
                <a class="youtube" href="#" target="_blank">
                            <span>
                                <i class="fa fa-youtube"></i>
                            </span>
                </a>
            </li>
        </ul>
    </div>
</section>
<!-- End: Social Network -->

<!-- Start: Footer -->
<footer class="site-footer">
    <div class="container">
        <div id="footer-widgets">
            <div class="row">
                <div class="col-md-4 col-sm-6 widget-container">
                    <div id="text-2" class="widget widget_text">
                        <h3 class="footer-widget-title">About CSED GP LIBRARY</h3>
                        <span class="underline left"></span>
                        <div class="textwidget">
                            Your gate for all the contribution established by Alexandria University CS graduates.
                        </div>
                        <address>
                            <div class="info">
                                <i class="fa fa-envelope"></i>
                                <span><a href="mailto:support@csed.gplib.com">support@csed.gplib.com</a></span>
                            </div>
                            <div class="info">
                                <i class="fa fa-phone"></i>
                                <span><a href="tel:012-345-6789">+20-12-1053-3087</a></span>
                            </div>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-9 pull-right">
                    <ul>
                        <li><a href="/welcome">Welcome Page</a></li>
                        <li><a href="news-events-list-view.html">News &amp; Events</a></li>
                        <li><a href="/home">Projects</a></li>
                        <li><a href="/search">Services</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End: Footer -->

<!-- jQuery Latest Version 1.x -->
<script type="text/javascript" src="{{asset('js/jquery-1.12.4.min.js')}}"></script>

<!-- jQuery UI -->
<script type="text/javascript" src="{{asset('js/jquery-ui.min.js')}}"></script>

<!-- jQuery Easing -->
<script type="text/javascript" src="{{asset('js/jquery.easing.1.3.js')}}"></script>

<!-- Bootstrap -->
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- Mobile Menu -->
<script type="text/javascript" src="{{asset('js/mmenu.min.js')}}"></script>

<!-- Harvey - State manager for media queries -->
<script type="text/javascript" src="{{asset('js/harvey.min.js')}}"></script>

<!-- Waypoints - Load Elements on View -->
<script type="text/javascript" src="{{asset('js/waypoints.min.js')}}"></script>

<!-- Facts Counter -->
<script type="text/javascript" src="{{asset('js/facts.counter.min.js')}}"></script>

<!-- MixItUp - Category Filter -->
<script type="text/javascript" src="{{asset('js/mixitup.min.js')}}"></script>

<!-- Owl Carousel -->
<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>

<!-- Accordion -->
<script type="text/javascript" src="{{asset('js/accordion.min.js')}}"></script>

<!-- Responsive Tabs -->
<script type="text/javascript" src="{{asset('js/responsive.tabs.min.js')}}"></script>

<!-- Responsive Table -->
<script type="text/javascript" src="{{asset('js/responsive.table.min.js')}}"></script>

<!-- Masonry -->
<script type="text/javascript" src="{{asset('js/masonry.min.js')}}"></script>

<!-- Carousel Swipe -->
<script type="text/javascript" src="{{ asset('js/carousel.swipe.min.js') }}"></script>

<!-- bxSlider -->
<script type="text/javascript" src="{{ asset('js/bxslider.min.js') }}"></script>

<!-- Custom Scripts -->
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
@yield('script')

</body>
</html>
