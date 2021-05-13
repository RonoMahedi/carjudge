@extends('layouts.frontend.header')

@section('title')
Car Judge - Compare Cars
@endsection



@section('content')
<script src="{{ asset('js/app.js') }}"></script>


<br><br>
<div class="table-responsive mt-5">
    <table class="table table-bordered table-striped" id="product_table">
        <thead>
            <tr>
                <th class="first_th"></th>
                <th class="second_th"></th>
                @csrf

                <th class="third_th">
                  <div class="form-group">
                      <label>Choose Car Model</label>
                      <select class="form-control" name="car_model_id_1" id="car_model_id_1" style="width: 100%;" aria-hidden="true">
                          <option selected="" disabled="">select</option>
                          @foreach ($boverviews as $row)
                          <option value="{{ $row->id }}">{{ $row->car_model }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Choose Year</label>
                      <select class="form-control" name="year1" id="year1" style="width: 100%;" aria-hidden="true">
                          <option selected="" disabled="">select</option>
                            <option value=""></option>

                      </select>
                      <button type="submit" class="btn btn-success btn-block btn-sm my-2" name="search1" id="search1">Submit</button>
                  </div>
              </th>

              <th class="third_th">
                  <div class="form-group">
                      <label>Choose Car Model</label>
                      <select class="form-control" name="car_model_id_2" id="car_model_id_2" style="width: 100%;" aria-hidden="true">
                          <option selected="" disabled="">select</option>
                          @foreach ($boverviews as $row)
                          <option value="{{ $row->id }}">{{ $row->car_model }}</option>
                          @endforeach
                      </select>
                    </div>
                      <div class="form-group">
                          <label>Choose Year</label>
                          <select class="form-control" name="year2" id="year2" style="width: 100%;" aria-hidden="true">
                              <option selected="" disabled="">select</option>
                                <option value=""></option>

                          </select>
                          <button type="submit" class="btn btn-success btn-block btn-sm my-2" name="search2" id="search2">Submit</button>
                      </div>
                  </div>

              </th>


            </tr>
        </thead>




        <script type="text/javascript">

            jQuery(document).ready(function() {
jQuery('select[name="year1"]').attr('disabled', 'disabled');
                jQuery('select[name="car_model_id_1"]').on('change', function() {

                    var modelID1 = jQuery(this).val();
                    if (modelID1) {
                        jQuery('select[name="year1"]').attr('disabled', 'disabled');
                        jQuery.ajax({
                            url: '/getyears/' + modelID1,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                jQuery('select[name="year1"]').empty();
                                $('select[name="year1"]').append('<option selected="" disabled="">Select</option>');
                                jQuery.each(data, function(key, value) {
                                    $('select[name="year1"]').append('<option value="' + key + '">' + value + '</option>');
                                });
                                jQuery('select[name="year1"]').removeAttr('disabled');
                            }
                        });

                    } else {
                        $('select[name="car_model_id_1"]').empty();
                        $('select[name="year1"]').empty();
                    }
                });

            });

            $("#search1").on("click", function() {
                var link = document.getElementById("year1").value;
                if(link === 'select'){
                  alert('fill form please');
                }else{
                  $.ajax({
                      url: window.location.href = "/getData1/" + link
                  });
                }

            });
        </script>







                <script type="text/javascript">

                    jQuery(document).ready(function() {
        jQuery('select[name="year2"]').attr('disabled', 'disabled');
                        jQuery('select[name="car_model_id_2"]').on('change', function() {

                            var modelID2 = jQuery(this).val();
                            if (modelID2) {
                                jQuery('select[name="year2"]').attr('disabled', 'disabled');
                                jQuery.ajax({
                                    url: '/getyears/' + modelID2,
                                    type: "GET",
                                    dataType: "json",
                                    success: function(data) {
                                        jQuery('select[name="year2"]').empty();
                                        $('select[name="year2"]').append('<option selected="" disabled="">Select</option>');
                                        jQuery.each(data, function(key, value) {
                                            $('select[name="year2"]').append('<option value="' + key + '">' + value + '</option>');
                                        });
                                        jQuery('select[name="year2"]').removeAttr('disabled');
                                    }
                                });

                            } else {
                                $('select[name="car_model_id_2"]').empty();
                                $('select[name="year2"]').empty();
                            }
                        });

                    });


            $("#search2").on("click", function() {
                var link = document.getElementById("year2").value;
                $.ajax({
                    url: window.location.href = "/getData2/" + link
                });
            });
        </script>



        <tbody>
            <tr>
                <td rowspan="13">
                    <h3>OVERVIEW</h3>
                </td>
                <td>Car Image</td>
                <td>
                    <img src="" style="height:200px;" class="card-img-top car-img" alt="">
                </td>
                <td>
                    <img src="" style="height:200px;" class="card-img-top car-img" alt="">
                </td>
            </tr>

            <tr>
                <td>Car Model</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Car Price</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>User Rating</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Fuel Type</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Engine Displacement</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Body Type</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Transmission</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Seating Capacity</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Year</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Max Power (bpm@rpm)</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Boot Space (litres)</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Fuel Tank Capacity</td>
                <td></td>
                <td></td>
            </tr>



            <tr>
                <td rowspan="13">
                    <h3>COMFORT & CONVENIENCE</h3>
                </td>
            </tr>
            <tr>
                <td>Power Steering</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Power Windows Front</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Power Windows Rear</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Remote Trunk Opener</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Remote Fuel Lid Opener</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Low Fuel Warning Light</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Rear AC Vents</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Multifunctional Steering Wheel</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Parking Sensors</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Bottle Holders</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Air Conditioner</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Heater</td>
                <td></td>
                <td></td>
            </tr>


            <tr>
                <td rowspan="11">
                    <h3>SAFETY</h3>
                </td>
            </tr>
            <tr>
                <td>Anti Lock Breaking System</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Brake Assist</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Power Door Locks</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Anti Theft Alarm</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>No of Airbags</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Driver Airbag</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Xenon Headlamps</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Rear Seat Belts</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Crash Sensor</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Rear Camera</td>
                <td></td>
                <td></td>
            </tr>



            <tr>
                <td rowspan="10">
                    <h3>ENTERTAINMENT & COMMUNICATION</h3>
                </td>
            </tr>
            <tr>
                <td>Cd Player</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Dvd Player</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Radio</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Speaker Front</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Speaker Rear</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>USB and Auxilary Input</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Bluetooth Connectivity</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Touch Screen</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Number Of Speaker</td>
                <td></td>
                <td></td>
            </tr>



            <tr>
                <td rowspan="10">
                    <h3>INTERIOR</h3>
                </td>
            </tr>
            <tr>
                <td>Techometer</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Leather Seats</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Leather Steering Wheel</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Digital Clock</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Cigarate Lighter</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Digital Odometer</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Height Adjustable Driver Seat</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Ventilated Seats</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Dual Tone Dashboard</td>
                <td></td>
                <td></td>
            </tr>


            <tr>
                <td rowspan="6">
                    <h3>FUEL & PERFORMANCE</h3>
                </td>
            </tr>
            <tr>
                <td>Fuel Type</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Mileage <small>(city)</small></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Mileage <small>(arai)</small> </td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Fuel Tank capacity <small>(litres)</small> </td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Top Speed <small>(kmph)</small></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td rowspan="10">
                    <h3>ENGINE & TRANSMISSION</h3>
                </td>
            </tr>
            <tr>
                <td>Engine Displacement</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Max Power <small>(bhp@rpm)</small> </td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Max Torque <small>(nm@rpm)</small> </td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>No of Cylinder </td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Valves Per Cylinder</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Super Charger</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Transmission Type </td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Gear Box</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Drive Type </td>
                <td></td>
                <td></td>
            </tr>


            <tr>
                <td rowspan="13">
                    <h3>DIMENTION & CAPACITY</h3>
                </td>
            </tr>
            <tr>
                <td>Lenght <small>(mm)</small> </td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Width <small>(mm)</small> </td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Height <small>(mm)</small> </td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Ground Clearance Unladen <small>(mm)</small> </td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Wheel Base <small>(mm)</small></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Front Tread <small>(mm)</small></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Rear Tread <small>(mm)</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Kerb Weight <small>(kg)</small> </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Gross Weight<small>(mm)</small> </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Seating Capacity</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Boot Space <small>(litres)</small> </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>No. Of Doors</td>
                <td></td>
                <td></td>
            </tr>


            <tr>
                <td rowspan="7">
                    <h3>SUSPENSION, STEERING & BRAKES</h3>
                </td>
            </tr>
            <tr>
                <td>Front Suspension </td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Rear Suspension</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Steering Type</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Steering Gear Type</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Turning Radius <small>(metres)</small></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Top Speed <small>(kmph)</small></td>
                <td></td>
                <td></td>
            </tr>



        </tbody>
    </table>
</div>




@endsection
