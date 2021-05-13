<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CarDetailsController extends Controller
{
    public function details(Request $request,$id)
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
