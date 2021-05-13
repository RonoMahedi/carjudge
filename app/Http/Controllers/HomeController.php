<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\savedCar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index()
     {
       $brands = DB::table('brands')->get();
       $singlecar = DB::table('singlecar')
       ->join('brands','singlecar.brands_id','brands.id')
       ->join('boverviews','singlecar.car_model_id','boverviews.id')
       ->select('singlecar.*','brands.name','boverviews.car_model')
       ->paginate(6);
       return view('home',compact('brands','singlecar'))->with('success','Welcome');
     }


public function savecar(Request $request)
{
  $savedCar = new savedCar;
  $savedCar->user_id = Auth::user()->id;
  $savedCar->car_id = $request->id;

  $savedCar->save();
  return redirect()->back();
}

public function savecarlist(Request $request)
{
  $savedata = DB::table('savedcars')
    ->leftJoin('users','savedcars.user_id','users.id')
    ->leftJoin('singlecar','savedcars.car_id','singlecar.id')
    ->leftJoin('brands','singlecar.brands_id','brands.id')
    ->leftJoin('boverviews','singlecar.car_model_id','boverviews.id')
    ->where('savedcars.user_id','=',Auth::user()->id)
    ->select('savedcars.id','car_id','singlecar.id','car_image','brands.name','car_model','car_price','body_type','transmission','fuel_type','year','engine','seat')
    ->paginate(5);
  return view('frontend.savedcars.savecar',compact('savedata'));
}

public function savecardelete(Request $request,$id)
{
  $delete=DB::table('savedcars')->where('car_id',$id)->delete();
  if ($delete) {
    $notification=array(
        'message'=>'Remove Successfully',
        'alert-type'=>'success'
    );
    return redirect()->back()->with($notification);

      }else{
        $notification=array(
            'message'=>'Something wrong -_-',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
      }
}



public function profile($id)
{
   $user = User::find($id);
   return view('frontend.users.profile')->withUser($user);
}

public function EditProfile($id)
{
  $user = User::find($id);
  return view('frontend.users.editprofile')->withUser($user);
}

public function passchange(Request $request)
{
  if(Auth::user()){
    $user = User::find(Auth::user()->id);
    if($user)
    {
      return view('frontend.users.changepass')->withUser($user);
    }else{
      return redirect()->back();
    }

  }else{
    return redirect()->back();
  }

}

public function updatepass(Request $request)
{
    $user = User::find(Auth::user()->id);
    if($user){
      if(Hash::check($request['oldpassword'], $user->password)){

        $user->password = Hash::make($request['password']);
        $user->save();
        $notification=array(
            'message'=>'The entered does not match Your current password',
            'alert-type'=>'error'
        );
        return view('frontend.users.profile',compact('user'))->with($notification);
      }else{
        $notification=array(
            'message'=>'The entered does not match Your current password',
            'alert-type'=>'error'
        );
      return redirect()->back()->with($notification);
      }
    }else{
          return redirect()->back();
    }
}



public function updateProfile(Request $request)
{
  $user = User::find(Auth::user()->id);
  if($user)
  {
    $validate = $request->validate([
        'name' => 'max:100',
        'email' => 'string|email',
        'phone' => 'min:11|max:13'
     ]);

    $user->name = $request['name'];
    $user->email = $request['email'];
    $user->phone = $request['phone'];

    $user->save();
    $notification=array(
        'message'=>'Profile Updated Successfully',
        'alert-type'=>'success'
    );
    return view('frontend.users.profile',compact('user'))->with($notification);
    }else{
      return redirect()->back();
  }
}






}
