@extends('layouts.frontend.header')

@section('title')
Car Judge - Compare Cars
@endsection



@section('content')
<script src="{{ asset('js/app.js') }}"></script>


<?php
  $conn = mysqli_connect("localhost","root","","carjudge");
  $query = mysqli_query($conn,"SELECT AVG(orating) as AVGRATE from reviews where car_id = '". $singlecar1->id ."'");
       $row_rating = mysqli_fetch_array($query);
        $AVGRATE=$row_rating['AVGRATE'];
  $query = mysqli_query($conn,"SELECT count(orating) as Total from reviews where car_id = '". $singlecar1->id ."'");
      $row = mysqli_fetch_array($query);
      $Total=$row['Total'];
 ?>
<style media="screen">
    .star-rating {
        font-size: 1em;
    }

    .star-rating .fa-star {
        color: var(--mainBlue);
    }
</style>




<br><br>
<div class="table-responsive mt-5">
    <table class="table table-bordered table-striped text-center" id="product_table">
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
                          <option value="{{ $row->id }}" <?php if($row->id == $singlecar1->car_model_id)  echo "selected" ?>>{{ $row->car_model }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Choose Year</label>
                      <select class="form-control" name="year1" id="year1" style="width: 100%;" aria-hidden="true" required>
                          <option selected="" disabled="">select</option>
                            <option value="{{ $singlecar1->id }}" <?php echo "selected" ?> >{{ $singlecar1->year }}</option>

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
                var link1 = document.getElementById("year1").value;
                $.ajax({
                    url: window.location.href = "/getData1/" + link1
                });
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
                var link1 = document.getElementById("year1").value;
                var link2 = document.getElementById("year2").value;

                $.ajax({
                    url: window.location.href = "/getData1/" + link1 + "/getData2/" + link2
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
                    <img src="{{ URL::to($singlecar1->car_image) }}" style="height:200px;" class="card-img-top car-img" alt="">
                </td>
                <td>
                    <img src="" style="height:200px;" class="card-img-top car-img" alt="">
                </td>
            </tr>

            <tr>
                <td>Car Model</td>
                <td>{{ $singlecar1->car_model }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Car Price</td>
                <td>৳&nbsp;{{ $singlecar1->car_price }}</td>
                <td></td>
            </tr>
            <tr>
                <td>User rating</td>
                <td>
                  <div class="star-rating">
                      <span style="font-size:22px;color:blue;"> <?php echo round($AVGRATE,1); ?> </span><br>
                      <span class="<?php if($AVGRATE >= 1){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="1" onclick="getOverall(1)"></span>
                      <span class="<?php if($AVGRATE >= 2){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="2" onclick="getOverall(2)"></span>
                      <span class="<?php if($AVGRATE >= 3){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="3" onclick="getOverall(3)"></span>
                      <span class="<?php if($AVGRATE >= 4){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="4" onclick="getOverall(4)"></span>
                      <span class="<?php if($AVGRATE >= 5){echo "fas";}else{echo "far";}; ?> fa-star o" data-overall="5" onclick="getOverall(5)"></span><br>

                      <small><?php echo $Total ?>&nbsp;reviews</small>
                  </div>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>Fuel Type</td>
                <td>{{ $singlecar1->fuel_type }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Engine Displacement</td>
                <td>{{ $singlecar1->engine }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Body Type</td>
                <td>{{ $singlecar1->body_type }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Transmission</td>
                <td>{{ $singlecar1->transmission }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Seating Capacity</td>
                <td>{{ $singlecar1->seat }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Year</td>
                <td>{{ $singlecar1->year }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Max Power (bpm@rpm)</td>
                <td>{{ $singlecar1->max_power }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Boot Space (litres)</td>
                <td>{{ $singlecar1->boot_space }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Fuel Tank Capacity</td>
                <td>{{ $singlecar1->fuel_tank }}</td>
                <td></td>
            </tr>



            <tr>
                <td rowspan="13">
                    <h3>COMFORT & CONVENIENCE</h3>
                </td>
            </tr>
            <tr>
                <td>Power Steering</td>
                <td>{{ $singlecar1->power_steering }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Power Windows Front</td>
                <td>{{ $singlecar1->power_w_f }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Power Windows Rear</td>
                <td>{{ $singlecar1->p_w_r }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Remote Trunk Opener</td>
                <td>{{ $singlecar1->rem_tank_opener }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Remote Fuel Lid Opener</td>
                <td>{{ $singlecar1->rem_fuel_lid_opener }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Low Fuel Warning Light</td>
                <td>{{ $singlecar1->l_f_w_l }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Rear AC Vents</td>
                <td>{{ $singlecar1->r_a_v }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Multifunctional Steering Wheel</td>
                <td>{{ $singlecar1->m_f_w }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Parking Sensors</td>
                <td>{{ $singlecar1->p_s }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Bottle Holders</td>
                <td>{{ $singlecar1->b_h }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Air Conditioner</td>
                <td>{{ $singlecar1->a_c }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Heater</td>
                <td>{{ $singlecar1->heater }}</td>
                <td></td>
            </tr>


            <tr>
                <td rowspan="11">
                    <h3>SAFETY</h3>
                </td>
            </tr>
            <tr>
                <td>Anti Lock Breaking System</td>
                <td>{{ $singlecar1->a_l_b_s }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Brake Assist</td>
                <td>{{ $singlecar1->b_a }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Power Door Locks</td>
                <td>{{ $singlecar1->power_d_locks }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Anti Theft Alarm</td>
                <td>{{ $singlecar1->a_th_a }}</td>
                <td></td>
            </tr>

            <tr>
                <td>No of Airbags</td>
                <td>{{ $singlecar1->no_o_a }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Driver Airbag</td>
                <td>{{ $singlecar1->driver_air }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Xenon Headlamps</td>
                <td>{{ $singlecar1->xenon_headlamps }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Rear Seat Belts</td>
                <td>{{ $singlecar1->r_seat_be }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Crash Sensor</td>
                <td>{{ $singlecar1->crash_sensor }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Rear Camera</td>
                <td>{{ $singlecar1->rear_camera }}</td>
                <td></td>
            </tr>



            <tr>
                <td rowspan="10">
                    <h3>ENTERTAINMENT & COMMUNICATION</h3>
                </td>
            </tr>
            <tr>
                <td>Cd Player</td>
                <td>{{ $singlecar1->cd_player }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Dvd Player</td>
                <td>{{ $singlecar1->dvd_player }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Radio</td>
                <td>{{ $singlecar1->radio }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Speaker Front</td>
                <td>{{ $singlecar1->speaker_front }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Speaker Rear</td>
                <td>{{ $singlecar1->speaker_rear }}</td>
                <td></td>
            </tr>

            <tr>
                <td>USB and Auxilary Input</td>
                <td>{{ $singlecar1->u_a_a_i }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Bluetooth Connectivity</td>
                <td>{{ $singlecar1->bl_c }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Touch Screen</td>
                <td>{{ $singlecar1->touch_s }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Number Of Speaker</td>
                <td>{{ $singlecar1->n_speaker }}</td>
                <td></td>
            </tr>



            <tr>
                <td rowspan="10">
                    <h3>INTERIOR</h3>
                </td>
            </tr>
            <tr>
                <td>Techometer</td>
                <td>{{ $singlecar1->tachometer }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Leather Seats</td>
                <td>{{ $singlecar1->lether_seat }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Leather Steering Wheel</td>
                <td>{{ $singlecar1->l_steering_w }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Digital Clock</td>
                <td>{{ $singlecar1->digital_clock }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Cigarate Lighter</td>
                <td>{{ $singlecar1->cigarate_lighter }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Digital Odometer</td>
                <td>{{ $singlecar1->disi_odomet }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Height Adjustable Driver Seat</td>
                <td>{{ $singlecar1->h_a_d_seat }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Ventilated Seats</td>
                <td>{{ $singlecar1->ventilated_seat }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Dual Tone Dashboard</td>
                <td>{{ $singlecar1->dual_tone }}</td>
                <td></td>
            </tr>


            <tr>
                <td rowspan="6">
                    <h3>FUEL & PERFORMANCE</h3>
                </td>
            </tr>
            <tr>
                <td>Fuel Type</td>
                <td>{{ $singlecar1->fuel_ty }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Mileage <small>(city)</small></td>
                <td>{{ $singlecar1->mileage_c }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Mileage <small>(arai)</small> </td>
                <td>{{ $singlecar1->mileage_a }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Fuel Tank capacity <small>(litres)</small> </td>
                <td>{{ $singlecar1->f_t_capacity }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Top Speed <small>(kmph)</small></td>
                <td>{{ $singlecar1->top_sp }}</td>
                <td></td>
            </tr>

            <tr>
                <td rowspan="10">
                    <h3>ENGINE & TRANSMISSION</h3>
                </td>
            </tr>
            <tr>
                <td>Engine Displacement</td>
                <td>{{ $singlecar1->engine_type }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Max Power <small>(bhp@rpm)</small> </td>
                <td>{{ $singlecar1->max_powe }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Max Torque <small>(nm@rpm)</small> </td>
                <td>{{ $singlecar1->max_torque }}</td>
                <td></td>
            </tr>

            <tr>
                <td>No of Cylinder </td>
                <td>{{ $singlecar1->no_of_cy }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Valves Per Cylinder</td>
                <td>{{ $singlecar1->va_of_cy }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Super Charger</td>
                <td>{{ $singlecar1->super_ch }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Transmission Type </td>
                <td>{{ $singlecar1->trans_ty }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Gear Box</td>
                <td>{{ $singlecar1->gear_b }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Drive Type </td>
                <td>{{ $singlecar1->drive_type }}</td>
                <td></td>
            </tr>


            <tr>
                <td rowspan="13">
                    <h3>DIMENTION & CAPACITY</h3>
                </td>
            </tr>
            <tr>
                <td>Lenght <small>(mm)</small> </td>
                <td>{{ $singlecar1->lenght }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Width <small>(mm)</small> </td>
                <td>{{ $singlecar1->width }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Height <small>(mm)</small> </td>
                <td>{{ $singlecar1->height }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Ground Clearance Unladen <small>(mm)</small> </td>
                <td>{{ $singlecar1->g_clear }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Wheel Base <small>(mm)</small></td>
                <td>{{ $singlecar1->wheel_base }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Front Tread <small>(mm)</small></td>
                <td>{{ $singlecar1->front_tread }}</td>
                <td></td>
            </tr>
            <tr>
                <td>Rear Tread <small>(mm)</td>
                <td>{{ $singlecar1->rear_tread }}</td>
                <td></td>
            </tr>
            <tr>
                <td>Kerb Weight <small>(kg)</small> </td>
                <td>{{ $singlecar1->kerb_weight }}</td>
                <td></td>
            </tr>
            <tr>
                <td>Gross Weight<small>(mm)</small> </td>
                <td>{{ $singlecar1->gross_weight }}</td>
                <td></td>
            </tr>
            <tr>
                <td>Seating Capacity</td>
                <td>{{ $singlecar1->seating_no }}</td>
                <td></td>
            </tr>
            <tr>
                <td>Boot Space <small>(litres)</small> </td>
                <td>{{ $singlecar1->bootspace_li }}</td>
                <td></td>
            </tr>
            <tr>
                <td>No. Of Doors</td>
                <td>{{ $singlecar1->doors_no }}</td>
                <td></td>
            </tr>


            <tr>
                <td rowspan="7">
                    <h3>SUSPENSION, STEERING & BRAKES</h3>
                </td>
            </tr>
            <tr>
                <td>Front Suspension </td>
                <td>{{ $singlecar1->front_sus }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Rear Suspension</td>
                <td>{{ $singlecar1->rear_sus }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Steering Type</td>
                <td>{{ $singlecar1->steering_type }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Steering Gear Type</td>
                <td>{{ $singlecar1->steering_gear_type }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Turning Radius <small>(metres)</small></td>
                <td>{{ $singlecar1->turning_r }}</td>
                <td></td>
            </tr>

            <tr>
                <td>Top Speed <small>(kmph)</small></td>
                <td>{{ $singlecar1->top_speed }}</td>
                <td></td>
            </tr>



        </tbody>
    </table>
</div>




@endsection
