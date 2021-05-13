<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ReviewController extends Controller
{
    public function allreview(Request $request)
    {
      $reviews = DB::table('reviews')
      ->join('singlecar','singlecar.id','reviews.car_id')
      ->select('reviews.*','singlecar.id')
      ->paginate(5);
      return view('backend.reviews.allreviews',compact('reviews'));
    }

    public function reviewdetails($id)
    {
      $singlecar = DB::table('singlecar')
      ->join('brands','singlecar.brands_id','brands.id')
      ->join('boverviews','singlecar.car_model_id','boverviews.id')
      ->select('singlecar.*','brands.name','boverviews.car_model')
      ->where('singlecar.id',$id)
      ->first();
      $reviews = DB::table('reviews')
      ->join('singlecar','singlecar.id','reviews.car_id')
      ->select('reviews.*','singlecar.id')
      ->where('reviews.user_id',$id)
      ->first();
      return view('backend.reviews.showreviews',compact('reviews','singlecar'));
    }

    public function searchreview(Request $request)
    {
      $search = $request->get('search');
      $reviews = DB::table('reviews')
      ->where('name','like','%'.$search.'%')
      ->paginate(5);
      return view('backend.reviews.allreviews',compact('reviews'));
    }
}
