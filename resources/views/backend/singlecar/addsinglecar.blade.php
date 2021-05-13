<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{asset('backend')}}/dist/css/adminlte.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" media="all" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}" media="all" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" media="screen">
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />



    <title>Car Judge - Add Car Details</title>

    <script src="{{ asset('js/app.js') }}"></script>
    <!---font---->
    <script src="{{ asset('js/all.js') }}"></script>

    </style>
    <script src=”https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js”></script>



</head>

<body class="hold-transition sidebar-mini layout-fixed">


    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('brands.show') }}" class="nav-link">Brands</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('allcaroverview') }}" class="nav-link">Car Models</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('allsinglecar') }}" class="nav-link">Car Details</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>

            </ul>



        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('dashboard') }}" class="brand-link">
                <img src="{{ asset('images/admin.png') }}" alt="Admin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>


            <!-- Sidebar Menu -->
            <!---brands menu--->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link">
                            <i class="fab fa-bandcamp"></i>
                            <p>
                                Brands
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('brands.add') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ADD</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('brands.show') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>SHOW</p>
                                </a>
                            </li>
                        </ul>
                    </li>



                    <!---Overviews menu---->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fab fa-wolf-pack-battalion"></i>
                            <p>
                                Car Models
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('addcaroverview') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ADD</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('allcaroverview') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>SHOW</p>
                                </a>
                            </li>
                        </ul>
                    </li>



                    <!---Single Car---->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-car"></i>
                            <p>
                                Single Car
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('addsinglecar') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ADD</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('allsinglecar') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>SHOW</p>
                                </a>
                            </li>
                        </ul>
                    </li>




                    <!---single nav--->

                    <li class="nav-item">
                        <a href="{{ url('/admin/allreviews') }}" class="nav-link">
                            <i class="fas fa-eye"></i>
                            <p>
                                Review
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('user') }}" class="nav-link">
                            <i class="fas fa-user"></i>
                            <p>
                                Register Users
                            </p>
                        </a>
                    </li>



                </ul>
            </nav>
            <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>
    <!---end side nav--->




    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Cars Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item">Cars Details</li>
                            <li class="breadcrumb-item active">Addcars</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>








        <!---start admin panel---->
        <div class="container">



            <div class="">

                <!-- Error message -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>





            <form action="{{ route('storesinglecar') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card card-info">

                    <div class="card-body">


                        <h3>over view</h3>

                        <div class="row">

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Choose Car Brand</label>
                                    <br>
                                    <select class="form-control text-size" id="brands_id" name="brands_id">
                                        <option>Select</option>
                                        @foreach ($brands as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Choose Car Model</label>
                                    <br>
                                    <select class="form-control text-size" id="car_model_id" name="car_model_id">
                                        <option disabled="" selected="">Select</option>

                                        <option value=""></option>

                                    </select>
                                </div>
                            </div>





                            <script type="text/javascript">
                                jQuery(document).ready(function() {

                                    jQuery('select[name="car_model_id"]').attr('disabled', 'disabled');

                                    jQuery('select[name="brands_id"]').on('change', function() {
                                        var brandID = jQuery(this).val();
                                        if (brandID) {
                                            jQuery('select[name="car_model_id"]').attr('disabled', 'disabled');


                                            jQuery.ajax({
                                                url: '/admingetmodels/' + brandID,
                                                type: "GET",
                                                dataType: "json",
                                                success: function(data) {
                                                    jQuery('select[name="car_model_id"]').empty();

                                                    $('select[name="car_model_id"]').append('<option selected="" disabled="">Select</option>');

                                                    jQuery.each(data, function(key, value) {
                                                        $('select[name="car_model_id"]').append('<option value="' + key + '">' + value + '</option>');
                                                    });
                                                    jQuery('select[name="car_model_id"]').removeAttr('disabled');
                                                }
                                            });

                                        } else {
                                            $('select[name="car_model_id"]').empty();

                                        }
                                    });


                                });
                            </script>









                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Fuel Type</label>
                                    <br>
                                    <input type="text" value="{{ old('fuel_type') }}" class="form-control text-size" name="fuel_type">
                                </div>
                            </div>


                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Engine Displacement</label> <small>cc</small>
                                    <br>
                                    <input type="text" value="{{ old('engine') }}" class="form-control text-size" name="engine">
                                </div>
                            </div>


                        </div>







                        <div class="row">
                            <div class="col-md-3  my-2">
                                <div class="floating-label-form-group">
                                    <label>Car Price</label> <small>(5-8 figure)</small>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('car_price') }}" name="car_price">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Body Type</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('body_type') }}" name="body_type">
                                </div>
                            </div>



                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Transmission</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('transmission') }}" name="transmission">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Seating Capacity</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('seat') }}" name="seat">
                                </div>
                            </div>


                        </div>



                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Year</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('year') }}" name="year">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Max Power (bpm@rpm)</label>
                                            <br>
                                            <input type="text" class="form-control text-size" value="{{ old('max_power') }}" name="max_power">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Boot Space (litres)</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('boot_space') }}" name="boot_space">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Fuel Tank Capacity</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('fuel_tank') }}" name="fuel_tank">
                                </div>
                            </div>

                        </div>

                        <br><br>

                        <h3>Comfort & Convenience</h3>

                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Power Steering</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('power_steering') }}" name="power_steering">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Power Windows Front</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('power_w_f') }}" name="power_w_f">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Power Windows Rear</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('p_w_r') }}" name="p_w_r">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Remote Trunk Opener</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('rem_tank_opener') }}" name="rem_tank_opener">
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Remote Fuel Lid Opener</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('rem_fuel_lid_opener') }}" name="rem_fuel_lid_opener">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>low fuel warning light</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('l_f_w_l') }}" name="l_f_w_l">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>accessory power outlet</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('a_p_o') }}" name="a_p_o">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Trunk light</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('t_l') }}" name="t_l">
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Vanity Mirror</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('v_m') }}" name="v_m">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>rear reading lamp</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('r_r_l') }}" name="r_r_l">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>rear seat headrest</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('r_s_h') }}" name="r_s_h">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>height adjustable front seat belts</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('h_a_f_s_b') }}" name="h_a_f_s_b">
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>cup holders front </label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('c_h_f') }}" name="c_h_f">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>cup holders rear</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('c_h_r') }}" name="c_h_r">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>rear AC vents</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('r_a_v') }}" name="r_a_v">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>multifunctional steering wheel</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('m_f_w') }}" name="m_f_w">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>parking sensors</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('p_s') }}" name="p_s">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>engine start stop button</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('e_s_s_b') }}" name="e_s_s_b">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>bottle holders</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('b_h') }}" name="b_h">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>battery saver</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('b_s') }}" name="b_s">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>lane change indicator </label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('l_c_i') }}" name="l_c_i">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>air conditioner</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('a_c') }}" name="a_c">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>heater</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('heater') }}" name="heater">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>adjustable steering</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('a_s') }}" name="a_s">
                                </div>
                            </div>

                        </div>



                        <br><br>

                        <h3>Safety</h3>

                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>anti lock breaking system</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('a_l_b_s') }}" name="a_l_b_s">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>brake assist</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('b_a') }}" name="b_a">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>central locking</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('central_locking') }}" name="central_locking">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>power door locks</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('power_d_locks') }}" name="power_d_locks">
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>child safety locks</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('child_s_locks') }}" name="child_s_locks">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>anti theft alarm</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('a_th_a') }}" name="a_th_a">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>no of airbags</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('no_o_a') }}" name="no_o_a">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>driver airbag</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('driver_air') }}" name="driver_air">
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>passenger airbag</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('passenger_air') }}" name="passenger_air">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>xenon headlamps</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('xenon_headlamps') }}" name="xenon_headlamps">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>halogen headlamps</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('halo_he') }}" name="halo_he">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>rear seat belts</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('r_seat_be') }}" name="r_seat_be">
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>seat belt warning </label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('seat_belt_w') }}" name="seat_belt_w">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>door ajar warning</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('door_ajar_w') }}" name="door_ajar_w">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>adjustable seats</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('adjustable_seat') }}" name="adjustable_seat">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>engine immobilizer</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('engine_immobilizer') }}" name="engine_immobilizer">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>crash sensor</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('crash_sensor') }}" name="crash_sensor">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Centrally Mounted Fuel Tank</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('c_mounted_f_t') }}" name="c_mounted_f_t">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Rear Camera</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('rear_camera') }}" name="rear_camera">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Anti Theft Device</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('a_theft_d') }}" name="a_theft_d">
                                </div>
                            </div>

                        </div>



                        <br><br>

                        <h3>Entertainment & communication </h3>

                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>cd player</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('cd_player') }}" name="cd_player">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>dvd player</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('dvd_player') }}" name="dvd_player">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>radio</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('radio') }}" name="radio">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>audio system remote control</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('audio_system_remote') }}" name="audio_system_remote">
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>speaker front</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('speaker_front') }}" name="speaker_front">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>speaker rear</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('speaker_rear') }}" name="speaker_rear">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>usb and auxilary input</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('u_a_a_i') }}" name="u_a_a_i">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>bluetooth connectivity</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('bl_c') }}" name="bl_c">
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>touch screen</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('touch_s') }}" name="touch_s">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>number of speaker</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('n_speaker') }}" name="n_speaker">
                                </div>
                            </div>


                        </div>



                        <br><br>

                        <h3>Interior</h3>

                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>tachometer</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('tachometer') }}" name="tachometer">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>electronic multi tripmeter</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('el_m_te') }}" name="el_m_te">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>leather seats</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('lether_seat') }}" name="lether_seat">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>leather steering wheel</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('l_steering_w') }}" name="l_steering_w">
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>glove compartment</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('g_compart') }}" name="g_compart">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>digital clock</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('digital_clock') }}" name="digital_clock">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>cigarate lighter</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('cigarate_lighter') }}" name="cigarate_lighter">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>digital odometer</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('disi_odomet') }}" name="disi_odomet">
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Height Adjustable Driver Seat</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('h_a_d_seat') }}" name="h_a_d_seat">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Ventilated Seats</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('ventilated_seat') }}" name="ventilated_seat">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Dual Tone Dashboard</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('dual_tone') }}" name="dual_tone">
                                </div>
                            </div>


                        </div>






                        <br><br>

                        <h3>Fuel & performance</h3>

                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>fuel type</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('fuel_ty') }}" name="fuel_ty">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>mileage (city)</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('mileage_c') }}" name="mileage_c">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>mileage(arai)</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('mileage_a') }}" name="mileage_a">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>fuel tank capacity (litres)</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('f_t_capacity') }}" name="f_t_capacity">
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>top speed (kmph)</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('top_sp') }}" name="top_sp">
                                </div>
                            </div>


                        </div>




                        <br><br>

                        <h3>Engine & transmission</h3>

                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Engine type</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('engine_type') }}" name="engine_type">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>engine displacement</label> <small>cc</small>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('engine_dis') }}" name="engine_dis">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Max Power (bhp@rpm)</label>
                                            <br>
                                            <input type="text" class="form-control text-size" value="{{ old('max_powe') }}" name="max_powe">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Max Torque (nm@rpm)</label>
                                            <br>
                                            <input type="text" class="form-control text-size" value="{{ old('max_torque') }}" name="max_torque">
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>No Of Cylinder</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('no_of_cy') }}" name="no_of_cy">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Valves Per Cylinder</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('va_of_cy') }}" name="va_of_cy">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Valve Configuration</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('va_conf') }}" name="va_conf">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>Fuel Supply System</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('fuel_s_sys') }}" name="fuel_s_sys">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>turbo charger</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('turbo_ch') }}" name="turbo_ch">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>super charger</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('super_ch') }}" name="super_ch">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>transmission type</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('trans_ty') }}" name="trans_ty">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>gear box</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('gear_b') }}" name="gear_b">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>drive type</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('drive_type') }}" name="drive_type">
                                </div>
                            </div>
                        </div>



                        <br><br>

                        <h3>Dimention & capacity</h3>

                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>lenght(mm)</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('lenght') }}" name="lenght">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>width(mm)</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('width') }}" name="width">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>height(mm)</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('height') }}" name="height">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>ground clearance unladen(mm)</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('g_clear') }}" name="g_clear">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>wheel base (mm)</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('wheel_base') }}" name="wheel_base">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>front tread(mm)</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('front_tread') }}" name="front_tread">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>rear tread(mm)</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('rear_tread') }}" name="rear_tread">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>kerb weight(kg)</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('kerb_weight') }}" name="kerb_weight">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>grossweight (mm)</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('gross_weight') }}" name="gross_weight">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>seating capacity</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('seating_no') }}" name="seating_no">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>boot space(litres)</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('bootspace_li') }}" name="bootspace_li">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>no. of doors</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('doors_no') }}" name="doors_no">
                                </div>
                            </div>

                        </div>


                        <br><br>

                        <h3>Suspension, steering & brakes</h3>

                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>front suspension</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('front_sus') }}" name="front_sus">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>rear suspension</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('rear_sus') }}" name="rear_sus">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>steering type</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('steering_type') }}" name="steering_type">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>steering gear type</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('steering_gear_type') }}" name="steering_gear_type">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>turing radius(metres)</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('turning_r') }}" name="turning_r">
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>front brake type</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('front_brake') }}" name="front_brake">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>rear brake type</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('rear_brake') }}" name="rear_brake">
                                </div>
                            </div>

                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>top speed (kmph)</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('top_speed') }}" name="top_speed">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="floating-label-form-group">
                                    <label>acceleration(seconds)</label>
                                    <br>
                                    <input type="text" class="form-control text-size" value="{{ old('acceleration_t') }}" name="acceleration_t">
                                </div>
                            </div>

                            <div class="col-md-3 " style="margin-top:8px;">
                                <div class="floating-label-form-group">
                                    <label for="exampleInputFile"> Add car Image </label>
                                    <input type="file" class="form-control text-size" name="car_image">

                                </div>
                            </div>

                        </div>



                        <div class="row py-3">
                            <div class="col-md-12" style="margin-left:400px;">
                                <button type="submit" class="btn btn-success btn-lg mr-3">SUBMIT</button>
                                <a href="{{ route('allsinglecar') }}" class="btn btn-danger btn-lg">CANCEL</a>
                            </div>
                        </div>






                        <!---from ending--->

                    </div>
                </div>

            </form>







        </div>




    </div>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>


    <!---jquery---->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <!----script js---->
    <script src="{{ asset('js/script.js') }}"></script>
    <!----bootstrap js---->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{asset('backend')}}/dist/js/adminlte.js"></script>




    <script src="{{ asset('js/select2.full.min') }}"></script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        < blade
        if (Session::has('message')) />
        var type = "{{Session::get('alert-type','info')}}"
        switch (type) {
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
        } <
        blade endif / >
    </script>




</body>

</html>
