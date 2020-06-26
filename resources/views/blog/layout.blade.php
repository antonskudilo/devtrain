<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon icon -->

    <title>Blog</title>

    <!-- common css -->
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet" />

{{--    <link href="{{ asset("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css") }}" rel="stylesheet" />--}}
{{--    <link href="{{ asset("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css") }}" rel="stylesheet" />--}}
    <!-- HTML5 shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]-->
{{--    <script src="assets/js/html5shiv.js"></script>--}}
{{--    <script src="assets/js/respond.js"></script>--}}
{{--    <![endif]-->--}}

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
</head>

<body>

<nav class="navbar main-menu navbar-default">
    <div class="container">
        <div class="menu-content">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt=""></a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

{{--                <ul class="nav navbar-nav text-uppercase">--}}
{{--                    <li><a href="#">Homepage</a></li>--}}
{{--                    <li><a href="about-me.html">ABOUT ME </a></li>--}}
{{--                    <li><a href="contact.html">CONTACT</a></li>--}}
{{--                </ul>--}}

                <ul class="nav navbar-nav text-uppercase pull-right">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <li><a href="{{ route('profile') }}">My profile</a></li>
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    @else
                        <li><a href="{{ route('registerForm') }}">Register</a></li>
                        <li><a href="{{ route('loginForm') }}">Login</a></li>
                    @endif
                </ul>

            </div>
            <!-- /.navbar-collapse -->


            <div class="show-search">
                <form role="search" method="get" id="searchform" action="#">
                    <div>
                        <input type="text" placeholder="Search and hit enter..." name="s" id="s">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>


<!--main content start-->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-info" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
</div>


@yield('content')

<!-- end main content-->
<!--footer start-->
<div id="footer">
    <div class="footer-instagram-section">
        <h3 class="footer-instagram-title text-center text-uppercase">Instagram</h3>

        <div id="footer-instagram" class="owl-carousel">

            <div class="item">
                <a href="#"><img src="{{ asset('img/ins-1.jpg') }}" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="{{ asset('img/ins-2.jpg') }}" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="{{ asset('img/ins-3.jpg') }}" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="{{ asset('img/ins-4.jpg') }}" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="{{ asset('img/ins-5.jpg') }}" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="{{ asset('img/ins-6.jpg') }}" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="{{ asset('img/ins-7.jpg') }}" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="{{ asset('img/ins-8.jpg') }}" alt=""></a>
            </div>

        </div>
    </div>
</div>

<footer class="footer-widget-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <aside class="footer-widget">
                    <div class="about-img"><img src="{{ asset('img/footer-logo.png') }}" alt="Kotha"></div>
                    <div class="about-content">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                        diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed
                        voluptua. At vero eos et accusam et justo duo dlores et ea rebum magna text ar koto din.
                    </div>
                    <div class="address">
                        <h4 class="text-uppercase">contact Info</h4>

                        <p> 239/2 NK Street, DC, USA</p>

                        <p> Phone: +123 456 78900</p>

                        <p>theme@kotha.com</p>
                    </div>
                </aside>
            </div>

            <div class="col-md-4">
                <aside class="footer-widget">
                    <h3 class="widget-title text-uppercase">Testimonials</h3>

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!--Indicator-->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="single-review">
                                    <div class="review-text">
                                        <p>Lorem ipsum dolor sit amet, conssadipscing elitr, sed diam nonumy eirmod
                                            tempvidunt ut labore et dolore magna aliquyam erat,sed diam voluptua. At
                                            vero eos et accusam justo duo dolores et ea rebum.gubergren no sea takimata
                                            magna aliquyam eratma</p>
                                    </div>
                                    <div class="author-id">
                                        <img src="{{ asset('img/author.png') }}" alt="">

                                        <div class="author-text">
                                            <h4>Anthony DiPrizio</h4>

                                            <h4>CEO</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single-review">
                                    <div class="review-text">
                                        <p>Lorem ipsum dolor sit amet, conssadipscing elitr, sed diam nonumy eirmod
                                            tempvidunt ut labore et dolore magna aliquyam erat,sed diam voluptua. At
                                            vero eos et accusam justo duo dolores et ea rebum.gubergren no sea takimata
                                            magna aliquyam eratma</p>
                                    </div>
                                    <div class="author-id">
                                        <img src="{{ asset('img/author.png') }}" alt="">

                                        <div class="author-text">
                                            <h4>Anthony DiPrizio</h4>

                                            <h4>CEO</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single-review">
                                    <div class="review-text">
                                        <p>Lorem ipsum dolor sit amet, conssadipscing elitr, sed diam nonumy eirmod
                                            tempvidunt ut labore et dolore magna aliquyam erat,sed diam voluptua. At
                                            vero eos et accusam justo duo dolores et ea rebum.gubergren no sea takimata
                                            magna aliquyam eratma</p>
                                    </div>
                                    <div class="author-id">
                                        <img src="{{ asset('img/author.png') }}" alt="">

                                        <div class="author-text">
                                            <h4>Anthony DiPrizio</h4>

                                            <h4>CEO</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </aside>
            </div>
            <div class="col-md-4">
                <aside class="footer-widget">
                    <h3 class="widget-title text-uppercase">Custom Category Post</h3>


                    <div class="custom-post">
                        <div>
                            <a href="#"><img src="{{ asset('img/footer-img.png') }}" alt=""></a>
                        </div>
                        <div>
                            <a href="#" class="text-uppercase">Home is peaceful Place</a>
                            <span class="p-date">February 15, 2016</span>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">&copy; 2017 <a href="#">Blog, </a> Designed with <i
                            class="fa fa-heart"></i> by <a href="#">Marlin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- js files -->


</body>
<script src="{{ asset('js/blog.js') }}"></script>


{{--<script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') }}"></script>--}}

</html>
