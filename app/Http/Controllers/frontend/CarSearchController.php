<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CarSearchController extends Controller
{
    public function getmodels($id)
  {
    $boverviews = DB::table('boverviews')
    ->where('brands_id',$id)
    ->pluck("car_model","id");
    return json_encode($boverviews);
  }
  public function getyears($id)
  {
    $singlecar = DB::table('singlecar')
    ->where('car_model_id',$id)
    ->pluck("year","id");
    return json_encode($singlecar);
  }

  public function getData($id)
  {
    $singlecar = DB::table('singlecar')
    ->join('brands','singlecar.brands_id','brands.id')
    ->join('boverviews','singlecar.car_model_id','boverviews.id')
    ->select('singlecar.*','brands.name','boverviews.car_model')
    ->where('singlecar.id',$id)
    ->first();
      return view('frontend.cardetails.cardetails',compact('singlecar'));
  }

}
