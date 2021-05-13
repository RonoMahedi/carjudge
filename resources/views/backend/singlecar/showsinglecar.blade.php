@extends('layouts/backend/app')


@section('title')
  Car Judge - Show car Details
@endsection


@section('content')






<section class="content">

    <div class="container">
        <div class="row">
            <div class="col-12">


<!---adding image---->
<div class="row py-5">
  <div class="col-md-5">
    <img src="{{ URL::to($singlecar->car_image) }}" style="height:300px;width:400px;" alt="">
  </div>
  <div class="col-md-4">
          <h3>{{ $singlecar->car_model }}</h3>
          <h4>User rating</h4>
          <h2>৳{{ $singlecar->car_price }}</h2>
          <button type="button" class="btn btn-success btn-lg" name="button">Post Review</button>
  </div>
</div>









                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">OVERVIEW</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">

                        <div class="card-body">
                            <table class="table table-bordered">

                                <tbody>
                                    <tr>
                                        <td>Fuel Type</td>
                                        <td>{{ $singlecar->fuel_type }}</td>
                                    </tr>
                                    <tr>
                                        <td>Engine Displacement <small>cc</small></td>
                                        <td>{{ $singlecar->engine }}</td>
                                    </tr>
                                    <tr>
                                        <td>Body Type</td>
                                        <td>{{ $singlecar->body_type }}</td>
                                    </tr>
                                    <tr>
                                        <td>Transmission</td>
                                        <td>{{ $singlecar->transmission }}</td>
                                    </tr>
                                    <tr>
                                        <td>Seating Capacity</td>
                                        <td>{{ $singlecar->seat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Year</td>
                                        <td>{{ $singlecar->year }}</td>
                                    </tr>
                                    <tr>
                                        <td>Max Power (bpm@rpm)</td>
                                        <td>{{ $singlecar->max_power }}</td>
                                    </tr>
                                    <tr>
                                        <td>Boot Space (litres)</td>
                                        <td>{{ $singlecar->boot_space }}</td>
                                    </tr>
                                    <tr>
                                        <td>Fuel Tank Capacity</td>
                                        <td>{{ $singlecar->fuel_tank }}</td>
                                    </tr>

                                </tbody>



                            </table>
                        </div>

                    </div>





                </div>



                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">COMFORT & CONVENIENCE</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">


                        <div class="card-body">
                            <table class="table table-bordered">

                                <tbody>
                                    <tr>
                                        <td>Power Steering</td>
                                        <td>{{ $singlecar->power_steering }}</td>
                                    </tr>
                                    <tr>
                                        <td>Power Windows Front</td>
                                        <td>{{ $singlecar->power_w_f }}</td>
                                    </tr>
                                    <tr>
                                        <td>Power Windows Rear</td>
                                        <td>{{ $singlecar->p_w_r }}</td>
                                    </tr>
                                    <tr>
                                        <td>Remote Trunk Opener</td>
                                        <td>{{ $singlecar->rem_tank_opener }}</td>
                                    </tr>
                                    <tr>
                                        <td>Remote Fuel Lid Opener</td>
                                        <td>{{ $singlecar->rem_fuel_lid_opener }}</td>
                                    </tr>
                                    <tr>
                                        <td>Low Fuel Warning Light</td>
                                        <td>{{ $singlecar->l_f_w_l }}</td>
                                    </tr>
                                    <tr>
                                        <td>Accessory Power Outlet</td>
                                        <td>{{ $singlecar->a_p_o }}</td>
                                    </tr>
                                    <tr>
                                        <td>Trunk light</td>
                                        <td>{{ $singlecar->t_l }}</td>
                                    </tr>
                                    <tr>
                                        <td>Vanity Mirror</td>
                                        <td>{{ $singlecar->v_m }}</td>
                                    </tr>
                                    <tr>
                                        <td>Rear Reading Lamp</td>
                                        <td>{{ $singlecar->r_r_l }}</td>
                                    </tr>
                                    <tr>
                                        <td>Rear Seat Headrest</td>
                                        <td>{{ $singlecar->r_s_h }}</td>
                                    </tr>
                                    <tr>
                                        <td>Height Adjustable Front Seat Belts</td>
                                        <td>{{ $singlecar->h_a_f_s_b }}</td>
                                    </tr>
                                    <tr>
                                        <td>Cup Holders Front</td>
                                        <td>{{ $singlecar->c_h_f }}</td>
                                    </tr>
                                    <tr>
                                        <td>Cup Holders Rear</td>
                                        <td>{{ $singlecar->c_h_r }}</td>
                                    </tr>
                                    <tr>
                                        <td>Rear AC Vents</td>
                                        <td>{{ $singlecar->r_a_v }}</td>
                                    </tr>
                                    <tr>
                                        <td>Multifunctional Steering Wheel</td>
                                        <td>{{ $singlecar->m_f_w }}</td>
                                    </tr>
                                    <tr>
                                        <td>Parking Sensors</td>
                                        <td>{{ $singlecar->p_s }}</td>
                                    </tr>
                                    <tr>
                                        <td>Engine Start Stop Button</td>
                                        <td>{{ $singlecar->e_s_s_b }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bottle Holders</td>
                                        <td>{{ $singlecar->b_h }}</td>
                                    </tr>
                                    <tr>
                                        <td>Battery Saver</td>
                                        <td>{{ $singlecar->b_s }}</td>
                                    </tr>
                                    <tr>
                                        <td>Lane Change Indicator</td>
                                        <td>{{ $singlecar->l_c_i }}</td>
                                    </tr>
                                    <tr>
                                        <td>Air Conditioner</td>
                                        <td>{{ $singlecar->a_c }}</td>
                                    </tr>
                                    <tr>
                                        <td>Heater</td>
                                        <td>{{ $singlecar->heater }}</td>
                                    </tr>
                                    <tr>
                                        <td>Adjustable Steering</td>
                                        <td>{{ $singlecar->a_s }}</td>
                                    </tr>


                                </tbody>



                            </table>
                        </div>

                    </div>



                </div>



                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">SAFETY</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">


                        <div class="card-body">
                            <table class="table table-bordered">

                                <tbody>
                                    <tr>
                                        <td>Anti Lock Breaking System</td>
                                        <td>{{ $singlecar->a_l_b_s }}</td>
                                    </tr>
                                    <tr>
                                        <td>Brake Assist</td>
                                        <td>{{ $singlecar->b_a }}</td>
                                    </tr>
                                    <tr>
                                        <td>Central Locking</td>
                                        <td>{{ $singlecar->central_locking }}</td>
                                    </tr>
                                    <tr>
                                        <td>Power Door Locks</td>
                                        <td>{{ $singlecar->power_d_locks }}</td>
                                    </tr>
                                    <tr>
                                        <td>Child Safety Locks</td>
                                        <td>{{ $singlecar->child_s_locks }}</td>
                                    </tr>
                                    <tr>
                                        <td>Anti Theft Alarm</td>
                                        <td>{{ $singlecar->a_th_a }}</td>
                                    </tr>
                                    <tr>
                                        <td>No of Airbags</td>
                                        <td>{{ $singlecar->no_o_a }}</td>
                                    </tr>
                                    <tr>
                                        <td>Driver Airbag</td>
                                        <td>{{ $singlecar->driver_air }}</td>
                                    </tr>
                                    <tr>
                                        <td>Passenger Airbag</td>
                                        <td>{{ $singlecar->passenger_air }}</td>
                                    </tr>
                                    <tr>
                                        <td>Xenon Headlamps</td>
                                        <td>{{ $singlecar->xenon_headlamps }}</td>
                                    </tr>
                                    <tr>
                                        <td>Halogen Headlamps</td>
                                        <td>{{ $singlecar->halo_he }}</td>
                                    </tr>
                                    <tr>
                                        <td>Rear Seat Belts</td>
                                        <td>{{ $singlecar->r_seat_be }}</td>
                                    </tr>
                                    <tr>
                                        <td>Seat Belt Warning</td>
                                        <td>{{ $singlecar->seat_belt_w }}</td>
                                    </tr>
                                    <tr>
                                        <td>Door Ajar Warning</td>
                                        <td>{{ $singlecar->door_ajar_w }}</td>
                                    </tr>
                                    <tr>
                                        <td>Adjustable Seats</td>
                                        <td>{{ $singlecar->adjustable_seat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Engine Immobilizer</td>
                                        <td>{{ $singlecar->engine_immobilizer }}</td>
                                    </tr>
                                    <tr>
                                        <td>Crash Sensor</td>
                                        <td>{{ $singlecar->crash_sensor }}</td>
                                    </tr>
                                    <tr>
                                        <td>Centrlly Mounted Fuel Tank</td>
                                        <td>{{ $singlecar->c_mounted_f_t }}</td>
                                    </tr>
                                    <tr>
                                        <td>Rear Camera</td>
                                        <td>{{ $singlecar->rear_camera }}</td>
                                    </tr>
                                    <tr>
                                        <td>Anti Theft Device</td>
                                        <td>{{ $singlecar->a_theft_d }}</td>
                                    </tr>

                                </tbody>



                            </table>
                        </div>

                    </div>
                </div>



                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ENTERTAINMENT & COMMUNICATION</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">


                        <div class="card-body">
                            <table class="table table-bordered">

                                <tbody>
                                    <tr>
                                        <td>Cd Player</td>
                                        <td>{{ $singlecar->cd_player }}</td>
                                    </tr>
                                    <tr>
                                        <td>Dvd Player</td>
                                        <td>{{ $singlecar->dvd_player }}</td>
                                    </tr>
                                    <tr>
                                        <td>Radio</td>
                                        <td>{{ $singlecar->radio }}</td>
                                    </tr>
                                    <tr>
                                        <td>Audio System Remote Control</td>
                                        <td>{{ $singlecar->audio_system_remote }}</td>
                                    </tr>
                                    <tr>
                                        <td>Speaker Front</td>
                                        <td>{{ $singlecar->speaker_front }}</td>
                                    </tr>
                                    <tr>
                                        <td>Speaker Rear</td>
                                        <td>{{ $singlecar->speaker_rear }}</td>
                                    </tr>
                                    <tr>
                                        <td>USB and Auxilary Input</td>
                                        <td>{{ $singlecar->u_a_a_i }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bluetooth Connectivity</td>
                                        <td>{{ $singlecar->bl_c }}</td>
                                    </tr>
                                    <tr>
                                        <td>Touch Screen</td>
                                        <td>{{ $singlecar->touch_s }}</td>
                                    </tr>
                                    <tr>
                                        <td>Number Of Speaker</td>
                                        <td>{{ $singlecar->n_speaker }}</td>
                                    </tr>

                                </tbody>



                            </table>
                        </div>

                    </div>

                </div>


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">INTERIOR</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">


                        <div class="card-body">
                            <table class="table table-bordered">

                                <tbody>
                                    <tr>
                                        <td>Techometer</td>
                                        <td>{{ $singlecar->tachometer }}</td>
                                    </tr>
                                    <tr>
                                        <td>Electronic Multi Tripmeter</td>
                                        <td>{{ $singlecar->el_m_te }}</td>
                                    </tr>
                                    <tr>
                                        <td>Leather Seats</td>
                                        <td>{{ $singlecar->lether_seat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Leather Steering Wheel</td>
                                        <td>{{ $singlecar->l_steering_w }}</td>
                                    </tr>
                                    <tr>
                                        <td>Glove Compartment</td>
                                        <td>{{ $singlecar->g_compart }}</td>
                                    </tr>
                                    <tr>
                                        <td>Digital Clock</td>
                                        <td>{{ $singlecar->digital_clock }}</td>
                                    </tr>
                                    <tr>
                                        <td>Cigarate Lighter</td>
                                        <td>{{ $singlecar->cigarate_lighter }}</td>
                                    </tr>
                                    <tr>
                                        <td>Digital Odometer</td>
                                        <td>{{ $singlecar->disi_odomet }}</td>
                                    </tr>
                                    <tr>
                                        <td>Height Adjustable Driver Seat</td>
                                        <td>{{ $singlecar->h_a_d_seat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ventilated Seats</td>
                                        <td>{{ $singlecar->ventilated_seat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Dual Tone Dashboard</td>
                                        <td>{{ $singlecar->dual_tone }}</td>
                                    </tr>
                                </tbody>



                            </table>
                        </div>

                    </div>
                </div>




                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">FUEL & PERFORMANCE</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">


                        <div class="card-body">
                            <table class="table table-bordered">

                                <tbody>
                                    <tr>
                                        <td>Fuel Type</td>
                                        <td>{{ $singlecar->fuel_ty }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mileage <small>(city)</small> </td>
                                        <td>{{ $singlecar->mileage_c }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mileage <small>(arai)</small> </td>
                                        <td>{{ $singlecar->mileage_a }}</td>
                                    </tr>
                                    <tr>
                                        <td>Fuel Tank capacity <small>(litres)</small> </td>
                                        <td>{{ $singlecar->f_t_capacity }}</td>
                                    </tr>
                                    <tr>
                                        <td>Top Speed <small>(kmph)</small> </td>
                                        <td>{{ $singlecar->top_sp }}</td>
                                    </tr>

                                </tbody>



                            </table>
                        </div>

                    </div>

                </div>



                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ENGINE & TRANSMISSION</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">


                        <div class="card-body">
                            <table class="table table-bordered">

                                <tbody>
                                    <tr>
                                        <td>Engine Type</td>
                                        <td>{{ $singlecar->engine_type }}</td>
                                    </tr>
                                    <tr>
                                        <td>Engine Displacement <small>(cc)</small> </td>
                                        <td>{{ $singlecar->engine_dis }}</td>
                                    </tr>
                                    <tr>
                                        <td>Max Power <small>(bhp@rpm)</small> </td>
                                        <td>{{ $singlecar->max_powe }}</td>
                                    </tr>
                                    <tr>
                                        <td>Max Torque <small>(nm@rpm)</small> </td>
                                        <td>{{ $singlecar->max_torque }}</td>
                                    </tr>
                                    <tr>
                                        <td>No of Cylinder</td>
                                        <td>{{ $singlecar->no_of_cy }}</td>
                                    </tr>
                                    <tr>
                                        <td>Valves Per Cylinder</td>
                                        <td>{{ $singlecar->va_of_cy }}</td>
                                    </tr>
                                    <tr>
                                        <td>Valve Configuration</td>
                                        <td>{{ $singlecar->va_conf }}</td>
                                    </tr>
                                    <tr>
                                        <td>Fuel Supply System</td>
                                        <td>{{ $singlecar->fuel_s_sys }}</td>
                                    </tr>
                                    <tr>
                                        <td>Turbo Charger</td>
                                        <td>{{ $singlecar->turbo_ch }}</td>
                                    </tr>
                                    <tr>
                                        <td>Super Charger</td>
                                        <td>{{ $singlecar->super_ch }}</td>
                                    </tr>
                                    <tr>
                                        <td>Transmission Type</td>
                                        <td>{{ $singlecar->trans_ty }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gear Box</td>
                                        <td>{{ $singlecar->gear_b }}</td>
                                    </tr>
                                    <tr>
                                        <td>Drive Type</td>
                                        <td>{{ $singlecar->drive_type }}</td>
                                    </tr>

                                </tbody>



                            </table>
                        </div>

                    </div>
                </div>




                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DIMENTION & CAPACITY</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">


                        <div class="card-body">
                            <table class="table table-bordered">

                                <tbody>
                                    <tr>
                                        <td>Lenght <small>(mm)</small> </td>
                                        <td>{{ $singlecar->lenght }}</td>
                                    </tr>
                                    <tr>
                                        <td>Width <small>(mm)</small> </td>
                                        <td>{{ $singlecar->width }}</td>
                                    </tr>
                                    <tr>
                                        <td>Height <small>(mm)</small> </td>
                                        <td>{{ $singlecar->height }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ground Clearance Unladen <small>(mm)</small> </td>
                                        <td>{{ $singlecar->g_clear }}</td>
                                    </tr>
                                    <tr>
                                        <td>Wheel Base <small>(mm)</small> </td>
                                        <td>{{ $singlecar->wheel_base }}</td>
                                    </tr>
                                    <tr>
                                        <td>Front Tread <small>(mm)</small> </td>
                                        <td>{{ $singlecar->front_tread }}</td>
                                    </tr>
                                    <tr>
                                        <td>Rear Tread <small>(mm)</small> </td>
                                        <td>{{ $singlecar->rear_tread }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kerb Weight <small>(kg)</small> </td>
                                        <td>{{ $singlecar->kerb_weight }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gross Weight<small>(mm)</small> </td>
                                        <td>{{ $singlecar->gross_weight }}</td>
                                    </tr>
                                    <tr>
                                        <td>Seating Capacity</td>
                                        <td>{{ $singlecar->seating_no }}</td>
                                    </tr>
                                    <tr>
                                        <td>Boot Space <small>(litres)</small> </td>
                                        <td>{{ $singlecar->bootspace_li }}</td>
                                    </tr>
                                    <tr>
                                        <td>No. Of Doors</td>
                                        <td>{{ $singlecar->doors_no }}</td>
                                    </tr>

                                </tbody>



                            </table>
                        </div>

                    </div>

                </div>



                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">SUSPENSION, STEERING & BRAKES</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">


                        <div class="card-body">
                            <table class="table table-bordered">

                                <tbody>
                                    <tr>
                                        <td>Front Suspension</td>
                                        <td>{{ $singlecar->front_sus }}</td>
                                    </tr>
                                    <tr>
                                        <td>Rear Suspension</td>
                                        <td>{{ $singlecar->rear_sus }}</td>
                                    </tr>
                                    <tr>
                                        <td>Steering Type</td>
                                        <td>{{ $singlecar->steering_type }}</td>
                                    </tr>
                                    <tr>
                                        <td>Steering Gear Type</td>
                                        <td>{{ $singlecar->steering_gear_type }}</td>
                                    </tr>
                                    <tr>
                                        <td>Turning Radius <small>(metres)</small> </td>
                                        <td>{{ $singlecar->turning_r }}</td>
                                    </tr>
                                    <tr>
                                        <td>Front Brake Type</td>
                                        <td>{{ $singlecar->front_brake }}</td>
                                    </tr>
                                    <tr>
                                        <td>Rear Break Type</td>
                                        <td>{{ $singlecar->rear_brake }}</td>
                                    </tr>
                                    <tr>
                                        <td>Top Speed <small>(kmph)</small> </td>
                                        <td>{{ $singlecar->top_speed }}</td>
                                    </tr>
                                    <tr>
                                        <td>Acceleration <small>(seconds)</small> </td>
                                        <td>{{ $singlecar->acceleration_t }}</td>
                                    </tr>

                                </tbody>



                            </table>
                        </div>

                    </div>



                </div>






            </div>
        </div>
    </div>
</section>






@endsection
