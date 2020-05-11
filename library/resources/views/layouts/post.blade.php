<!-- <!DOCTYPE html> -->
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License
Name       : Recreation
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20130121
-->

<!-- <head>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>{{ $post->title }}</title> -->
<!-- Favicon -->
<!-- <link href="../images/favicon.ico" rel="icon" type="image/x-icon"/> -->

<!-- Fonts -->
<!-- <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i"
    rel="stylesheet"/>
<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="http://fonts.googleapis.com/css?family=Arvo|Open+Sans:400,300,700" rel="stylesheet" type="text/css" />
<link href="/css/style.css" rel="stylesheet" type="text/css" media="screen" /> -->
<!-- Mobile Menu -->
<!-- <link href="../css/mmenu.css" rel="stylesheet" type="text/css"/>
    <link href="../css/mmenu.positioning.css" rel="stylesheet" type="text/css"/> -->
<!-- Stylesheet -->
<!-- <link href="../style.css" rel="stylesheet" type="text/css"/>
</head> -->


<!-- <body> -->
<!-- Start: Header Section -->
<!-- <section class="page-banner services-banner">
    <header id="header-v1" class="navbar-wrapper inner-navbar-wrapper">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-default">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="navbar-header">
                                <div class="navbar-brand">
                                    <h1>
                                        <a href="index-2.html">
                                            <img src="../images/libraria-logo-v1.png" alt="LIBRARIA"/>
                                        </a>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                             Header Topbar -->
<!-- <div class="header-topbar hidden-sm hidden-xs">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="topbar-info">
                                            <a href="tel:+61-3-8376-6284"><i class="fa fa-phone"></i>+61-3-8376-6284</a>
                                            <span>/</span>
                                            <a href="mailto:support@libraria.com"><i class="fa fa-envelope"></i>support@libraria.com</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="topbar-links">
                                            <div class="flex-center position-ref full-height">
                                            @guest
    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            @if (Route::has('register'))
        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            @endif
@else
    <ul>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" v-pre>
{{ Auth::user()->name }} <span class="caret"></span>
                                                    </a>
                                                    <div style="background-color:black; padding-left: 10px " class="dropdown-menu dropdown-menu-right "
                                                        aria-labelledby="navbarDropdown">
                                                            <a class="dropdown-item fa fa-btn fa-user"
                                                            href="../profile">{{ __('    My Profile') }}</a>
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
<div class='row'>
<div class="navbar-collapse hidden-sm hidden-xs">
<ul class="nav navbar-nav">
<li class="dropdown active">
<a data-toggle="dropdown" class="dropdown-toggle disabled" href="/home">Home</a>
</li>
<li class="dropdown">
<a data-toggle="dropdown" class="dropdown-toggle disabled" href="blog.html">Blog</a>
<ul class="dropdown-menu">
    <li><a href="blog.html">Blog Grid View</a></li>
    <li><a href="blog-detail.html">Blog Detail</a></li>
</ul>
</li>
<li><a href="services.html">Services</a></li>
<li><a href="contact.html">Contact</a></li>
</ul>
</div>
</div>
</nav>
</div>
</div>
</header>
</section> -->

@extends('layouts.app')
@section('content')
<div id="wrapper">
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
                    <div class='col-md-16'>
                        <div id="content" style="float:right;">
                            @yield('postcontent')
                            <div style="clear: both;">&nbsp;</div>
                        </div>
                        <!-- end #content -->

                        <div id="sidebar" style="float:left;">
                            <ul>
                                <li>
                                    <img src="uploads/images/{{$post->avatar}}" onerror=this.src="/images/blog/cs.jpg"
                                        style="border-radius: 7px; padding-bottom: 5px;"/>
                                </li>
                                <li>
                                    <h2 style="padding:5px;color:#ff7236;">Supervisors</h2>
                                    <ul>
                                        @foreach($post->citations as $citation)
                                            @if($citation->user->isTS == 1)
                                                <li>
                                                    <img src="/uploads/avatars/{{$citation->user->profile_img}}"
                                                        style="width:30px; height:30px; float:left; border-radius:50%;align:middle;"
                                                    onerror=this.src="images/avatars/img1.png">
                                                    <a href="#"
                                                    style="font-size: 15px;padding-left:5px;"><strong> {{$citation->user->name}} </strong>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <h2 style="padding:5px;color:#ff7236;">Collabrators</h2>
                                    <ul>
                                        @foreach($post->citations as $citation)
                                            @if($citation->user->isTS == 0)
                                                <li>
                                                    <img src="/uploads/avatars/{{$citation->user->profile_img}}"
                                                        style="width:30px; height:30px; float:left; border-radius:50%;align:middle;"
                                                         onerror=this.src="images/avatars/img1.png">
                                                    <a href="#"
                                                    style="font-size: 15px;padding-left:5px;"><strong> {{$citation->user->name}} </strong>
                                                    </a>
                                                </li>

                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- end #sidebar -->
                        <div style="clear: both;">&nbsp;</div>
                    </div>
			</div>
        </div>
    </div>
</div>

@endsection
