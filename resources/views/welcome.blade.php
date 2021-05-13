@extends('layouts.frontend.header')


@section('title')
Car Judge - Right Place To Find Cars
@endsection

@section('content')

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>



<!--header image-->
<div class="container-fluid coverpage">
    <div class="row height-max align-items-center">


      <!---start search--->
      <div class="container-fluid">
          <div class="modal-dialog modal-lg" style="opacity:0.9;">
              <div class="modal-content bg-light">

                  <div class="modal-body">


                      <div class="row">
                          @csrf
                          <div class="col-md-4">
                              <div class="floating-label-form-group">
                                  <label style="color:black;">Choose Brand</label>
                                  <br>
                                  <select class="form-control text-size" id="brands_id" name="brands_id">
                                      <option selected="" disabled="">Select</option>
                                      @foreach ($brands as $row)
                                      <option value="{{ $row->id }}">{{ $row->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="floating-label-form-group">
                                  <label style="color:black;">Choose Car Model</label>
                                  <br>
                                  <select class="form-control text-size dynamic" id="car_model_id" name="car_model_id">
                                      <option selected="" disabled="">Select</option>

                                      <option value=""></option>

                                  </select>
                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="floating-label-form-group">
                                  <label style="color:black;">Choose Year</label>
                                  <br>
                                  <select class="form-control text-size dynamic" id="year" name="year">
                                      <option selected="" disabled="">Select</option>

                                      <option value=""></option>

                                  </select>
                              </div>
                          </div>


                      </div>



                      <div class="row">

                          <div class="col-md-9" style="margin-top:15px;">
                              <button type="submit" name="search" id="search" class="btn btn-success btn-block" style="font-size:16px;">Search</button>
                          </div>
                          <div class="col-md-3" style="margin-top:10px;">

                              <small style="color:black;">Not found yet then go for</small>
                              <span class="adv-search"><a href="#">Advance Search?</a></span>

                          </div>

                      </div>



                  </div>
              </div>
              <!---end search-->

              <h2 class="text-capitalize text-center display-3">Find Your Next Car</h2>
              <h2 class="text capitalize text-center">Right place to find Cars</h2>

          </div>



      </div>



      <script type="text/javascript">
          jQuery(document).ready(function() {

              jQuery('select[name="car_model_id"]').attr('disabled', 'disabled');
              jQuery('select[name="year"]').attr('disabled', 'disabled');

              jQuery('select[name="brands_id"]').on('change', function() {
                  var brandID = jQuery(this).val();
                  if (brandID) {
                      jQuery('select[name="car_model_id"]').attr('disabled', 'disabled');
                      jQuery('select[name="year"]').attr('disabled', 'disabled');

                      jQuery.ajax({
                          url: '/getmodels/' + brandID,
                          type: "GET",
                          dataType: "json",
                          success: function(data) {
                              jQuery('select[name="car_model_id"]').empty();
                              jQuery('select[name="year"]').empty();
                              $('select[name="car_model_id"]').append('<option selected="" disabled="">Select</option>');
                              $('select[name="year"]').append('<option selected="" disabled="">Select</option>');
                              jQuery.each(data, function(key, value) {
                                  $('select[name="car_model_id"]').append('<option value="' + key + '">' + value + '</option>');
                              });
                              jQuery('select[name="car_model_id"]').removeAttr('disabled');
                          }
                      });

                  } else {
                      $('select[name="car_model_id"]').empty();
                      $('select[name="year"]').empty();
                  }
              });


          });

          jQuery(document).ready(function() {


              jQuery('select[name="car_model_id"]').on('change', function() {
                  var modelID = jQuery(this).val();
                  if (modelID) {
                      jQuery('select[name="year"]').attr('disabled', 'disabled');

                      jQuery.ajax({
                          url: '/getyears/' + modelID,
                          type: "GET",
                          dataType: "json",
                          success: function(data) {
                              jQuery('select[name="year"]').empty();
                              $('select[name="year"]').append('<option selected="" disabled="">Select</option>');
                              jQuery.each(data, function(key, value) {
                                  $('select[name="year"]').append('<option value="' + key + '">' + value + '</option>');
                              });
                              jQuery('select[name="year"]').removeAttr('disabled');
                          }
                      });

                  } else {
                      $('select[name="car_model_id"]').empty();
                      $('select[name="year"]').empty();
                  }
              });



          });
      </script>


      <script type="text/javascript">
          $("#search").on("click", function() {
              var link = document.getElementById("year").value;

              $.ajax({
                  url: window.location.href = "/getData/" + link
              });
          });
      </script>




    </div>



</div>





    <!-- Script -->
    <script type="text/javascript">

    // CSRF Token
    $(document).ready(function(){

      $( "#search" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url:"{{url('/home/autocomplete')}}",
            type: 'post',
            dataType: "json",
            data: {
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           // Set selection
           $('#search').val(ui.item.label); // display the selected text
           $('#search').val(ui.item.value); // save selected id to input
           return false;
        }
      });

    });
    </script>




{{-- <script type="text/javascript">
    $(function (){
      $('#search').autocomplete({
        source:function(request,response){
          $.getJSON('{{ url('/home/autocomplete') }}',function(data){
            var array = $.map(data,function(row){
              console.log(array);
              return {
                value:row.id,
                label:row.car_model
              }
            })
            response(array);
          })
        }
      })
    });
</script> --}}






<!---skills sction--->
<section class="skills py-5 text-center" style="background:#ECF0F1;">
    <div class="container">
        <!---section title--->
        <div class="row mb-5">
            <div class="col d-flex flex-wrap justify-content-center">
                <h1 class="font-weight-bold text-capitalize align-self-center mx-1" style="color:black;">why choose</h1>
                <h1 class="section-title-special mx-1">CarJudge</h1>
            </div>
        </div>
        <!---end section title--->




        <!---skill boxes--->
        <div class="row justify-content-center">

            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <h5 class=" text-capitalize">all brands</h5>

                        <p class="card-text">Most of the brands that appear in this country are here. We will ensure that you can get your ideal car here.</p>
                    </div>
                </div>
            </div>



            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="text-info text-capitalize">compare cars</h5>
                        <p class="card-text" style="color:#17A2B8;">You can easily compare cars between different cars which car is affordable or proper for you.</p>
                    </div>
                </div>
            </div>



            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <h5 class="text-capitalize">review</h5>

                        <p class="card-text">Examine the reviews and choose a rated car. Company owner, car expert and also users can post a review.</p>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="text-info text-capitalize">user friendly</h5>

                        <p class="card-text" style="color:#17A2B8;">Our site is much user friendly, answer some questions you will get your prefered car in a moment.</p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>




</div>

</section>
<!--end skills sction--->







<!---question sction--->
<div class="section question py-5" id="question">
    <div class="container">
        <div class="row">
            <!---single question first--->
            <div class="col-10 mx-auto my-2 col-md-6 d-flex justify-content-between question-grey p-4">
                <!---first flexbox child--->
                <a href="{{ url('/home/advance/search/details') }}" class="question-icon mr-3">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!---second flexbox child---->
                <div class="question-text w-55">
                    <h5 class="question-title text-capitalize font-weight-bold">
                        Not found yet then go for Advance Search?
                    </h5>
                    <p class="question-info">Can search by price, brands etc. at a time.</p>
                </div>
            </div>

        </div>
    </div>
</div>
<!---end question sction--->







<!--- featured part start--->

<!---featured sction--->
<section class="feature py-5" id="inventory">
    <div class="container">
        <!---section title--->
        <div class="row mb-5">
            <div class="col d-flex flex-wrap text-uppercase justify-content-center">
                <h1 class="font-weight-bold align-self-center mx-1">Featured</h1>
                <h1 class="section-title-special mx-1">Cars</h1>
            </div>
        </div>
        <!---end section title--->

        <ul class="nav justify-content-center nav-pills">
          <li class="nav-item">
            <a href="#popular" class="btn btn-outline-secondary btn-sm mx-3 text-uppercase active a" data-toggle="tab">Popular Cars</a>
          </li>
          <li class="nav-item">
              <a href="#recently" class="btn btn-outline-secondary btn-sm mx-3 text-uppercase a" data-toggle="tab">Recently Launched</a>
          </li>
          <li class="nav-item">
            <a href="#upcoming" class="btn btn-outline-secondary btn-sm mx-3 text-uppercase a" data-toggle="tab">Upcoming Cars</a>
          </li>
        </ul>

<br><br>

<style media="screen">
.nav-item .a:hover, .active {
  border-bottom: 0;
}
</style>

    <div class="tab-content">
      <div class="tab-pane show fade active" id="popular">

                <?php
                $popular = DB::table('reviews')
                  ->leftJoin('singlecar','reviews.car_id','singlecar.id')
                  ->leftJoin('brands','singlecar.brands_id','brands.id')
                  ->leftJoin('boverviews','singlecar.car_model_id','boverviews.id')
                  ->select('car_id','singlecar.id','car_image','brands.name','car_model','car_price','body_type','transmission','fuel_type','year','engine','seat',DB::raw('avg(orating) as average'))
                  ->groupBy('car_id','singlecar.id','car_image','brands.name','car_model','car_price','body_type','transmission','fuel_type','year','engine','seat')
                  ->orderBy('average', 'DESC')
                  ->paginate(6);
               ?>
               {{-- for popular cars --}}
               <div class="row">

                   @foreach ($popular as $row)

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
      {{ $popular->links() }}

      </div>




        <div class="tab-pane fade" id="recently">

                  <?php
                  $y = date("Y");
                  $recently = DB::table('singlecar')
                  ->join('brands','singlecar.brands_id','brands.id')
                  ->join('boverviews','singlecar.car_model_id','boverviews.id')
                  ->where('singlecar.year', '=', $y)
                  ->select('singlecar.*','brands.name','boverviews.car_model')
                  ->paginate(6);
                 ?>
                 {{-- for recently cars --}}
                 <div class="row">

                     @foreach ($recently as $row)

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
        {{ $recently->links() }}

        </div>






            <div class="tab-pane fade" id="upcoming">
              <?php
              $y = date("Y");
              $upcoming = DB::table('singlecar')
              ->join('brands','singlecar.brands_id','brands.id')
              ->join('boverviews','singlecar.car_model_id','boverviews.id')
              ->where('singlecar.year', '>', $y)
              ->select('singlecar.*','brands.name','boverviews.car_model')
              ->paginate(6);
             ?>
             {{-- for upcoming cars --}}
             <div class="row">

                 @foreach ($upcoming as $row)

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
    {{ $upcoming->links() }}

            </div>
        </div>


<br><br>


        <!---cars---->









        <br>

    </div>
</section>

<!--- featured part end-->






<!---Email subscribe-->



<div class="section email-image py-5">
    <div class="container ">

        <form action="{{ url('/home/subscribe') }}" method="post">
            @csrf
            <div class="form-row align-items-center">
                <!--single question first--->
                <div class="col-sm-3 my-5 mr-4 ml-4">

                    <label class="sr-only" for="inlineFormInput">Name</label>
                    <input type="text" class="form-control mb-2" id="inlineFormInput" name="name" placeholder="Enter name">
                </div>

                <div class="col-sm-3 my-5">
                    <label class="sr-only" for="inlineFormInput">Email</label>
                    <input type="email" class="form-control mb-2" id="inlineFormInput" name="email" placeholder="Enter mail">
                </div>

                <div class="col-auto my-5 mr-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                        <label class="form-check-label" for="autoSizingCheck">
                            Send me further info
                        </label>
                    </div>
                </div>
                <div class="col-auto my-5 ml-4">
                    <button type="submit" class="btn btn-success email-button">SUBSCRIBE!</button>
                </div>
            </div>

        </form>
    </div>
</div>


<!---end Email subscribe--->

@endsection
