<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SingleCarController extends Controller
{

  public function getadminmodels($id)
   {
  $boverviews = DB::table('boverviews')
      ->where('brands_id',$id)
      ->pluck("car_model","id");
  return json_encode($boverviews);
   }


    public function addcar()
    {
      $brands = DB::table('brands')->get();
      $boverviews = DB::table('boverviews')->get();
      return view('backend.singlecar.addsinglecar',compact('brands','boverviews'));
    }

    public function storecar(Request $request)
    {
      $validatedData = $request->validate([
        'car_image'=>'required | mimes:png,PNG,jpg,JPG,jpeg,JPEG|max:1000',
        'fuel_type'=>'required|max:50',
        'engine'=>'required|max:50',
        'car_price'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:6|max:8',
        'body_type'=>'required|max:50',
        'transmission'=>'required|max:50',
        'seat'=>'regex:/^([2-8\s\-\+\(\)]*)$/|min:1|max:2',
        'year'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:4|max:4',
        'max_power'=>'required|max:50',
        'boot_space'=>'required|max:50',
        'fuel_tank'=>'required|max:50',
        'power_steering'=>'required|max:50',
        'power_w_f'=>'required|max:50',
        'p_w_r'=>'required|max:50',
        'rem_tank_opener'=>'required|max:50',
        'rem_fuel_lid_opener'=>'required|max:50',
        'l_f_w_l'=>'required|max:50',
        'a_p_o'=>'required|max:50',
        't_l'=>'required|max:50',
        'v_m'=>'required|max:50',
        'r_r_l'=>'required|max:50',
        'r_s_h'=>'required|max:50',
        'h_a_f_s_b'=>'required|max:50',
        'c_h_f'=>'required|max:50',
        'c_h_r'=>'required|max:50',
        'r_a_v'=>'required|max:50',
        'm_f_w'=>'required|max:50',
        'p_s'=>'required|max:50',
        'e_s_s_b'=>'required|max:50',
        'b_h'=>'required|max:50',
        'b_s'=>'required|max:50',
        'l_c_i'=>'required|max:50',
        'a_c'=>'required|max:50',
        'heater'=>'required|max:50',
        'a_s'=>'required|max:50',
        'a_l_b_s'=>'required|max:50',
        'b_a'=>'required|max:50',
        'central_locking'=>'required|max:50',
        'power_d_locks'=>'required|max:50',
        'child_s_locks'=>'required|max:50',
        'a_th_a'=>'required|max:50',
        'no_o_a'=>'required|max:50',
        'driver_air'=>'required|max:50',
        'passenger_air'=>'required|max:50',
        'xenon_headlamps'=>'required|max:50',
        'halo_he'=>'required|max:50',
        'r_seat_be'=>'required|max:50',
        'seat_belt_w'=>'required|max:50',
        'door_ajar_w'=>'required|max:50',
        'adjustable_seat'=>'required|max:50',
        'engine_immobilizer'=>'required|max:50',
        'crash_sensor'=>'required|max:50',
        'c_mounted_f_t'=>'required|max:50',
        'rear_camera'=>'required|max:50',
        'a_theft_d'=>'required|max:50',
        'cd_player'=>'required|max:50',
        'dvd_player'=>'required|max:50',
        'radio'=>'required|max:50',
        'audio_system_remote'=>'required|max:50',
        'speaker_front'=>'required|max:50',
        'speaker_rear'=>'required|max:50',
        'u_a_a_i'=>'required|max:50',
        'bl_c'=>'required|max:50',
        'touch_s'=>'required|max:50',
        'n_speaker'=>'required|max:50',
        'tachometer'=>'required|max:50',
        'el_m_te'=>'required|max:50',
        'lether_seat'=>'required|max:50',
        'l_steering_w'=>'required|max:50',
        'g_compart'=>'required|max:50',
        'digital_clock'=>'required|max:50',
        'cigarate_lighter'=>'required|max:50',
        'disi_odomet'=>'required|max:50',
        'h_a_d_seat'=>'required|max:50',
        'ventilated_seat'=>'required|max:50',
        'dual_tone'=>'required|max:50',
        'fuel_ty'=>'required|max:50',
        'mileage_c'=>'required|max:50',
        'mileage_a'=>'required|max:50',
        'f_t_capacity'=>'required|max:50',
        'top_sp'=>'required|max:50',
        'engine_type'=>'required|max:50',
        'engine_dis'=>'required|max:50',
        'max_powe'=>'required|max:50',
        'max_torque'=>'required|max:50',
        'no_of_cy'=>'required|max:50',
        'va_of_cy'=>'required|max:50',
        'va_conf'=>'required|max:50',
        'fuel_s_sys'=>'required|max:50',
        'turbo_ch'=>'required|max:50',
        'super_ch'=>'required|max:50',
        'trans_ty'=>'required|max:50',
        'gear_b'=>'required|max:50',
        'drive_type'=>'required|max:50',
        'lenght'=>'required|max:50',
        'width'=>'required|max:50',
        'height'=>'required|max:50',
        'g_clear'=>'required|max:50',
        'wheel_base'=>'required|max:50',
        'front_tread'=>'required|max:50',
        'rear_tread'=>'required|max:50',
        'kerb_weight'=>'required|max:50',
        'gross_weight'=>'required|max:50',
        'seating_no'=>'required|max:50',
        'bootspace_li'=>'required|max:50',
        'doors_no'=>'required|max:50',
        'front_sus'=>'required|max:50',
        'rear_sus'=>'required|max:50',
        'steering_type'=>'required|max:50',
        'steering_gear_type'=>'required|max:50',
        'turning_r'=>'required|max:50',
        'front_brake'=>'required|max:50',
        'rear_brake'=>'required|max:50',
        'top_speed'=>'required|max:50',
        'acceleration_t'=>'required|max:50'
      ]);
      $data=array();
      $data['brands_id']=$request->brands_id;
      $data['car_model_id']=$request->car_model_id;
      $data['car_image']=$request->car_image;
      $data['fuel_type']=$request->fuel_type;
      $data['engine']=$request->engine;
      $data['car_price']=$request->car_price;
      $data['body_type']=$request->body_type;
      $data['transmission']=$request->transmission;
      $data['seat']=$request->seat;
      $data['year']=$request->year;
      $data['max_power']=$request->max_power;
      $data['boot_space']=$request->boot_space;
      $data['fuel_tank']=$request->fuel_tank;
      $data['power_steering']=$request->power_steering;
      $data['power_w_f']=$request->power_w_f;
      $data['p_w_r']=$request->p_w_r;
      $data['rem_tank_opener']=$request->rem_tank_opener;
      $data['rem_fuel_lid_opener']=$request->rem_fuel_lid_opener;
      $data['l_f_w_l']=$request->l_f_w_l;
      $data['a_p_o']=$request->a_p_o;
      $data['t_l']=$request->t_l;
      $data['v_m']=$request->v_m;
      $data['r_r_l']=$request->r_r_l;
      $data['r_s_h']=$request->r_s_h;
      $data['h_a_f_s_b']=$request->h_a_f_s_b;
      $data['c_h_f']=$request->c_h_f;
      $data['c_h_r']=$request->c_h_r;
      $data['r_a_v']=$request->r_a_v;
      $data['m_f_w']=$request->m_f_w;
      $data['p_s']=$request->p_s;
      $data['e_s_s_b']=$request->e_s_s_b;
      $data['b_h']=$request->b_h;
      $data['b_s']=$request->b_s;
      $data['l_c_i']=$request->l_c_i;
      $data['a_c']=$request->a_c;
      $data['heater']=$request->heater;
      $data['a_s']=$request->a_s;
      $data['a_l_b_s']=$request->a_l_b_s;
      $data['b_a']=$request->b_a;
      $data['central_locking']=$request->central_locking;
      $data['power_d_locks']=$request->power_d_locks;
      $data['child_s_locks']=$request->child_s_locks;
      $data['a_th_a']=$request->a_th_a;
      $data['no_o_a']=$request->no_o_a;
      $data['driver_air']=$request->driver_air;
      $data['passenger_air']=$request->passenger_air;
      $data['xenon_headlamps']=$request->xenon_headlamps;
      $data['halo_he']=$request->halo_he;
      $data['r_seat_be']=$request->r_seat_be;
      $data['seat_belt_w']=$request->seat_belt_w;
      $data['door_ajar_w']=$request->door_ajar_w;
      $data['adjustable_seat']=$request->adjustable_seat;
      $data['engine_immobilizer']=$request->engine_immobilizer;
      $data['crash_sensor']=$request->crash_sensor;
      $data['c_mounted_f_t']=$request->c_mounted_f_t;
      $data['rear_camera']=$request->rear_camera;
      $data['a_theft_d']=$request->a_theft_d;
      $data['cd_player']=$request->cd_player;
      $data['dvd_player']=$request->dvd_player;
      $data['radio']=$request->radio;
      $data['audio_system_remote']=$request->audio_system_remote;
      $data['speaker_front']=$request->speaker_front;
      $data['speaker_rear']=$request->speaker_rear;
      $data['u_a_a_i']=$request->u_a_a_i;
      $data['bl_c']=$request->bl_c;
      $data['touch_s']=$request->touch_s;
      $data['n_speaker']=$request->n_speaker;
      $data['tachometer']=$request->tachometer;
      $data['el_m_te']=$request->el_m_te;
      $data['lether_seat']=$request->lether_seat;
      $data['l_steering_w']=$request->l_steering_w;
      $data['g_compart']=$request->g_compart;
      $data['digital_clock']=$request->digital_clock;
      $data['cigarate_lighter']=$request->cigarate_lighter;
      $data['disi_odomet']=$request->disi_odomet;
      $data['h_a_d_seat']=$request->h_a_d_seat;
      $data['ventilated_seat']=$request->ventilated_seat;
      $data['dual_tone']=$request->dual_tone;
      $data['fuel_ty']=$request->fuel_ty;
      $data['mileage_c']=$request->mileage_c;
      $data['mileage_a']=$request->mileage_a;
      $data['f_t_capacity']=$request->f_t_capacity;
      $data['top_sp']=$request->top_sp;
      $data['engine_type']=$request->engine_type;
      $data['engine_dis']=$request->engine_dis;
      $data['max_powe']=$request->max_powe;
      $data['max_torque']=$request->max_torque;
      $data['no_of_cy']=$request->no_of_cy;
      $data['va_of_cy']=$request->va_of_cy;
      $data['va_conf']=$request->va_conf;
      $data['fuel_s_sys']=$request->fuel_s_sys;
      $data['turbo_ch']=$request->turbo_ch;
      $data['super_ch']=$request->super_ch;
      $data['trans_ty']=$request->trans_ty;
      $data['gear_b']=$request->gear_b;
      $data['drive_type']=$request->drive_type;
      $data['lenght']=$request->lenght;
      $data['width']=$request->width;
      $data['height']=$request->height;
      $data['g_clear']=$request->g_clear;
      $data['wheel_base']=$request->wheel_base;
      $data['front_tread']=$request->front_tread;
      $data['rear_tread']=$request->rear_tread;
      $data['kerb_weight']=$request->kerb_weight;
      $data['gross_weight']=$request->gross_weight;
      $data['seating_no']=$request->seating_no;
      $data['bootspace_li']=$request->bootspace_li;
      $data['doors_no']=$request->doors_no;
      $data['front_sus']=$request->front_sus;
      $data['rear_sus']=$request->rear_sus;
      $data['steering_type']=$request->steering_type;
      $data['steering_gear_type']=$request->steering_gear_type;
      $data['turning_r']=$request->turning_r;
      $data['front_brake']=$request->front_brake;
      $data['rear_brake']=$request->rear_brake;
      $data['top_speed']=$request->top_speed;
      $data['acceleration_t']=$request->acceleration_t;
      $image = $request->file('car_image');
        if ($image) {
          $image_name=hexdec(uniqid());
          $ext=strtolower($image->getClientOriginalExtension());
          $image_full_name=$image_name.'.'.$ext;
          $upload_path='images/cars/';
          $image_url=$upload_path.$image_full_name;
          $success=$image->move($upload_path,$image_full_name);
          $data['car_image']=$image_url;
          DB::table('singlecar')->insert($data);
          $notification=array(
              'message'=>'Successfully inserted data',
              'alert-type'=>'success'
          );
          return redirect()->route('allsinglecar')->with($notification);
        }
        else{
          DB::table('singlecar')->insert($data);
          $notification=array(
              'message'=>'Successfully inserted data',
              'alert-type'=>'success'
          );
          return redirect()->route('allsinglecar')->with($notification);
        }

  }


     public function allcar()
     {
       $singlecar = DB::table('singlecar')
       ->join('brands','singlecar.brands_id','brands.id')
       ->join('boverviews','singlecar.car_model_id','boverviews.id')
       ->select('singlecar.*','brands.name','boverviews.car_model')
       ->paginate(5);
       return view('backend.singlecar.allsinglecar',compact('singlecar'));
     }

    public function showcar($id)
    {
      $singlecar = DB::table('singlecar')
      ->join('brands','singlecar.brands_id','brands.id')
      ->join('boverviews','singlecar.car_model_id','boverviews.id')
      ->select('singlecar.*','brands.name','boverviews.car_model')
      ->where('singlecar.id',$id)
      ->first();
      return view('backend.singlecar.showsinglecar',compact('singlecar'));
    }

public function deletecar($id)
{
  $singlecar=DB::table('singlecar')->where('id',$id)->first();
  $image = $singlecar->car_image;

  $delete=DB::table('singlecar')->where('id',$id)->delete();
  if ($delete) {
    unlink($image);
    $notification=array(
        'message'=>'Deleted Successfully',
        'alert-type'=>'success'
    );
    return redirect()->back()->with($notification);

  }else{
    return back()->with('error', 'Something wrong -_-');
  }
}



public function editcar($id)
{
  $brands=DB::table('brands')->get();
  $boverviews=DB::table('boverviews')->get();
  $singlecar=DB::table('singlecar')->where('id',$id)->first();
  return view('backend.singlecar.editsinglecar',compact('brands','boverviews','singlecar'));
}

public function updatecar(Request $request,$id)
{
  $validatedData = $request->validate([
    'car_image'=>'mimes:png,PNG,jpg,JPG,jpeg,JPEG|max:1000',
    'fuel_type'=>'max:50',
    'engine'=>'max:50',
    'car_price'=>'regex:/^([0-9\s\-\+\(\)]*)$/|min:6|max:8',
    'body_type'=>'max:50',
    'transmission'=>'max:50',
    'seat'=>'regex:/^([0-9\s\-\+\(\)]*)$/|min:1|max:2',
    'year'=>'regex:/^([0-9\s\-\+\(\)]*)$/|min:4|max:4',
    'max_power'=>'max:50',
    'boot_space'=>'max:50',
    'fuel_tank'=>'max:50',
    'power_steering'=>'max:50',
    'power_w_f'=>'max:50',
    'p_w_r'=>'max:50',
    'rem_tank_opener'=>'max:50',
    'rem_fuel_lid_opener'=>'max:50',
    'l_f_w_l'=>'max:50',
    'a_p_o'=>'max:50',
    't_l'=>'max:50',
    'v_m'=>'max:50',
    'r_r_l'=>'max:50',
    'r_s_h'=>'max:50',
    'h_a_f_s_b'=>'max:50',
    'c_h_f'=>'max:50',
    'c_h_r'=>'max:50',
    'r_a_v'=>'max:50',
    'm_f_w'=>'max:50',
    'p_s'=>'max:50',
    'e_s_s_b'=>'max:50',
    'b_h'=>'max:50',
    'b_s'=>'max:50',
    'l_c_i'=>'max:50',
    'a_c'=>'max:50',
    'heater'=>'max:50',
    'a_s'=>'max:50',
    'a_l_b_s'=>'max:50',
    'b_a'=>'max:50',
    'central_locking'=>'max:50',
    'power_d_locks'=>'max:50',
    'child_s_locks'=>'max:50',
    'a_th_a'=>'max:50',
    'no_o_a'=>'max:50',
    'driver_air'=>'max:50',
    'passenger_air'=>'max:50',
    'xenon_headlamps'=>'max:50',
    'halo_he'=>'max:50',
    'r_seat_be'=>'max:50',
    'seat_belt_w'=>'max:50',
    'door_ajar_w'=>'max:50',
    'adjustable_seat'=>'max:50',
    'engine_immobilizer'=>'max:50',
    'crash_sensor'=>'max:50',
    'c_mounted_f_t'=>'max:50',
    'rear_camera'=>'max:50',
    'a_theft_d'=>'max:50',
    'cd_player'=>'max:50',
    'dvd_player'=>'max:50',
    'radio'=>'max:50',
    'audio_system_remote'=>'max:50',
    'speaker_front'=>'max:50',
    'speaker_rear'=>'max:50',
    'u_a_a_i'=>'max:50',
    'bl_c'=>'max:50',
    'touch_s'=>'max:50',
    'n_speaker'=>'max:50',
    'tachometer'=>'max:50',
    'el_m_te'=>'max:50',
    'lether_seat'=>'max:50',
    'l_steering_w'=>'max:50',
    'g_compart'=>'max:50',
    'digital_clock'=>'max:50',
    'cigarate_lighter'=>'max:50',
    'disi_odomet'=>'max:50',
    'h_a_d_seat'=>'max:50',
    'ventilated_seat'=>'max:50',
    'dual_tone'=>'max:50',
    'fuel_ty'=>'max:50',
    'mileage_c'=>'max:50',
    'mileage_a'=>'max:50',
    'f_t_capacity'=>'max:50',
    'top_sp'=>'max:50',
    'engine_type'=>'max:50',
    'engine_dis'=>'max:50',
    'max_powe'=>'max:50',
    'max_torque'=>'max:50',
    'no_of_cy'=>'max:50',
    'va_of_cy'=>'max:50',
    'va_conf'=>'max:50',
    'fuel_s_sys'=>'max:50',
    'turbo_ch'=>'max:50',
    'super_ch'=>'max:50',
    'trans_ty'=>'max:50',
    'gear_b'=>'max:50',
    'drive_type'=>'max:50',
    'lenght'=>'max:50',
    'width'=>'max:50',
    'height'=>'max:50',
    'g_clear'=>'max:50',
    'wheel_base'=>'max:50',
    'front_tread'=>'max:50',
    'rear_tread'=>'max:50',
    'kerb_weight'=>'max:50',
    'gross_weight'=>'max:50',
    'seating_no'=>'max:50',
    'bootspace_li'=>'max:50',
    'doors_no'=>'max:50',
    'front_sus'=>'max:50',
    'rear_sus'=>'max:50',
    'steering_type'=>'max:50',
    'steering_gear_type'=>'max:50',
    'turning_r'=>'max:50',
    'front_brake'=>'max:50',
    'rear_brake'=>'max:50',
    'top_speed'=>'max:50',
    'acceleration_t'=>'max:50'

  ]);
  $data=array();
  $data['brands_id']=$request->brands_id;
  $data['car_model_id']=$request->car_model_id;
  $data['car_image']=$request->car_image;
  $data['fuel_type']=$request->fuel_type;
  $data['engine']=$request->engine;
  $data['car_price']=$request->car_price;
  $data['body_type']=$request->body_type;
  $data['transmission']=$request->transmission;
  $data['seat']=$request->seat;
  $data['year']=$request->year;
  $data['max_power']=$request->max_power;
  $data['boot_space']=$request->boot_space;
  $data['fuel_tank']=$request->fuel_tank;
  $data['power_steering']=$request->power_steering;
  $data['power_w_f']=$request->power_w_f;
  $data['p_w_r']=$request->p_w_r;
  $data['rem_tank_opener']=$request->rem_tank_opener;
  $data['rem_fuel_lid_opener']=$request->rem_fuel_lid_opener;
  $data['l_f_w_l']=$request->l_f_w_l;
  $data['a_p_o']=$request->a_p_o;
  $data['t_l']=$request->t_l;
  $data['v_m']=$request->v_m;
  $data['r_r_l']=$request->r_r_l;
  $data['r_s_h']=$request->r_s_h;
  $data['h_a_f_s_b']=$request->h_a_f_s_b;
  $data['c_h_f']=$request->c_h_f;
  $data['c_h_r']=$request->c_h_r;
  $data['r_a_v']=$request->r_a_v;
  $data['m_f_w']=$request->m_f_w;
  $data['p_s']=$request->p_s;
  $data['e_s_s_b']=$request->e_s_s_b;
  $data['b_h']=$request->b_h;
  $data['b_s']=$request->b_s;
  $data['l_c_i']=$request->l_c_i;
  $data['a_c']=$request->a_c;
  $data['heater']=$request->heater;
  $data['a_s']=$request->a_s;
  $data['a_l_b_s']=$request->a_l_b_s;
  $data['b_a']=$request->b_a;
  $data['central_locking']=$request->central_locking;
  $data['power_d_locks']=$request->power_d_locks;
  $data['child_s_locks']=$request->child_s_locks;
  $data['a_th_a']=$request->a_th_a;
  $data['no_o_a']=$request->no_o_a;
  $data['driver_air']=$request->driver_air;
  $data['passenger_air']=$request->passenger_air;
  $data['xenon_headlamps']=$request->xenon_headlamps;
  $data['halo_he']=$request->halo_he;
  $data['r_seat_be']=$request->r_seat_be;
  $data['seat_belt_w']=$request->seat_belt_w;
  $data['door_ajar_w']=$request->door_ajar_w;
  $data['adjustable_seat']=$request->adjustable_seat;
  $data['engine_immobilizer']=$request->engine_immobilizer;
  $data['crash_sensor']=$request->crash_sensor;
  $data['c_mounted_f_t']=$request->c_mounted_f_t;
  $data['rear_camera']=$request->rear_camera;
  $data['a_theft_d']=$request->a_theft_d;
  $data['cd_player']=$request->cd_player;
  $data['dvd_player']=$request->dvd_player;
  $data['radio']=$request->radio;
  $data['audio_system_remote']=$request->audio_system_remote;
  $data['speaker_front']=$request->speaker_front;
  $data['speaker_rear']=$request->speaker_rear;
  $data['u_a_a_i']=$request->u_a_a_i;
  $data['bl_c']=$request->bl_c;
  $data['touch_s']=$request->touch_s;
  $data['n_speaker']=$request->n_speaker;
  $data['tachometer']=$request->tachometer;
  $data['el_m_te']=$request->el_m_te;
  $data['lether_seat']=$request->lether_seat;
  $data['l_steering_w']=$request->l_steering_w;
  $data['g_compart']=$request->g_compart;
  $data['digital_clock']=$request->digital_clock;
  $data['cigarate_lighter']=$request->cigarate_lighter;
  $data['disi_odomet']=$request->disi_odomet;
  $data['h_a_d_seat']=$request->h_a_d_seat;
  $data['ventilated_seat']=$request->ventilated_seat;
  $data['dual_tone']=$request->dual_tone;
  $data['fuel_ty']=$request->fuel_ty;
  $data['mileage_c']=$request->mileage_c;
  $data['mileage_a']=$request->mileage_a;
  $data['f_t_capacity']=$request->f_t_capacity;
  $data['top_sp']=$request->top_sp;
  $data['engine_type']=$request->engine_type;
  $data['engine_dis']=$request->engine_dis;
  $data['max_powe']=$request->max_powe;
  $data['max_torque']=$request->max_torque;
  $data['no_of_cy']=$request->no_of_cy;
  $data['va_of_cy']=$request->va_of_cy;
  $data['va_conf']=$request->va_conf;
  $data['fuel_s_sys']=$request->fuel_s_sys;
  $data['turbo_ch']=$request->turbo_ch;
  $data['super_ch']=$request->super_ch;
  $data['trans_ty']=$request->trans_ty;
  $data['gear_b']=$request->gear_b;
  $data['drive_type']=$request->drive_type;
  $data['lenght']=$request->lenght;
  $data['width']=$request->width;
  $data['height']=$request->height;
  $data['g_clear']=$request->g_clear;
  $data['wheel_base']=$request->wheel_base;
  $data['front_tread']=$request->front_tread;
  $data['rear_tread']=$request->rear_tread;
  $data['kerb_weight']=$request->kerb_weight;
  $data['gross_weight']=$request->gross_weight;
  $data['seating_no']=$request->seating_no;
  $data['bootspace_li']=$request->bootspace_li;
  $data['doors_no']=$request->doors_no;
  $data['front_sus']=$request->front_sus;
  $data['rear_sus']=$request->rear_sus;
  $data['steering_type']=$request->steering_type;
  $data['steering_gear_type']=$request->steering_gear_type;
  $data['turning_r']=$request->turning_r;
  $data['front_brake']=$request->front_brake;
  $data['rear_brake']=$request->rear_brake;
  $data['top_speed']=$request->top_speed;
  $data['acceleration_t']=$request->acceleration_t;
  $image = $request->file('car_image');
    if ($image) {
      $image_name=hexdec(uniqid());
      $ext=strtolower($image->getClientOriginalExtension());
      $image_full_name=$image_name.'.'.$ext;
      $upload_path='images/cars/';
      $image_url=$upload_path.$image_full_name;
      $success=$image->move($upload_path,$image_full_name);
      $data['car_image']=$image_url;
      unlink($request->old_photo);
      DB::table('singlecar')->where('id',$id)->update($data);
      $notification=array(
          'message'=>'Data updated Successfully',
          'alert-type'=>'success'
      );
      return redirect()->route('allsinglecar')->with($notification);
    }
    else{
      $data['singlecar']=$request->old_photo;
     DB::table('boverviews')->where('id',$id)->update($data);
     $notification=array(
         'message'=>'Data updated Successfully',
         'alert-type'=>'success'
     );
     return redirect()->route('allsinglecar')->with($notification);
    }

  }

    public function searchcar(Request $request)
    {
      $search = $request->get('search');
      $singlecar = DB::table('singlecar')
      ->join('brands','singlecar.brands_id','brands.id')
      ->join('boverviews','singlecar.car_model_id','boverviews.id')
      ->where('boverviews.car_model','like','%'.$search.'%')->paginate(5);
      return view('backend.singlecar.allsinglecar',compact('singlecar'));
    }



}
