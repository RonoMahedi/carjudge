@extends('layouts.frontend.header')

@section('title')
Car Judge - All Cras Review here
@endsection

@section('content')



<style media="screen">
    .star-rating {
        font-size: 1em;
    }

    .star-rating .fa-star {
        color: var(--mainBlue);
    }
</style>


<div style="background:#ECF0F1;padding:20px;">


    <section class="review py-5" id="review">
        <!--- brands part start--->


        <div class="container">

            <!---section title--->
            <div class="row mb-5">
                <div class="col d-flex flex-wrap justify-content-center">
                    <h1 class="font-weight-bold align-self-center mx-1 texting">Cars</h1>
                    <h1 class="section-title-special mx-1 texting">Reviews</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-12" style="text-align:center;">
                    <h1>All Cars Reviews</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-4 ml-auto">

                    <form class="form-inline" action="{{ url('/all/reviews/search') }}" method="get">
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="inputPassword2" class="sr-only">Enter Car Model</label>
                            <input type="text" class="form-control" name="search" id="inputPassword2" placeholder="Search Car Model">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                    </form>

                </div>
            </div>


            <div class="row mt-5">

                @foreach ($singlecar as $row)


                <div class="col-lg-3 col-md-4 col-sm-6 col-10 mx-auto mb-5">



                    <?php
                    $conn = mysqli_connect("localhost","root","","carjudge");
                    $query = mysqli_query($conn,"SELECT AVG(orating) as AVGRATE from reviews where car_id = '". $row->id ."'");
                         $row_rating = mysqli_fetch_array($query);
                          $AVGRATE=$row_rating['AVGRATE'];
                    $query = mysqli_query($conn,"SELECT count(orating) as Total from reviews where car_id = '". $row->id ."'");
                        $row_total = mysqli_fetch_array($query);
                        $Total=$row_total['Total'];
                   ?>

                    <div class="card">
                        <img src="{{ URL::to($row->car_image) }}" style="height:190px;" class="card-img-top" alt="">
                        <div class="card-body" style="text-align:center;">
                            <h5 class="card-title">{{ $row->car_model }}</h5>
                            <h6>{{ $row->year }}</h6>
                            <div class="star-rating">
                                <span style="font-size:22px;color:blue;"> <?php echo round($AVGRATE,1); ?> </span><br>
                                <span class="<?php if($AVGRATE >= 1){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="1" onclick="getOverall(1)"></span>
                                <span class="<?php if($AVGRATE >= 2){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="2" onclick="getOverall(2)"></span>
                                <span class="<?php if($AVGRATE >= 3){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="3" onclick="getOverall(3)"></span>
                                <span class="<?php if($AVGRATE >= 4){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="4" onclick="getOverall(4)"></span>
                                <span class="<?php if($AVGRATE >= 5){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="5" onclick="getOverall(5)"></span><br>

                                <small><?php echo $Total ?>&nbsp;reviews</small>
                            </div>
                            <div style="margin-top:12px;">
                                <a href="{{ url('/carsdetails/reviews/show/'.$row->id) }}" style="font-size:12px;" class="card-link">See all reviews</a>

                            </div>

                        </div>
                    </div>

                </div>


                @endforeach



            </div>

            {{ $singlecar->links() }}




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




    <section class="mostreview py-5">
        <div class="container">

            <div class="row">
                <div class="col-12" style="text-align:center;">
                    <h1>Most Wanted Cars Reviews</h1>
                </div>
            </div>






            <div class="row mt-5">

                <?php
$rr = DB::table('reviews')
->leftJoin('singlecar','reviews.car_id','singlecar.id')
->leftJoin('brands','singlecar.brands_id','brands.id')
->leftJoin('boverviews','singlecar.car_model_id','boverviews.id')
->select('car_id','singlecar.id','car_image','year','car_model',DB::raw('count(orating) as average'))
->groupBy('car_id','singlecar.id','car_image','year','car_model')
->orderBy('average', 'DESC')
->paginate(8);


   ?>

                @foreach ($rr as $row)


                <div class="col-lg-3 col-md-4 col-sm-6 col-10 mx-auto mb-5">


                    <?php
            $conn = mysqli_connect("localhost","root","","carjudge");
            $query = mysqli_query($conn,"SELECT AVG(orating) as AVGRATE from reviews where car_id = '". $row->id ."'");
                 $row_rating = mysqli_fetch_array($query);
                  $AVGRATE=$row_rating['AVGRATE'];
            $query = mysqli_query($conn,"SELECT count(orating) as Total from reviews where car_id = '". $row->id ."'");
                $row_total = mysqli_fetch_array($query);
                $Total=$row_total['Total'];
            ?>


                    <div class="card">
                        <img src="{{ URL::to($row->car_image) }}" style="height:190px;" class="card-img-top" alt="">
                        <div class="card-body" style="text-align:center;">
                            <h5 class="card-title">{{ $row->car_model }}</h5>
                            <h6>{{ $row->year }}</h6>
                            <div class="star-rating">
                                <span style="font-size:22px;color:blue;"> <?php echo round($AVGRATE,1); ?> </span><br>
                                <span class="<?php if($AVGRATE >= 1){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="1" onclick="getOverall(1)"></span>
                                <span class="<?php if($AVGRATE >= 2){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="2" onclick="getOverall(2)"></span>
                                <span class="<?php if($AVGRATE >= 3){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="3" onclick="getOverall(3)"></span>
                                <span class="<?php if($AVGRATE >= 4){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="4" onclick="getOverall(4)"></span>
                                <span class="<?php if($AVGRATE >= 5){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="5" onclick="getOverall(5)"></span><br>

                                <small><?php echo $Total ?>&nbsp;reviews</small>
                            </div>
                            <div style="margin-top:12px;">
                                <a href="{{ url('/carsdetails/reviews/show/'.$row->id) }}" style="font-size:12px;" class="card-link">See all reviews</a>

                            </div>

                        </div>
                    </div>

                </div>


                @endforeach






            </div>

            {{ $rr->links() }}

    </section>


</div>


</div>



@endsection
