@extends('layouts.frontend.header')

@section('title')
Car Judge - All Cras Review here
@endsection

@section('content')



<style media="screen">
    .star-rating {
        font-size: 0.75em;
        cursor: pointer;
    }

    .star-rating .fa-star {
        color: var(--mainBlue);
    }
</style>


<div style="background:#ECF0F1;padding:20px;">


    <section class="review" id="review">
        <!--- brands part start--->


        <div class="container">

            <!---section title--->
            <div class="row mb-5">
                <div class="col d-flex flex-wrap justify-content-center">
                    <h1 class="font-weight-bold align-self-center mx-1 texting">Cars</h1>
                    <h1 class="section-title-special mx-1 texting">Reviews</h1>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-10 mx-auto col-md-12 d-flex justify-content-center">
                    <button class="btn btn-outline-secondary text-uppercase mx-2 btn-sm filter-btn" onclick="getFilter('exam')" data-filter="exam" type="button" name="button">After examination drove</button>
                    <button class="btn btn-outline-secondary text-uppercase mx-2 btn-sm filter-btn" onclick="getFilter('current')" data-filter="current" type="button" name="button">I currently purchase it</button>
                    <button class="btn btn-outline-secondary text-uppercase mx-2 btn-sm filter-btn" onclick="getFilter('enjoy')" data-filter="enjoy" type="button" name="button">I still enjoy this car</button>
                </div>
            </div>







            <div class="row">


                @foreach ($reviews as $row)

                <div class="col-lg-3 col-md-4 col-sm-6 col-12 py-3 single-car {{ $row->type }}">

                    <div class="card mb-3" style="height:250px;box-sizing:border-box;">
                        <div class="card-body">

                            <div class="star-rating">
                                <span class="<?php if($row->orating >= 1){echo "fas";} ;?> fa-star o" data-overall="1" onclick="getOverall(1)"></span>
                                <span class="<?php if($row->orating >= 2){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="2" onclick="getOverall(2)"></span>
                                <span class="<?php if($row->orating >= 3){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="3" onclick="getOverall(3)"></span>
                                <span class="<?php if($row->orating >= 4){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="4" onclick="getOverall(4)"></span>
                                <span class="<?php if($row->orating >= 5){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="5" onclick="getOverall(5)"></span>
                            </div>
                            <div>
                                <h5 style="margin-bottom:0px">{{ $row->heading }}</h5><small style="font-size:12px;">Posted By <b>{{ $row->name }}</b></small>
                            </div>
                            <div style="margin-top:15px;height:80px;overflow:hidden;">
                                <p style="font-size:15px;">{{ $row->message }}</p>
                            </div>

                            <div style="margin-bottom:5px;margin-top:5px;">
                                <a style="text-decoration:none;font-size:11px;" class="btn btn-sm btn-primary" href="{{ url('/carsdetails/reviews/individual/'.$row->user_id) }}">See full review</a>&nbsp;&nbsp;
                                <a href="{{ url('/carsdetails/reviews/'.$row->car_id) }}" class="btn btn-sm btn-primary" style="text-decoration:none;font-size:11px;">Post Review</a>
                            </div>
                            <small class="text-muted">{{ date('M j, Y h:ia', strtotime($row->created_at)) }}</small>

                        </div>
                    </div>


                </div>

                @endforeach



                {{ $reviews->links() }}
            </div>


{{-- <?php $dt = Carbon\Carbon::now(); echo $dt;  ?> --}}






            <script type="text/javascript">
                function getFilter(filter) {
                    $(".filter-btn").click(function() {

                        var type = $(this).data('filter');
                        // console.log(launched);
                        var singlecar = document.querySelectorAll('.single-car')
                        // console.log(singlecar);
                        singlecar.forEach(car => {

                            if (car.classList.contains(type)) {
                                car.style.display = "block";
                            } else {
                                car.style.display = "none";
                            }

                        })
                    });
                }
            </script>










        </div>

    </section>


</div>



@endsection
