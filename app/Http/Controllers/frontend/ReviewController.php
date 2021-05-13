<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ReviewController extends Controller
{
  public function reviews()
  {
    $singlecar = DB::table('singlecar')
    ->join('brands','singlecar.brands_id','brands.id')
    ->join('boverviews','singlecar.car_model_id','boverviews.id')
    ->select('singlecar.*','brands.name','boverviews.car_model')
    ->paginate(8);
    $reviews = DB::table('reviews')
    ->join('singlecar','singlecar.id','reviews.car_id')
    ->select('reviews.*','singlecar.id')
    ->paginate(8);
   return view('frontend.reviews.allreview',compact('reviews','singlecar'));
  }


  public function postreviews($id)
  {
    $singlecar = DB::table('singlecar')
    ->join('brands','singlecar.brands_id','brands.id')
    ->join('boverviews','singlecar.car_model_id','boverviews.id')
    ->select('singlecar.*','brands.name','boverviews.car_model')
    ->where('singlecar.id',$id)
    ->first();
    return view('frontend.reviews.review',compact('singlecar'));
  }


  public function process(Request $request)
  {
    $validatedData = $request->validate([
      'type' => 'required',
      'orating' => 'required',
      'crating' => 'required',
      'irating' => 'required',
      'prating' => 'required',
      'mrating' => 'required',
      'heading' => 'required',
      'message' => 'required',
      'name' => 'required',
      'city' => 'required',
      'email' => 'required|email'
    ]);
    $data=array();
    $data['car_id']=$request->car_id;
    $data['type']=$request->type;
    $data['orating']=$request->orating;
    $data['crating']=$request->crating;
    $data['irating']=$request->irating;
    $data['prating']=$request->prating;
    $data['mrating']=$request->mrating;
    $data['rrating']=$request->rrating;
    $data['heading']=$request->heading;
    $data['message']=$request->message;
    $data['name']=$request->name;
    $data['city']=$request->city;
    $data['email']=$request->email;


      $reviews = DB::table('reviews')->insert($data);
      if($reviews){
        $notification=array(
            'message'=>'Successfully inserted data',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
      }else{
        $notification=array(
            'message'=>'Please fill out all form!',
            'alert-type'=>'warning'
        );
        return redirect()->back()->with($notification);
      }

  }

  public function showreviews($id)
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
    ->where('reviews.car_id',$id)
    ->paginate(5);
    return view('frontend.reviews.showreview',compact('reviews','singlecar'));
  }

  public function individualreviews($id)
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
    return view('frontend.reviews.individualreviews',compact('reviews','singlecar'));
  }


  public function searchcar(Request $request)
  {
    $search = $request->get('search');
    $singlecar = DB::table('singlecar')
    ->join('brands','singlecar.brands_id','brands.id')
    ->join('boverviews','singlecar.car_model_id','boverviews.id')
    ->where('boverviews.car_model','like','%'.$search.'%')->paginate(6);
    return view('frontend.reviews.allreview',compact('singlecar'));
  }

}
