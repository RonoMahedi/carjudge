<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinglecarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('singlecar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('brands_id');
            $table->integer('car_model_id');
            $table->string('car_image')->nullable;
            $table->string('fuel_type',100);
            $table->string('engine',100);
            $table->integer('car_price');
            $table->string('body_type',100);
            $table->string('transmission',100);
            $table->integer('seat');
            $table->integer('year');
            $table->string('max_power',100);
            $table->string('boot_space',100);
            $table->string('fuel_tank',100);
            $table->string('power_steering',100);
            $table->string('power_w_f',100);
            $table->string('p_w_r',100);
            $table->string('rem_tank_opener',100);
            $table->string('rem_fuel_lid_opener',100);
            $table->string('l_f_w_l',100);
            $table->string('a_p_o',100);
            $table->string('t_l',100);
            $table->string('v_m',100);
            $table->string('r_r_l',100);
            $table->string('r_s_h',100);
            $table->string('h_a_f_s_b',100);
            $table->string('c_h_f',100);
            $table->string('c_h_r',100);
            $table->string('r_a_v',100);
            $table->string('m_f_w',100);
            $table->string('p_s',100);
            $table->string('e_s_s_b',100);
            $table->string('b_h',100);
            $table->string('b_s',100);
            $table->string('l_c_i',100);
            $table->string('a_c',100);
            $table->string('heater',100);
            $table->string('a_s',100);
            $table->string('a_l_b_s',100);
            $table->string('b_a',100);
            $table->string('central_locking',100);
            $table->string('power_d_locks',100);
            $table->string('child_s_locks',100);
            $table->string('a_th_a',100);
            $table->string('no_o_a',100);
            $table->string('driver_air',100);
            $table->string('passenger_air',100);
            $table->string('xenon_headlamps',100);
            $table->string('halo_he',100);
            $table->string('r_seat_be',100);
            $table->string('seat_belt_w',100);
            $table->string('door_ajar_w',100);
            $table->string('adjustable_seat',100);
            $table->string('engine_immobilizer',100);
            $table->string('crash_sensor',100);
            $table->string('c_mounted_f_t',100);
            $table->string('rear_camera',100);
            $table->string('a_theft_d',100);
            $table->string('cd_player',100);
            $table->string('dvd_player',100);
            $table->string('radio',100);
            $table->string('audio_system_remote',100);
            $table->string('speaker_front',100);
            $table->string('speaker_rear',100);
            $table->string('u_a_a_i',100);
            $table->string('bl_c',100);
            $table->string('touch_s',100);
            $table->string('n_speaker',100);
            $table->string('tachometer',100);
            $table->string('el_m_te',100);
            $table->string('lether_seat',100);
            $table->string('l_steering_w',100);
            $table->string('g_compart',100);
            $table->string('digital_clock',100);
            $table->string('cigarate_lighter',100);
            $table->string('disi_odomet',100);
            $table->string('h_a_d_seat',100);
            $table->string('ventilated_seat',100);
            $table->string('dual_tone',100);
            $table->string('fuel_ty',100);
            $table->string('mileage_c',100);
            $table->string('mileage_a',100);
            $table->string('f_t_capacity',100);
            $table->string('top_sp',100);
            $table->string('engine_type',100);
            $table->string('engine_dis',100);
            $table->string('max_powe',100);
            $table->string('max_torque',100);
            $table->string('no_of_cy',100);
            $table->string('va_of_cy',100);
            $table->string('va_conf',100);
            $table->string('fuel_s_sys',100);
            $table->string('turbo_ch',100);
            $table->string('super_ch',100);
            $table->string('trans_ty',100);
            $table->string('gear_b',100);
            $table->string('drive_type',100);
            $table->string('lenght',100);
            $table->string('width',100);
            $table->string('height',100);
            $table->string('g_clear',100);
            $table->string('wheel_base',100);
            $table->string('front_tread',100);
            $table->string('rear_tread',100);
            $table->string('kerb_weight',100);
            $table->string('gross_weight',100);
            $table->string('seating_no',100);
            $table->string('bootspace_li',100);
            $table->string('doors_no',100);
            $table->string('front_sus',100);
            $table->string('rear_sus',100);
            $table->string('steering_type',100);
            $table->string('steering_gear_type',100);
            $table->string('turning_r',100);
            $table->string('front_brake',100);
            $table->string('rear_brake',100);
            $table->string('top_speed',100);
            $table->string('acceleration_t',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('singlecar');
    }
}
