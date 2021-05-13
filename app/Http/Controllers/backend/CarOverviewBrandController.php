<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CarOverviewBrandController extends Controller
{
  public function addcar()
  {
    $brands=DB::table('brands')->get();
    return view('backend.carsoverview.addbrandcars',compact('brands'));
  }

  public function storecar(Request $request)
  {
    $validatedData = $request->validate([
      'car_model'=>'required|unique:boverviews,car_model|max:100'
    ]);
    $data=array();
    $data['brands_id']=$request->brands_id;
    $data['car_model']=$request->car_model;


        DB::table('boverviews')->insert($data);
        $notification=array(
            'message'=>'Successfully inserted data',
            'alert-type'=>'success'
        );
        return redirect()->route('allcaroverview')->with($notification);
   }


  public function allcar()
  {
    $boverviews=DB::table('boverviews')->join('brands','boverviews.brands_id','brands.id')
              ->select('boverviews.*','brands.name')
              ->paginate(5);
          return view('backend.carsoverview.allcarsoverviews',compact('boverviews'));
  }

  public function deletecar($id)
       {
         $boverviews=DB::table('boverviews')->where('id',$id)->first();

         $delete=DB::table('boverviews')->where('id',$id)->delete();
         if ($delete) {
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
    $boverviews=DB::table('boverviews')->where('id',$id)->first();
    return view('backend.carsoverview.editbrandcars',compact('brands','boverviews'));
  }

  public function updatecar(Request $request,$id){
    $validatedData = $request->validate([
      'car_model'=>'unique:boverviews,car_model|max:100'
    ]);

    $data=array();
    $data['brands_id']=$request->brands_id;
    $data['car_model']=$request->car_model;


    DB::table('boverviews')->where('id',$id)->update($data);
       $notification=array(
           'message'=>'Data updated Successfully',
           'alert-type'=>'success'
       );
       return redirect()->route('allcaroverview')->with($notification);
  }

  public function search(Request $request)
  {
          $search = $request->get('search');
          $boverviews=DB::table('boverviews')
          ->join('brands','boverviews.brands_id','brands.id')
          ->where('car_model','like','%'.$search.'%')->paginate(5);
          return view('backend.carsoverview.allcarsoverviews',compact('boverviews'));
  }

}
