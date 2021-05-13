@extends('layouts.frontend.header')

@section('title')
  Car Judge - Show All {{ $singlecar->car_model }} Reviews here
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
<?php
$conn = mysqli_connect("localhost","root","","carjudge");
$query = mysqli_query($conn,"SELECT AVG(orating) as AVGRATE from reviews where car_id = '". $singlecar->id ."'");
     $row_rating = mysqli_fetch_array($query);
      $OAVGRATE=$row_rating['AVGRATE'];
$query = mysqli_query($conn,"SELECT AVG(crating) as AVGRATE from reviews where car_id = '". $singlecar->id ."'");
      $row_rating = mysqli_fetch_array($query);
      $CAVGRATE=$row_rating['AVGRATE'];
$query = mysqli_query($conn,"SELECT AVG(irating) as AVGRATE from reviews where car_id = '". $singlecar->id ."'");
      $row_rating = mysqli_fetch_array($query);
      $IAVGRATE=$row_rating['AVGRATE'];
$query = mysqli_query($conn,"SELECT AVG(prating) as AVGRATE from reviews where car_id = '". $singlecar->id ."'");
      $row_rating = mysqli_fetch_array($query);
      $PAVGRATE=$row_rating['AVGRATE'];
$query = mysqli_query($conn,"SELECT AVG(mrating) as AVGRATE from reviews where car_id = '". $singlecar->id ."'");
      $row_rating = mysqli_fetch_array($query);
      $MAVGRATE=$row_rating['AVGRATE'];
$query = mysqli_query($conn,"SELECT AVG(rrating) as AVGRATE from reviews where car_id = '". $singlecar->id ."'");
     $row_rating = mysqli_fetch_array($query);
     $RAVGRATE=$row_rating['AVGRATE'];




$query = mysqli_query($conn,"SELECT count(orating) as Total from reviews where car_id = '". $singlecar->id ."'");
    $row = mysqli_fetch_array($query);
    $Total=$row['Total'];

 ?>


<img src="{{ asset('images/review.jpg') }}" style="height:150px; width:100%;" alt="">
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">

            <h2>Consumer Reviews</h2>
            <h4>{{ $singlecar->car_model }}</h4>

            <img src="{{ URL::to($singlecar->car_image) }}" style="height:75%;width:90%;" alt="">

        </div>

        <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
            <br>
            <h6 style="font-weight:bold;">Overall Review Score</h6>
            <div class="star-rating">
                <span style="font-size:22px;color:blue;"> <?php echo round($OAVGRATE,1); ?> </span><br>
                <span class="<?php if($OAVGRATE >= 1){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="1" onclick="getOverall(1)"></span>
                <span class="<?php if($OAVGRATE >= 2){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="2" onclick="getOverall(2)"></span>
                <span class="<?php if($OAVGRATE >= 3){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="3" onclick="getOverall(3)"></span>
                <span class="<?php if($OAVGRATE >= 4){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="4" onclick="getOverall(4)"></span>
                <span class="<?php if($OAVGRATE >= 5){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="5" onclick="getOverall(5)"></span><br>
                <small><?php echo $Total ?>&nbsp;reviews</small>
            </div>
            <br>
            <h6 style="font-weight:bold;">Score Specific</h6>

            <div class="star-rating">
                <p style="font-size:15px; margin-bottom:0px;">Comfort</p><span style="font-size:14px;">  <?php echo round($CAVGRATE,1); ?> </span>
                <span class="<?php if($CAVGRATE >= 1){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="1" onclick="getOverall(1)"></span>
                <span class="<?php if($CAVGRATE >= 2){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="2" onclick="getOverall(2)"></span>
                <span class="<?php if($CAVGRATE >= 3){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="3" onclick="getOverall(3)"></span>
                <span class="<?php if($CAVGRATE >= 4){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="4" onclick="getOverall(4)"></span>
                <span class="<?php if($CAVGRATE >= 5){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="5" onclick="getOverall(5)"></span>

            </div>
            <br>
            <div class="star-rating">
                <p style="font-size:15px; margin-bottom:0px;">Interior Design</p><span style="font-size:14px;">  <?php echo round($IAVGRATE,1); ?> </span>
                <span class="<?php if($IAVGRATE >= 1){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="1" onclick="getOverall(1)"></span>
                <span class="<?php if($IAVGRATE >= 2){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="2" onclick="getOverall(2)"></span>
                <span class="<?php if($IAVGRATE >= 3){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="3" onclick="getOverall(3)"></span>
                <span class="<?php if($IAVGRATE >= 4){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="4" onclick="getOverall(4)"></span>
                <span class="<?php if($IAVGRATE >= 5){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="5" onclick="getOverall(5)"></span><br>
            </div>
            <br>

            <div class="star-rating">
                <p style="font-size:15px; margin-bottom:0px;">Performance</p><span style="font-size:14px;">  <?php echo round($PAVGRATE,1); ?> </span>
                <span class="<?php if($PAVGRATE >= 1){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="1" onclick="getOverall(1)"></span>
                <span class="<?php if($PAVGRATE >= 2){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="2" onclick="getOverall(2)"></span>
                <span class="<?php if($PAVGRATE >= 3){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="3" onclick="getOverall(3)"></span>
                <span class="<?php if($PAVGRATE >= 4){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="4" onclick="getOverall(4)"></span>
                <span class="<?php if($PAVGRATE >= 5){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="5" onclick="getOverall(5)"></span><br>
            </div>
            <br>

            <div class="star-rating">
                <p style="font-size:15px; margin-bottom:0px;">Value for the Money</p><span style="font-size:14px;">  <?php echo round($MAVGRATE,1); ?> </span>
                <span class="<?php if($MAVGRATE >= 1){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="1" onclick="getOverall(1)"></span>
                <span class="<?php if($MAVGRATE >= 2){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="2" onclick="getOverall(2)"></span>
                <span class="<?php if($MAVGRATE >= 3){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="3" onclick="getOverall(3)"></span>
                <span class="<?php if($MAVGRATE >= 4){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="4" onclick="getOverall(4)"></span>
                <span class="<?php if($MAVGRATE >= 5){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="5" onclick="getOverall(5)"></span><br>
            </div>
            <br>
            <div class="star-rating">
                <p style="font-size:15px; margin-bottom:0px;">Reliability</p><span style="font-size:14px;">  <?php echo round($RAVGRATE,1); ?> </span>
                <span class="<?php if($RAVGRATE >= 1){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="1" onclick="getOverall(1)"></span>
                <span class="<?php if($RAVGRATE >= 2){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="2" onclick="getOverall(2)"></span>
                <span class="<?php if($RAVGRATE >= 3){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="3" onclick="getOverall(3)"></span>
                <span class="<?php if($RAVGRATE >= 4){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="4" onclick="getOverall(4)"></span>
                <span class="<?php if($RAVGRATE >= 5){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="5" onclick="getOverall(5)"></span><br>
            </div>

        </div>

    </div>

</div>

<br><br>

<div class="col-12 py-5" style="background:#d1ccc0">
    <h2 class="text-center">What they are Saying </h2>
    <div class="container mt-5">



      <div class="row">


                @foreach ($reviews as $row)

            <div class="col-lg-12 col-md-12 col-sm-12 py-3">

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

                        <div class="">
                          <a style="text-decoration:none;font-size:13px;" href="{{ url('/carsdetails/reviews/individual/'.$row->user_id) }}">See full review</a>
                        </div>

                        <small class="text-muted">{{ date('M j, Y h:ia', strtotime($row->created_at)) }}</small>

                    </div>
                </div>


            </div>

        @endforeach
{{ $reviews->links() }}



      </div>

      <div class="row">
        <div class="col-4 mx-auto ">
          <a href="{{ url('/carsdetails/reviews/'.$singlecar->id) }}" class="btn btn-info btn-block" style="color:white;">Post Review</a>

        </div>
      </div>


    </div>



</div>







<script type="text/javascript">
    function getOverall(overall) {
        $(".o").each(function() {
            document.getElementById('orating').value = overall;
            var orating = $(this).data('overall');
            if (orating <= overall) {
                $(this).removeClass('far').addClass('fas');
            } else {
                $(this).removeClass('fas').addClass('far');
            }
        });
    }
</script>








@endsection
