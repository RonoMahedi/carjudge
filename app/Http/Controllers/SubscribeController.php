<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SubscribeController extends Controller
{
    public function subscribe(Request $request)
    {
      $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email'
    ]);
    $data=array();
    $data['name']=$request->name;
    $data['email']=$request->email;
    $subscribe = DB::table('subscribe')->insert($data);
    if($subscribe){
      $notification=array(
          'message'=>'Successfully Subscribed',
          'alert-type'=>'success'
      );
      return redirect()->back()->with($notification);
    }else{
      $notification=array(
          'message'=>'Not Subscribed',
          'alert-type'=>'error'
      );
      return redirect()->back()->with($notification);
    }
}

}
