<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ColumnSeachingController extends Controller
{
  public function index(Request $request)
  {

     if(request()->ajax())
     {
       dd('ok');

       $data = DB::table('singlecar')
       ->join('brands','singlecar.brands_id','brands.id')
       ->join('boverviews','singlecar.car_model_id', '=', 'boverviews.id')
       ->select('singlecar.id','singlecar.fuel_type','boverviews.car_model','singlecar.car_price')
       ->where('singlecar.id', $request->modelID)
       ->first();

      return datatables()->of($data)->make(true);
     }


     $singlecar = DB::table('singlecar')
     ->join('brands','singlecar.brands_id','brands.id')
     ->join('boverviews','singlecar.car_model_id','boverviews.id')
     ->select('singlecar.*','brands.name','boverviews.car_model')
     ->get();

     return view('column_searching', compact('singlecar'));
    }
}
?>
