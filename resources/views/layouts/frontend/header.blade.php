<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>


    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/header.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/brands.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/service.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/compare.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/contact.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/review.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" media="screen">
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>



    <script src="{{ asset('js/app.js') }}"></script>
    <!---font---->
    <script src="{{ asset('js/all.js') }}"></script>

    @stack('css')




    <style media="screen">
    .nav-item a:hover, .active{
      border-bottom: 1px solid black;
    }
    </style>







</head>

<body>


    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #e3f2fd;opacity:0.9;">
            <div class="container">


                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ URL::to('images/logo.png') }}" width="30" height="30" class="d-inline-block align-top header-img" alt="">
                    CarJudge
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">

                        </li>
                        <li class="nav-item {{ Request::is('brands') ? 'active' : '' }}">
                            <a class="nav-link" style="color:black;" href="{{ route('brand_page') }}">Brands</a>
                        </li>
                        <li class="nav-item {{ Request::is('compares') ? 'active' : '' }}">
                            <a class="nav-link" style="color:black;" href="{{ route('compare_page') }}">Compare</a>
                        </li>
                        <li class="nav-item {{ Request::is('services') ? 'active' : '' }}">
                            <a class="nav-link" style="color:black;" href="{{ route('service_page') }}">Service</a>
                        </li>
                        <li class="nav-item {{ Request::is('reviews') ? 'active' : '' }}">
                            <a class="nav-link" style="color:black;" href="{{ route('review_page') }}">Reviews</a>
                        </li>
                        <li class="nav-item {{ Request::is('contacts') ? 'active' : '' }}">
                            <a class="nav-link" style="color:black;" href="{{ route('contact_page') }}">Contact</a>
                        </li>

                        @guest
                        <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                            <a class="nav-link" style="color:black;" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item {{ Request::is('register') ? 'active' : '' }}">
                            <a class="nav-link" style="color:black;" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" style="color:black;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                                <a class="dropdown-item" style="color:black;" href="{{ route('user.profile', Auth::user()->id ) }}"><i class="fas fa-user"></i>&nbsp;&nbsp;My Profile</a>
                                <?php
                                $savedata = DB::table('savedcars')
                                  ->leftJoin('users','savedcars.user_id','users.id')
                                  ->leftJoin('singlecar','savedcars.car_id','singlecar.id')
                                  ->leftJoin('brands','singlecar.brands_id','brands.id')
                                  ->leftJoin('boverviews','singlecar.car_model_id','boverviews.id')
                                  ->where('savedcars.user_id','=',Auth::user()->id)
                                  ->select('savedcars.car_id','singlecar.id')
                                  ->get();

                                $count = $savedata->count();
                                ?>

                                <a class="dropdown-item" style="color:black;" href="{{ url('/home/savecar/list') }}" onclick=""><i class="fas fa-heart"></i>&nbsp;&nbsp;Saved Cars (<?php echo $count ?>)</a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" style="color:black;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;{{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest

                    </ul>
                </div>
        </nav>


        </div>


    </header>









    @yield('content')






    <!-- Footer -->
    <footer class="page-footer pt-3">

        <!-- Footer Links -->
        <div class="container text-center">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3">

                    <!-- Content -->
                    <h5 class="font-weight-bold" style="color:#ecf0f1;">CarJude</h5>
                    <hr style="border: 1px solid #ecf0f1;border-radius: 5px;width:60px;">
                    <p class="text-footer">
                        <a href="#" style="color:#ecf0f1">About</a>
                    </p>
                    <p class="text-footer">
                        <a href="" style="color:#ecf0f1">Contact</a>
                    </p>
                    <p class="text-footer">
                        <a href="" style="color:#ecf0f1">Site Map</a>
                    </p>
                    <p class="text-footer">
                        <a href="#" style="color:#ecf0f1">Loan Calculator</a>
                    </p>
                    <p class="text-footer">
                        <a href="#" style="color:#ecf0f1">Fraud Awareness</a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mb-4">
                    <h5 class="font-weight-bold" style="color:#ecf0f1">Buying & Selling</h5>
                    <hr style="border: 1px solid #ecf0f1;border-radius: 5px;width:60px;">
                    <p class="text-footer">
                        <a href="#" style="color:#ecf0f1">Find a Car</a>
                    </p>
                    <p class="text-footer">
                        <a href="#" style="color:#ecf0f1">Sell Your Car</a>
                    </p>
                    <p class="text-footer">
                        <a href="#" style="color:#ecf0f1">Car Dealers</a>
                    </p>
                    <p class="text-footer">
                        <a href="#" style="color:#ecf0f1">Compare Car Prices</a>
                    </p>

                </div>
                <!-- Grid column -->


                <!-- Grid column -->
                <div class="col-md-6 col-lg-6 col-xl-6 text-center">
                    <div class="footer-icons justify-content-around">
                        <h5 class="font-weight-bold" style="color:#ecf0f1">Connect With Us</h5>
                        <hr style="border: 1px solid #ecf0f1;border-radius: 5px;width:60px;">
                        <a href="" style="text-decoration: none;" class="footer-icon">
                            <i class="fab fa-facebook ficon"></i>
                        </a>
                        <a href="" style="text-decoration: none;" class="footer-icon">
                            <i class="fab fa-twitter ficon"></i>
                        </a>
                        <a href="" style="text-decoration: none;" class="footer-icon">
                            <i class="fab fa-instagram ficon"></i>
                        </a>
                        <a href="" style="text-decoration: none;" class="footer-icon">
                            <i class="fab fa-linkedin ficon"></i>
                        </a>
                        <a href="" style="text-decoration: none;" class="footer-icon">
                            <i class="fab fa-google-plus ficon"></i>
                        </a>
                    </div>
                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>

        <div class="footer-copyright text-center" style="padding:5px;">© 2020 Copyright
            <a href="{{ url('/') }}"> CarJudge</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->






    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <!---jquery---->

    <!----script js---->
    <script src="{{ asset('js/script.js') }}"></script>
    <!----bootstrap js---->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/select2.full.min') }}"></script>

    <script src="{{asset('backend')}}/dist/js/adminlte.js"></script>




    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
      @if(Session::has('message'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type) {
            case 'info':
                  toastr.info("{{ Session::get('message') }}");
                  break;
            case 'success':
                 toastr.success("{{ Session::get('message') }}");
                 break;
            case 'warning':
                 toastr.warning("{{ Session::get('message') }}");
                 break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                 break;
          }
          @endif
    </script>




</body>

</html>
