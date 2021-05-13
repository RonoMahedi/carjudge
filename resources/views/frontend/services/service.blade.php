@extends('layouts.frontend.header')

@section('title')
Car Judge - Cars Service Section
@endsection

@section('content')


   <section class="service" id="service">
  <div class="container">
    <!---section title--->
        <div class="row">
          <div class="col d-flex flex-wrap text-capitalize justify-content-center">
            <h1 class="font-weight-bold align-self-center mx-1 texting">Car Judge</h1>
            <h1 class="section-title-special mx-1 texting">Services</h1>
          </div>
        </div>

        <!---first content--->
        <br>
        <div class="row">
          <div class="col-12 text-center">
            <p class="service-head">OUR SERVICES INCLUDE</p>
          </div>
        </div>
        <br>

   <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">

            <!---heading--->


            <ul class="car-service-content">
                <li><i class="fas fa-check-circle service-font-color"></i>&nbsp;General Automotive Repair</li>
                <li><i class="fas fa-check-circle service-font-color"></i>&nbsp;Preventative Car Maintenance</li>
                <li><i class="fas fa-check-circle service-font-color"></i>&nbsp;Synthetic Motor Oil Replacement</li>
                <li><i class="fas fa-check-circle service-font-color"></i>&nbsp;Cooling System and Radiator Repair</li>
                <li><i class="fas fa-check-circle service-font-color"></i>&nbsp;Air Conditioning and Heater Service</li>
            </ul>
        </div>
        <!---end first content--->
        <!---start second content--->
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
            <ul class="car-service-content">
                <li><i class="fas fa-check-circle service-font-color"></i>&nbsp;Transmission Services</li>
                <li><i class="fas fa-check-circle service-font-color"></i>&nbsp;Oil Filter Replacement</li>
                <li><i class="fas fa-check-circle service-font-color"></i>&nbsp;Brake Repair</li>
                <li><i class="fas fa-check-circle service-font-color"></i>&nbsp;Engine Diagnostic</li>
                <li><i class="fas fa-check-circle service-font-color"></i>&nbsp;Belts, Hoses, Fluids</li>
            </ul>
        </div>
        <!---end second content--->

        <!---image content--->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 text-center">
            <img class="car-service-image" src="{{ asset('images/service.jpg')}}" alt="service center">
        </div>
        <!---end image content--->

    </div>
    <!----end heading part--->

    <!---midlle service part--->
    <div class="row justify-content-center">
        <div class="col-6 col-sm-6 col-md-4 col-lg-4">
            <div class="card service-car-card">
                <a href="{{ URL::to('/contacts') }}"><i class="fas fa-cogs font-size"></i>
                    <h6 class="letter">vehicle repair</h6>
                </a>


            </div>
        </div>

        <div class="col-6 col-sm-6 col-md-4 col-lg-4">
            <div class="card service-car-card">
                <a href="{{ URL::to('/contacts') }}"><i class="fas fa-car-battery font-size"></i>
                    <h6 class="letter">battery Replacement</h6>
                </a>


            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card service-car-card">
                <a href="{{ URL::to('/contacts') }}"><i class="fas fa-car-crash font-size"></i>
                    <h6 class="letter">roadside assistance</h6>
                </a>


            </div>
        </div>

    </div>
    <!---end midlle service part--->
<br><br>

</div>

<!---- services part end-->

</section>

@endsection
