@extends('layouts.frontend.header')

@section('title')
Car Judge - Saved cars list
@endsection

@section('content')
<br><br>
<section class="saved py-5">

    <div class="row">
        <div class="col-12">
            <h1 style="text-align:center;">My Saved Cars List</h1>
        </div>
    </div>



    <div class="container">

        <div class="row">

            @foreach ($savedata as $row)

            <!--single car--->
            <div class="col-10 mx-auto my-3 col-md-6 col-lg-4">
                <div class="card car-card">
                    <img src="{{ URL::to($row->car_image) }}" style="height:200px;" class="card-img-top car-img" alt="">
                    <!--card body-->
                    <div class="card-body">

                        <div class="car-info d-flex justify-content-between">
                            <!---first flex child--->
                            <div class="car-text text-uppercase">
                                <h6 class="font-weight-bold">{{ $row->name }}</h6>
                                <a href="{{ url('/brands/cardetails/'.$row->id) }}" style="text-decoration:none;">{{ $row->car_model }}</a>

                            </div>
                            <!---second flex child---->


                            <h5 class="car-value align-self-centr py-2 px-3">
                                <span class="car-price">৳{{ $row->car_price }}</span>
                            </h5>
                        </div>
                        <div class="col-12">
                            <a href="{{ url('/home/savecar/list/remove/'.$row->id) }}" class="btn btn-outline-danger btn-sm"style="text-decoration:none;font-size:12px;width:100%;margin:auto;margin-top:5px;">Remove from Saved Cars</a>
                        </div>

                    </div>
                    <!---end of card--->
                    <div class="card-footer text-capitalize justify-content-between">
                        <table class="table">
                            <tr>
                                <td><span><i class="fas fa-car"></i></span><br>{{ $row->body_type }}</td>
                                <td><span><i class="fas fa-cogs"></i></span><br>{{ $row->transmission }}</td>
                                <td><span><i class="fas fa-gas-pump"></i></span><br>{{ $row->fuel_type }}</td>
                            </tr>
                            <tr>
                                <td><span><i class="fas fa-check"></i>&nbsp;</span>{{ $row->year }}</td>
                                <td><span><i class="fas fa-tachometer-alt"></i>&nbsp;</span>{{ $row->engine }}</td>
                                <td><img src="{{ asset('images/car-seat.jpg')}}" alt="car-seat"> <span>&nbsp;</span> {{ $row->seat }}</td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
            <!--end single car--->


            @endforeach



        </div>

    </div>




</section>

@endsection
