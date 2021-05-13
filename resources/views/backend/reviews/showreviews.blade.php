@extends('layouts/backend/app')

@section('title')
  Car Judge - Show Review Details
@endsection


@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cars Reviews</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Car Reviews</li>
              <li>
                <!-- SEARCH FORM -->

              </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <style media="screen">
        .star-rating {
            font-size: 1em;
        }

        .star-rating .fa-star {
            color: var(--mainBlue);
        }
    </style>

    
    <div class="container my-5">
      <div class="row">
          <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">

              <h2>Review placed for {{ $singlecar->car_model }}</h2>
              <br>
              <h4 style="font-weight:600;margin-bottom:0;">{{ $reviews->heading }}</h4><small>posted By {{ $reviews->name }} from {{ $reviews->city }}</small>
              <div style="margin-top:20px;height:250px;overflow:hidden;">
                <p style="font-size:15px;">{{ $reviews->message }}</p>
              </div>
              <small class="text-muted">{{ date('M j, Y h:ia', strtotime($reviews->created_at)) }}</small>

          </div>

          <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
              <br>
              <h6 style="font-weight:bold;">Overall Review Score</h6>
              <div class="star-rating">
                  <span class="<?php if($reviews->orating >= 1){echo "fas";} ;?> fa-star o" data-overall="1" onclick="getOverall(1)"></span>
                  <span class="<?php if($reviews->orating >= 2){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="2" onclick="getOverall(2)"></span>
                  <span class="<?php if($reviews->orating >= 3){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="3" onclick="getOverall(3)"></span>
                  <span class="<?php if($reviews->orating >= 4){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="4" onclick="getOverall(4)"></span>
                  <span class="<?php if($reviews->orating >= 5){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="5" onclick="getOverall(5)"></span>
              </div>
              <br>
              <h6 style="font-weight:bold;">Score Specific</h6>

              <div class="star-rating">
                  <p style="font-size:15px; margin-bottom:0px;">Comfort</p>
                  <span class="<?php if($reviews->crating >= 1){echo "fas";} ;?> fa-star o" data-overall="1" onclick="getOverall(1)"></span>
                  <span class="<?php if($reviews->crating >= 2){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="2" onclick="getOverall(2)"></span>
                  <span class="<?php if($reviews->crating >= 3){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="3" onclick="getOverall(3)"></span>
                  <span class="<?php if($reviews->crating >= 4){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="4" onclick="getOverall(4)"></span>
                  <span class="<?php if($reviews->crating >= 5){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="5" onclick="getOverall(5)"></span>
              </div>
              <br>
              <div class="star-rating">
                  <p style="font-size:15px; margin-bottom:0px;">Interior Design</p>
                  <span class="<?php if($reviews->irating >= 1){echo "fas";} ;?> fa-star o" data-overall="1" onclick="getOverall(1)"></span>
                  <span class="<?php if($reviews->irating >= 2){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="2" onclick="getOverall(2)"></span>
                  <span class="<?php if($reviews->irating >= 3){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="3" onclick="getOverall(3)"></span>
                  <span class="<?php if($reviews->irating >= 4){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="4" onclick="getOverall(4)"></span>
                  <span class="<?php if($reviews->irating >= 5){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="5" onclick="getOverall(5)"></span>
              </div>
              <br>

              <div class="star-rating">
                  <p style="font-size:15px; margin-bottom:0px;">Performance</p>
                  <span class="<?php if($reviews->prating >= 1){echo "fas";} ;?> fa-star o" data-overall="1" onclick="getOverall(1)"></span>
                  <span class="<?php if($reviews->prating >= 2){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="2" onclick="getOverall(2)"></span>
                  <span class="<?php if($reviews->prating >= 3){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="3" onclick="getOverall(3)"></span>
                  <span class="<?php if($reviews->prating >= 4){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="4" onclick="getOverall(4)"></span>
                  <span class="<?php if($reviews->prating >= 5){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="5" onclick="getOverall(5)"></span>
              </div>
              <br>

              <div class="star-rating">
                  <p style="font-size:15px; margin-bottom:0px;">Value for the Money</p>
                  <span class="<?php if($reviews->mrating >= 1){echo "fas";} ;?> fa-star o" data-overall="1" onclick="getOverall(1)"></span>
                  <span class="<?php if($reviews->mrating >= 2){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="2" onclick="getOverall(2)"></span>
                  <span class="<?php if($reviews->mrating >= 3){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="3" onclick="getOverall(3)"></span>
                  <span class="<?php if($reviews->mrating >= 4){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="4" onclick="getOverall(4)"></span>
                  <span class="<?php if($reviews->mrating >= 5){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="5" onclick="getOverall(5)"></span>
              </div>
              <br>
              <div class="star-rating">
                  <p style="font-size:15px; margin-bottom:0px;">Reliability</p>
                  <span class="<?php if($reviews->rrating >= 1){echo "fas";} ;?> fa-star o" data-overall="1" onclick="getOverall(1)"></span>
                  <span class="<?php if($reviews->rrating >= 2){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="2" onclick="getOverall(2)"></span>
                  <span class="<?php if($reviews->rrating >= 3){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="3" onclick="getOverall(3)"></span>
                  <span class="<?php if($reviews->rrating >= 4){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="4" onclick="getOverall(4)"></span>
                  <span class="<?php if($reviews->rrating >= 5){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="5" onclick="getOverall(5)"></span>
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

</div>

@endsection
