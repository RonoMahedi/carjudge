
@extends('layouts.frontend.header')


@section('title')
Car Judge - Advanced Search for Cars
@endsection

@section('content')




<section class="advsearch py-5" id="advsearch">
    <div class="container-fluid">
        <!---section title--->
        <div class="row my-5">
            <div class="col d-flex flex-wrap text-uppercase justify-content-center">
                <h1 class="font-weight-bold align-self-center mx-1">Advanced</h1>
                <h1 class="section-title-special mx-1">Search</h1>
            </div>
        </div>


        <div class="accordion" id="accordionExample">

            <div class="row">



                <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                    <form action="{{ url('/home/advance/search/specific') }}" method="get">
                        @csrf
                        {{-- brands search --}}
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <button style="text-decoration:none;padding-top: 0px;padding-bottom: 0px;" class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseprice" aria-expanded="true"
                                  aria-controls="collapseOne">
                                    Price
                                </button>

                            </div>

                            <div id="collapseprice" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    min <input class="form-control" type="number" name="min_price" value="0">
                                    <br>
                                    max <input class="form-control" type="number" name="max_price" value="5000000">
                                </div>
                            </div>
                        </div>


                        {{-- brands --}}
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <button style="text-decoration:none;padding-top: 0px;padding-bottom: 0px;" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsebrands" aria-expanded="true"
                                  aria-controls="collapseOne">
                                    Brands
                                </button>

                            </div>

                            <div id="collapsebrands" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <?php $brands = DB::table('brands')->get();?>
                                    @foreach ($brands as $row)
                                    <p> <input type="checkbox" name="brands[]" value="{{ $row->id }}">&nbsp;{{ $row->name }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        {{-- body types --}}
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <button style="text-decoration:none;padding-top: 0px;padding-bottom: 0px;" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsebody" aria-expanded="true"
                                  aria-controls="collapseOne">
                                    Body Types
                                </button>

                            </div>

                            <div id="collapsebody" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                              <div class="card-body">
                                <?php
                                $singlecar = DB::table('singlecar')
                                ->join('brands','singlecar.brands_id','brands.id')
                                ->join('boverviews','singlecar.car_model_id','boverviews.id')
                                ->select('singlecar.*','brands.name','boverviews.car_model')
                                ->get();
                                  ?>
                                  @foreach ($singlecar->unique('body_type') as $row)
                                  <p> <input type="checkbox" name="body_type[]" value="{{ $row->body_type }}">&nbsp;{{ $row->body_type }}</p>
                                  @endforeach
                              </div>
                            </div>
                        </div>


                        {{-- fuel types --}}
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <button style="text-decoration:none;padding-top: 0px;padding-bottom: 0px;" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsefuel" aria-expanded="true"
                                  aria-controls="collapseOne">
                                    Fuel Types
                                </button>

                            </div>

                            <div id="collapsefuel" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                              <div class="card-body">
                                <?php
                                $singlecar = DB::table('singlecar')
                                ->join('brands','singlecar.brands_id','brands.id')
                                ->join('boverviews','singlecar.car_model_id','boverviews.id')
                                ->select('singlecar.*','brands.name','boverviews.car_model')
                                ->get();
                                  ?>
                                  @foreach ($singlecar->unique('fuel_type') as $row)
                                  <p> <input type="checkbox" name="fuel_type[]" value="{{ $row->fuel_type }}">&nbsp;{{ $row->fuel_type }}</p>
                                  @endforeach
                              </div>

                            </div>
                        </div>



                        {{-- engine --}}
                        {{-- <div class="card">
                            <div class="card-header" id="headingOne">
                                <button style="text-decoration:none;padding-top: 0px;padding-bottom: 0px;" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseengine" aria-expanded="true"
                                  aria-controls="collapseOne">
                                    Engine cc
                                </button>

                            </div>

                            <div id="collapseengine" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p> <input type="checkbox" name="" value="">&nbsp;0-1200 cc</p>
                                    <p> <input type="checkbox" name="" value="">&nbsp;1201-1600 cc</p>
                                    <p> <input type="checkbox" name="" value="">&nbsp;1601-2000 cc</p>
                                    <p> <input type="checkbox" name="" value="">&nbsp;2001-2500 cc</p>
                                    <p> <input type="checkbox" name="" value="">&nbsp;2501-3000 cc</p>
                                    <p> <input type="checkbox" name="" value="">&nbsp;1-3000 cc</p>
                                </div>
                            </div>
                        </div> --}}

                        <button class="btn btn-outline-success btn-block" style="margin-top:5px;" type="submit">SUBMIT</button>

                    </form>

                </div>




                <div class="col-lg-10 col-md-9 col-sm-8 col-7">

                    <div class="row">
                        @foreach ($search as $row)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-10 mx-auto mb-4">



                            <div class="card car-card">
                                <img src="{{ URL::to($row->car_image) }}" style="height:200px;" class="card-img-top car-img" alt="">
                                <!--card body-->
                                <div class="card-body" style="height:100px;">
                                    <div class="car-info d-flex justify-content-between">
                                        <!---first flex child--->
                                        <div class="car-text text-capitalize">
                                            <h6 class="font-weight-bold">{{ $row->name }}</h6>
                                            <a href="{{ url('/brands/cardetails/'.$row->id) }}" style="text-decoration:none;font-size:14px;">{{ $row->car_model }}</a>
                                        </div>
                                        <!---second flex child---->
                                        <h5 class="car-value align-self-center py-2 px-3">
                                            <span class="car-price">৳{{ $row->car_price }}</span>
                                        </h5>
                                    </div>
                                </div>
                                <!---end of card--->
                                <div class="card-footer text-capitalize justify-content-between">
                                    <table class="table">
                                        <tr>
                                            <td style="font-size:14px;"><span><i class="fas fa-car"></i></span><br>{{ $row->body_type }}</td>
                                            <td style="font-size:14px;"><span><i class="fas fa-cogs"></i></span><br>{{ $row->transmission }}</td>
                                            <td style="font-size:14px;"><span><i class="fas fa-gas-pump"></i></span><br>{{ $row->fuel_type }}</td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--end single car--->

                        @endforeach
                    </div>


                </div>

            </div>

        </div>

        {{--
<script type="text/javascript">
  $(document).ready(function(){
    function filter_data() {
      var action = 'fetch_data';
      var minimum_price = $('hidden_minimum_price').val();
      var maximum_price = $('hidden_maximum_price').val();
      var brand = get_filter('brand');
    }
  });
</script> --}}





    </div>
</section>


@endsection
