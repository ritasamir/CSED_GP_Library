<!DOCTYPE html>
<html lang="zxx">


<head>

    <!-- Meta -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">

    <!-- Title -->
    <title>..:: CSED GP LIBRARY ::..</title>

    <!-- Favicon -->
    <link href="images/favicon.ico" rel="icon" type="image/x-icon"/>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i"
        rel="stylesheet"/>
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

    <!-- Mobile Menu -->
    <link href="../css/mmenu.css" rel="stylesheet" type="text/css"/>
    <link href="../css/mmenu.positioning.css" rel="stylesheet" type="text/css"/>

    <!-- Stylesheet -->
    <link href="style.css" rel="stylesheet" type="text/css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.min.js"></script>
    <script src="../js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Start: Header Section -->
<header id="header-v1" class="navbar-wrapper">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-default">
                <div class="row">
                    <div class="col-md-3">
                        <div class="navbar-header">
                            <div class="navbar-brand">
                                <h1>
                                    <a href="/">
                                        <img src="images/favicon.ico" width="30" height="30" alt="CSED GP LIBRARY" />
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
                                                @if (Route::has('login'))
                                                    <div class="top-right links">
                                                        @auth
                                                            <a href="{{ url('/home') }}">Home  </a>
                                                        @else
                                                            <a href="{{ route('login') }}">Login  </a>

                                                            @if (Route::has('register'))
                                                                <a href="{{ route('register') }}">Register</a>
                                                            @endif
                                                        @endauth
                                                    </div>
                                                @endif
                                        </div>
{{--                                        <div class="dropdown-menu cart-dropdown">--}}
{{--                                            <ul>--}}
{{--                                                <li class="clearfix">--}}
{{--                                                    <img src="images/header-cart-image-01.jpg" alt="cart item" />--}}
{{--                                                    <div class="item-info">--}}
{{--                                                        <div class="name">--}}
{{--                                                            <a href="#">The Great Gatsby</a>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="author"><strong>Author:</strong> F. Scott Fitzgerald</div>--}}
{{--                                                        <div class="price">1 X $10.00</div>--}}
{{--                                                    </div>--}}
{{--                                                    <a class="remove" href="#"><i class="fa fa-trash-o"></i></a>--}}
{{--                                                </li>--}}
{{--                                                <li class="clearfix">--}}
{{--                                                    <img src="images/header-cart-image-02.jpg" alt="cart item" />--}}
{{--                                                    <div class="item-info">--}}
{{--                                                        <div class="name">--}}
{{--                                                            <a href="#">The Great Gatsby</a>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="author"><strong>Author:</strong> F. Scott Fitzgerald</div>--}}
{{--                                                        <div class="price">1 X $10.00</div>--}}
{{--                                                    </div>--}}
{{--                                                    <a class="remove" href="#"><i class="fa fa-trash-o"></i></a>--}}
{{--                                                </li>--}}
{{--                                                <li class="clearfix">--}}
{{--                                                    <img src="images/header-cart-image-03.jpg" alt="cart item" />--}}
{{--                                                    <div class="item-info">--}}
{{--                                                        <div class="name">--}}
{{--                                                            <a href="#">The Great Gatsby</a>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="author"><strong>Author:</strong> F. Scott Fitzgerald</div>--}}
{{--                                                        <div class="price">1 X $10.00</div>--}}
{{--                                                    </div>--}}
{{--                                                    <a class="remove" href="#"><i class="fa fa-trash-o"></i></a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                            <div class="cart-total">--}}
{{--                                                <div class="title">SubTotal</div>--}}
{{--                                                <div class="price">$30.00</div>--}}
{{--                                            </div>--}}
{{--                                            <div class="cart-buttons">--}}
{{--                                                <a href="cart.html" class="btn btn-dark-gray">View Cart</a>--}}
{{--                                                <a href="checkout.html" class="btn btn-primary">Checkout</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-collapse hidden-sm hidden-xs">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="/home">Home</a>
                        </li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="news-events-list-view.html">News &amp; Events</a>
{{--                            <ul class="dropdown-menu">--}}
{{--                                <li><a href="news-events-list-view.html">News &amp; Events List View</a></li>--}}
{{--                                <li><a href="news-events-detail.html">News &amp; Events Detail</a></li>--}}
{{--                            </ul>--}}
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
                </div>
            </nav>
        </div>
    </div>
</header>
        <!-- End: Header Section -->

        <!-- Start: Slider Section -->
        <div data-ride="carousel" class="carousel slide" id="home-v1-header-carousel">

            <!-- Carousel slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <figure>
                        <img alt="Home Slide" src="images/header-slider/home-v1/header-slide.jpg"/>
                    </figure>
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Online Learning Anytime, Anywhere!</h3>
                            <h2>Discover Your Roots</h2>
                            <p>Find researches and projects released by students from your department on all the hot topics in your field.</p>
                            <div class="slide-buttons hidden-sm hidden-xs">
                                <a href="#" class="btn btn-primary">Read More</a>
                                <a href="/register" class="btn btn-default">Join Us</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <figure>
                        <img alt="Home Slide" src="images/header-slider/home-v2/header-slide.jpg"/>
                    </figure>
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Online Learning Anytime, Anywhere!</h3>
                            <h2>Insight About The Future</h2>
                            <p>Find the progress so far and the next steps to be done.</p>
                            <div class="slide-buttons hidden-sm hidden-xs">
                                <a href="#" class="btn btn-primary">Read More</a>
                                <a href="/register" class="btn btn-default">Join Us</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <figure>
                        <img alt="Home Slide" src="images/header-slider/home-v3/header-slide.jpg"/>
                    </figure>
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Online Learning Anytime, Anywhere!</h3>
                            <h2>Add Your Mark</h2>
                            <p>Add your work, contribute in building a better future with other graduates from your department.</p>
                            <div class="slide-buttons hidden-sm hidden-xs">
                                <a href="#" class="btn btn-primary">Read More</a>
                                <a href="/register" class="btn btn-default">Join Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#home-v1-header-carousel" data-slide="prev"></a>
            <a class="right carousel-control" href="#home-v1-header-carousel" data-slide="next"></a>
        </div>
        <!-- End: Slider Section -->

        <!-- Start: Search Section -->
        <section class="search-filters">
            <div class="container">
                <div class="filter-box">
                    <h3>What are you looking for at the library?</h3>
                    <form action="/show_results" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label class="sr-only" for="keywords">Search by Topic or Name</label>
                                <input class="form-control" placeholder="Search by Topic or Name" id="keyword" name="keywords" type="text">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                                <select class="option" id="year" name="year" >
                                    <option value="">Search by Year</option>
                                    <?php
                                    $years = array_combine(range(date("Y"), 1950), range(date("Y"), 1950));?>
                                    @foreach($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="form-group">
                                <input class="form-control" type="submit" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- End: Search Section -->

<!-- Start: Welcome Section -->
        <section class="welcome-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="welcome-wrap">
                            <div class="welcome-text">
                                <h2 class="section-title">Welcome to the CSED GP LIBRARY </h2>
                                <span class="underline left"></span>
                                <p class="lead">Your gate to the contribution of CS students.</p>
                                <p>There are many variations of passages of computer science available, all tend to prepare a better future for the coming generations. In our library we provide the majority of the huge contribution of all computer science researches and students to help current strudents to benefit from the previous done work and use it for building the future and leave their mark for the upcoming generations to find their way too.</p>
                                <a class="btn btn-primary" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="facts-counter">
                            <ul>
                                <li class="bg-light-green">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="ebook"></i>
                                        </div>
                                        <span>Projects<strong class="fact-counter">45780</strong></span>
                                    </div>
                                </li>
                                <li class="bg-green">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="magazine"></i>
                                        </div>
                                        <span>Papers<strong class="fact-counter">14450</strong></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="welcome-image"></div>
        </section>
        <!-- End: Welcome Section -->

<!-- Start: Category Filter -->
        <section class="category-filter section-padding">
            <div class="container">
                <div class="center-content">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <h2 class="section-title">Check Out The New Releases</h2>
                            <span class="underline center"></span>
                            <p class="lead">Your gate to the work of Computer Science students at Alexandria University.</p>
                        </div>
                    </div>
                </div>
                <div class="filter-buttons">
                    <div class="filter btn" data-filter="all">All Releases</div>
                    <div class="filter btn" data-filter=".computer-vision">Computer Vision</div>
                    <div class="filter btn" data-filter=".sentiment-analysis">Sentiment Analysis</div>
                    <div class="filter btn" data-filter=".big-data">Big Data</div>
                    <div class="filter btn" data-filter=".networking">Networking</div>
                    <div class="filter btn" data-filter=".cloud-computing">Cloud Computing</div>
                    <div class="filter btn" data-filter=".r-d">R & D</div>
                </div>
            </div>
            <div id="category-filter">
                <ul class="category-list">
                    <li class="category-item computer-vision">
                        <figure>
                            <img src="images/category-filter/computer-vision.jpg" alt="New Releaase" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>Object Detection</h4>
                                    <span class="author"><strong>Contributors:</strong> F. Scott Fitzgerald</span>
                                    <p>Object detection is the task of detecting instances of objects of a certain class within an image. The state-of-the-art methods can be categorized into two main types: one-stage methods and two stage-methods. One-stage methods prioritize inference speed.</p>
                                    <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="category-item sentiment-analysis">
                        <figure>
                            <img src="images/category-filter/sentana.jpg" alt="New Releaase" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>Polarity Classification</h4>
                                    <span class="author"><strong>Contributors:</strong> Marten Macman</span>
                                    <p>The process of computationally identifying and categorizing opinions expressed in a piece of text, especially in order to determine whether the writer's attitude towards a particular topic, product, etc. is positive, negative, or neutral.</p>
                                    <a href="/posts/2">Read More <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="category-item big-data">
                        <figure>
                            <img src="images/category-filter/big-data.jpg" alt="New Releaase" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>Information Management</h4>
                                    <span class="author"><strong>Contributors:</strong> Mohammed Magdi</span>
                                    <p>Information management concerns a cycle of organizational activity: the acquisition of information from one or more sources, the custodianship and the distribution of that information to those who need it, and its ultimate disposition through archiving or deletion.</p>
                                    <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="category-item networking">
                        <figure>
                            <img src="images/category-filter/net.jpg" alt="New Releaase" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>Contact Management System</h4>
                                    <span class="author"><strong>Contributors:</strong> F. A. Hather </span>
                                    <p>Networking is the exchange of information and ideas among people with a common profession or special interest, usually in an informal social setting. Networking often begins with a single point of common ground.</p>
                                    <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="category-item cloud-computing">
                        <figure>
                            <img src="images/category-filter/cloud.jpg" alt="New Releaase" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>Resource Pooling</h4>
                                    <span class="author"><strong>Contributors:</strong> H. Hytham Farid</span>
                                    <p>Cloud computing is the on-demand availability of computer system resources, especially data storage and computing power, without direct active management by the user. The term is generally used to describe data centers available to many users over the Internet.</p>
                                    <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="category-item r-d">
                        <figure>
                            <img src="images/category-filter/rd.jpg" alt="New Releaase" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>The future of Internet</h4>
                                    <span class="author"><strong>Contributor:</strong> F. Scott Fitzgerald</span>
                                    <p>Research and development, known in Europe as research and technological development, refers to innovative activities undertaken by corporations or governments in developing new services or products, or improving existing services or products.</p>
                                    <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="category-item computer-vision">
                        <figure>
                            <img src="images/category-filter/comvis.jpg" alt="New Releaase" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>Style Transfer</h4>
                                    <span class="author"><strong>Author:</strong> A. Scott Ng</span>
                                    <p>Neural Style Transfer (NST) refers to a class of software algorithms that manipulate digital images, or videos, to adopt the appearance or visual style of another image. NST algorithms are characterized by their use of deep neural networks in order to perform the image transformation. Common uses for NST are the creation of artificial artwork from photographs, for example by transferring the appearance of famous paintings to user supplied photographs. Several notable mobile apps use NST techniques for this purpose, including DeepArt and Prisma.</p>
                                    <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="category-item big-data">
                        <figure>
                            <img src="images/category-filter/bi.jpg" alt="New Releaase" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>Business Intelligence</h4>
                                    <span class="author"><strong>Author:</strong> F. Scott Fitzgerald</span>
                                    <p>Business intelligence comprises the strategies and technologies used by enterprises for the data analysis of business information. BI technologies provide historical, current, and predictive views of business operations.</p>
                                    <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                </ul>
                <div class="center-content">
                    <a href="/home" class="btn btn-primary">View More</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </section>
        <!-- Start: Category Filter -->

<!-- Start: Meet Staff -->
        <section class="team section-padding">
            <div class="container">
                <div class="center-content">
                    <h2 class="section-title">Meet Our Staff</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>
                <div class="team-list">
                    <div class="team-member">
                        <figure>
                            <img src="images/team-img-01.jpg" alt="team" />
                        </figure>
                        <div class="content-block">
                            <div class="member-info">
                                <h4>David J. Seleb</h4>
                                <span class="designation">AI Researcher</span>
                                <p>Junior faculty members shouldn’t choose a research topic just because it’s the current hot trend in industry. There are truly important fundamental problems to be solved. At the California Institute of Technology (Caltech). </p>
                                <a class="btn btn-primary" href="/profile/6">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <figure>
                            <img src="images/team-img-02.jpg" alt="team" />
                        </figure>
                        <div class="content-block">
                            <div class="member-info">
                                <h4>Robert Simmons</h4>
                                <span class="designation">Data Science Professor</span>
                                <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here...</p>
                                <a class="btn btn-primary" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <figure>
                            <img src="images/team-img-03.jpg" alt="team" />
                        </figure>
                        <div class="content-block">
                            <div class="member-info">
                                <h4>Anna Delpan</h4>
                                <span class="designation">Teacher Assistant</span>
                                <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here...</p>
                                <a class="btn btn-primary" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Meet Staff -->

<!-- Start: Our Community Section -->
        <section class="community-testimonial">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-title">Words From our Community</h2>
                    <span class="underline center"></span>
                    <p class="lead"> </p>
                </div>
                <div class="owl-carousel">
                    <div class="single-testimonial-box">
                        <div class="top-portion">
                            <img src="images/testimonial-image-01.jpg" alt="Testimonial Image" />
                            <div class="user-comment">
                                <div class="arrow-left"></div>
                                <blockquote cite="#">
                                    The community is very useful and everyone helps to provide a better understanding for each problem and the possible solutions.
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom-portion">
                            <a href="#" class="author">
                                Adrey Pachai <small>(Teaching Staff)</small>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-testimonial-box">
                        <div class="top-portion">
                            <img src="images/testimonial-image-02.jpg" alt="Testimonial Image" />
                            <div class="user-comment">
                                <div class="arrow-left"></div>
                                <blockquote cite="#">
                                    The website collected all the previous work of our colleagues and saved us time for searching for them.
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom-portion">
                            <a href="#" class="author">
                                Maria B <small>(Student </small>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-testimonial-box">
                        <div class="top-portion">
                            <img src="images/testimonial-image-01.jpg" alt="Testimonial Image" />
                            <div class="user-comment">
                                <div class="arrow-left"></div>
                                <blockquote cite="#">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna magna, rhoncus eget commodo et, dignissim non nulla. Sed sit amet vestibulum ex. Donec dolor velit
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom-portion">
                            <a href="#" class="author">
                                Adrey Pachai <small>(Student )</small>
                            </a>
                            <div class="social-share-links">
                                <ul>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-testimonial-box">
                        <div class="top-portion">
                            <img src="images/testimonial-image-02.jpg" alt="Testimonial Image" />
                            <div class="user-comment">
                                <div class="arrow-left"></div>
                                <blockquote cite="#">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna magna, rhoncus eget commodo et, dignissim non nulla. Sed sit amet vestibulum ex. Donec dolor velit
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom-portion">
                            <a href="#" class="author">
                                Maria B <small>(Student )</small>
                            </a>
                            <div class="social-share-links">
                                <ul>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-testimonial-box">
                        <div class="top-portion">
                            <img src="images/testimonial-image-01.jpg" alt="Testimonial Image" />
                            <div class="user-comment">
                                <div class="arrow-left"></div>
                                <blockquote cite="#">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna magna, rhoncus eget commodo et, dignissim non nulla. Sed sit amet vestibulum ex. Donec dolor velit
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom-portion">
                            <a href="#" class="author">
                                Adrey Pachai <small>(Student )</small>
                            </a>
                            <div class="social-share-links">
                                <ul>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-testimonial-box">
                        <div class="top-portion">
                            <img src="images/testimonial-image-02.jpg" alt="Testimonial Image" />
                            <div class="user-comment">
                                <div class="arrow-left"></div>
                                <blockquote cite="#">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna magna, rhoncus eget commodo et, dignissim non nulla. Sed sit amet vestibulum ex. Donec dolor velit
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom-portion">
                            <a href="#" class="author">
                                Maria B <small>(Student )</small>
                            </a>
                            <div class="social-share-links">
                                <ul>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-testimonial-box">
                        <div class="top-portion">
                            <img src="images/testimonial-image-01.jpg" alt="Testimonial Image" />
                            <div class="user-comment">
                                <div class="arrow-left"></div>
                                <blockquote cite="#">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna magna, rhoncus eget commodo et, dignissim non nulla. Sed sit amet vestibulum ex. Donec dolor velit
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom-portion">
                            <a href="#" class="author">
                                Adrey Pachai <small>(Student )</small>
                            </a>
                            <div class="social-share-links">
                                <ul>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-testimonial-box">
                        <div class="top-portion">
                            <img src="images/testimonial-image-02.jpg" alt="Testimonial Image" />
                            <div class="user-comment">
                                <div class="arrow-left"></div>
                                <blockquote cite="#">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna magna, rhoncus eget commodo et, dignissim non nulla. Sed sit amet vestibulum ex. Donec dolor velit
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom-portion">
                            <a href="#" class="author">
                                Maria B <small>(Student )</small>
                            </a>
                            <div class="social-share-links">
                                <ul>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Our Community Section -->

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
                                <li><a href="#">Research</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
<!-- End: Footer -->

<!-- jQuery Latest Version 1.x -->
<script type="text/javascript" src="../js/jquery-1.12.4.min.js"></script>

<!-- jQuery UI -->
<script type="text/javascript" src="../js/jquery-ui.min.js"></script>

<!-- jQuery Easing -->
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>

<!-- Bootstrap -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

<!-- Mobile Menu -->
<script type="text/javascript" src="../js/mmenu.min.js"></script>

<!-- Harvey - State manager for media queries -->
<script type="text/javascript" src="../js/harvey.min.js"></script>

<!-- Waypoints - Load Elements on View -->
<script type="text/javascript" src="../js/waypoints.min.js"></script>

<!-- Facts Counter -->
<script type="text/javascript" src="../js/facts.counter.min.js"></script>

<!-- MixItUp - Category Filter -->
<script type="text/javascript" src="../js/mixitup.min.js"></script>

<!-- Owl Carousel -->
<script type="text/javascript" src="../js/owl.carousel.min.js"></script>

<!-- Accordion -->
<script type="text/javascript" src="../js/accordion.min.js"></script>

<!-- Responsive Tabs -->
<script type="text/javascript" src="../js/responsive.tabs.min.js"></script>

<!-- Responsive Table -->
<script type="text/javascript" src="../js/responsive.table.min.js"></script>

<!-- Masonry -->
<script type="text/javascript" src="../js/masonry.min.js"></script>

<!-- Carousel Swipe -->
<script type="text/javascript" src="../js/carousel.swipe.min.js"></script>

<!-- bxSlider -->
<script type="text/javascript" src="../js/bxslider.min.js"></script>

<!-- Custom Scripts -->
<script type="text/javascript" src="../js/main.js"></script>

</body>


</html>
