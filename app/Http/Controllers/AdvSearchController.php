<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdvSearchController extends Controller
{
    public function advsearch(Request $request)
    {
      $search = DB::table('singlecar')
      ->join('brands','singlecar.brands_id','brands.id')
      ->join('boverviews','singlecar.car_model_id','boverviews.id')
      ->select('singlecar.*','brands.name','boverviews.car_model')
      ->get();
      return view('advancesearch',compact('search'));
    }

    public function specificsearch(Request $request)
    {

        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');

        $brands = $request->input('brands');

        $body_type = $request->input('body_type');

        $fuel_type = $request->input('fuel_type');


       if (($brands) && ($body_type) && ($fuel_type)) {
         $search = DB::table('singlecar')
         ->join('brands','singlecar.brands_id','brands.id')
         ->join('boverviews','singlecar.car_model_id','boverviews.id')
         ->select('singlecar.*','brands.name','boverviews.car_model')
         ->orwhere('car_price','>=',$min_price)
         ->where('car_price', '<=', $max_price)
         ->whereIn('singlecar.body_type', $body_type)
         ->whereIn('singlecar.fuel_type', $fuel_type)
         ->whereIn('brands.id', $brands)
         ->orderBy('car_price','DESC')
         ->get();
       }else if (($brands) && ($body_type)){
         $search = DB::table('singlecar')
         ->join('brands','singlecar.brands_id','brands.id')
         ->join('boverviews','singlecar.car_model_id','boverviews.id')
         ->select('singlecar.*','brands.name','boverviews.car_model')
         ->orwhere('car_price','>=',$min_price)
         ->where('car_price', '<=', $max_price)
         ->whereIn('singlecar.body_type', $body_type)
         ->whereIn('brands.id', $brands)
         ->orderBy('car_price','DESC')
         ->get();
       }else if (($brands) && ($fuel_type)){
         $search = DB::table('singlecar')
         ->join('brands','singlecar.brands_id','brands.id')
         ->join('boverviews','singlecar.car_model_id','boverviews.id')
         ->select('singlecar.*','brands.name','boverviews.car_model')
         ->orwhere('car_price','>=',$min_price)
         ->where('car_price', '<=', $max_price)
         ->whereIn('singlecar.fuel_type', $fuel_type)
         ->whereIn('brands.id', $brands)
         ->orderBy('car_price','DESC')
         ->get();
       }else if (($body_type) && ($fuel_type)){
         $search = DB::table('singlecar')
         ->join('brands','singlecar.brands_id','brands.id')
         ->join('boverviews','singlecar.car_model_id','boverviews.id')
         ->select('singlecar.*','brands.name','boverviews.car_model')
         ->orwhere('car_price','>=',$min_price)
         ->where('car_price', '<=', $max_price)
         ->whereIn('singlecar.fuel_type', $fuel_type)
         ->whereIn('singlecar.body_type', $body_type)
         ->orderBy('car_price','DESC')
         ->get();
       }else if ($brands) {
         $search = DB::table('singlecar')
         ->join('brands','singlecar.brands_id','brands.id')
         ->join('boverviews','singlecar.car_model_id','boverviews.id')
         ->select('singlecar.*','brands.name','boverviews.car_model')
         ->orwhere('car_price','>=',$min_price)
         ->where('car_price', '<=', $max_price)
         ->whereIn('brands.id', $brands)
         ->orderBy('car_price','DESC')
         ->get();
       }else if ($body_type) {
         $search = DB::table('singlecar')
         ->join('brands','singlecar.brands_id','brands.id')
         ->join('boverviews','singlecar.car_model_id','boverviews.id')
         ->select('singlecar.*','brands.name','boverviews.car_model')
         ->orwhere('car_price','>=',$min_price)
         ->where('car_price', '<=', $max_price)
         ->whereIn('singlecar.body_type', $body_type)
         ->orderBy('car_price','DESC')
         ->get();
       }else if ($fuel_type) {
         $search = DB::table('singlecar')
         ->join('brands','singlecar.brands_id','brands.id')
         ->join('boverviews','singlecar.car_model_id','boverviews.id')
         ->select('singlecar.*','brands.name','boverviews.car_model')
         ->orwhere('car_price','>=',$min_price)
         ->where('car_price', '<=', $max_price)
         ->whereIn('singlecar.fuel_type', $fuel_type)
         ->orderBy('car_price','DESC')
         ->get();
       }else{
         $search = DB::table('singlecar')
         ->join('brands','singlecar.brands_id','brands.id')
         ->join('boverviews','singlecar.car_model_id','boverviews.id')
         ->select('singlecar.*','brands.name','boverviews.car_model')
         ->orwhere('car_price','>=',$min_price)
         ->where('car_price', '<=', $max_price)
         ->orderBy('car_price','DESC')
         ->get();
       }



        return view('advancesearch',compact('search'));
    }

}
