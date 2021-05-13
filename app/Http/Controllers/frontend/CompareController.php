<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class CompareController extends Controller
{

  public function compares(Request $request)
  {
      $boverviews = DB::table('boverviews')->get();
      $singlecar = DB::table('singlecar')
      ->join('brands','singlecar.brands_id','brands.id')
      ->join('boverviews','singlecar.car_model_id','boverviews.id')
      ->select('singlecar.*','brands.name','boverviews.car_model')
      ->get();

    return view('frontend.compares.compare',compact('singlecar','boverviews'));
  }

  public function getyears($id)
  {
    $singlecar = DB::table('singlecar')
    ->where('car_model_id',$id)
    ->pluck("year","singlecar.id");
    return json_encode($singlecar);
  }

  public function getData1($id)
  {
    $boverviews = DB::table('boverviews')->get();
    $singlecar1 = DB::table('singlecar')
    ->join('brands','singlecar.brands_id','brands.id')
    ->join('boverviews','singlecar.car_model_id','boverviews.id')
    ->select('singlecar.*','brands.name','boverviews.car_model')
    ->where('singlecar.id',$id)
    ->first();
      return view('frontend.compares.firstcompare',compact('singlecar1','boverviews'));
  }


  public function getData2($id)
  {
    $boverviews = DB::table('boverviews')->get();
    $singlecar2 = DB::table('singlecar')
    ->join('brands','singlecar.brands_id','brands.id')
    ->join('boverviews','singlecar.car_model_id','boverviews.id')
    ->select('singlecar.*','brands.name','boverviews.car_model')
    ->where('singlecar.id',$id)
    ->first();
      return view('frontend.compares.secondcompare',compact('singlecar2','boverviews'));
  }


public function getAllData1($id1,$id2)
  {
    $boverviews = DB::table('boverviews')->get();
    $singlecar1 = DB::table('singlecar')
    ->join('brands','singlecar.brands_id','brands.id')
    ->join('boverviews','singlecar.car_model_id','boverviews.id')
    ->select('singlecar.*','brands.name','boverviews.car_model')
    ->where('singlecar.id',$id1)
    ->first();
    $singlecar2 = DB::table('singlecar')
    ->join('brands','singlecar.brands_id','brands.id')
    ->join('boverviews','singlecar.car_model_id','boverviews.id')
    ->select('singlecar.*','brands.name','boverviews.car_model')
    ->where('singlecar.id',$id2)
    ->first();
      return view('frontend.compares.finalcompare',compact('singlecar1','singlecar2','boverviews'));
  }

  public function getAllData2($id2,$id1)
    {
      $boverviews = DB::table('boverviews')->get();
      $singlecar2 = DB::table('singlecar')
      ->join('brands','singlecar.brands_id','brands.id')
      ->join('boverviews','singlecar.car_model_id','boverviews.id')
      ->select('singlecar.*','brands.name','boverviews.car_model')
      ->where('singlecar.id',$id2)
      ->first();
      $singlecar1 = DB::table('singlecar')
      ->join('brands','singlecar.brands_id','brands.id')
      ->join('boverviews','singlecar.car_model_id','boverviews.id')
      ->select('singlecar.*','brands.name','boverviews.car_model')
      ->where('singlecar.id',$id1)
      ->first();
        return view('frontend.compares.finalcompare',compact('singlecar2','singlecar1','boverviews'));
    }


}
