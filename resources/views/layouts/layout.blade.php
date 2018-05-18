
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- Site Title -->
    <title>Blog @yield('title')</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">
    <!-- Fonts for icons -->
    <link href="{{asset('web-fonts-with-css/css/fontawesome-all.min.css')}}" rel="stylesheet">
    <!-- bootstrap -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Plugins CSS -->
    <link href="{{asset('css/plugins/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/aos.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/spacing-and-height.css')}}" rel="stylesheet">
    <!-- Style CSS -->
    <link href="{{asset('css/theme-modules.css')}}" rel="stylesheet">
</head>

<body>
    <div id="main-content">
        <!-- Header -->
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{url('/')}}">
                    Blog

                </a>
                <button class="navbar-toggler hamburger-menu-btn" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span>toggle menu</span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown mega_menu_holder">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        
                       
                        <li class="nav-item dropdown mega_menu_holder">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Blogs</a>
                            <ul class="dropdown-menu mega_menu">

                        
                                <li>
                                     <a class="dropdown-item" href="{{url('category/1')}}">Travel</a>
                                </li>
                                

                                <li>
                                     <a class="dropdown-item" href="{{url('category/2')}}">Photography</a>
                                </li>


                                <li>
                                     <a class="dropdown-item" href="{{url('category/3')}}">Food</a>
                                </li>
                                
                                    

                                </li>
                                
                
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/about')}}" id="navbarDropdownMenuLinkShop">About Bloggers</a>
                        </li>

                        @guest
                        <li class="nav-item">
                           <a class="become-blogger nav-link" href="{{ route('register') }}">Become Blogger</a>
                        </li>
                         <li class="nav-item">
                           <a class="become-blogger nav-link" href="{{ route('login') }}">Login</a>
                        </li>

                        @else
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="user/{{Auth::id()}}">Profile & Posts</a>
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>



                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest
                       
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Header -->
        
        @yield('content')

    </div>
    <!-- ================================================== -->
    <!-- Placed js files at the end of the document so the pages load faster -->
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/aos.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/isotope.pkgd.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/jquery.countdown.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/jquery.countTo.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/jquery.easing.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/onepage.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/instafeed.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/imagesloaded.pkgd.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/contact-us.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/twitterFetcher_min.js')}}"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAE_JprYsi2sHzUcl8u1DbcUgQnDveJWs4"></script>
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
</body>

</html>