<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{

  public function userRegistration()
  {
    return view('frontend.users.userregister');
  }
  public function processRegister(Request $request)
  {
    $request->validate([
     'full_name' => 'required',
     'email' => 'required|email|unique:users,email',
     'mobile_number' => 'required|min:6|max:13|regex:/^([0-9\s\-\+\(\)]*)$/|unique:users,mobile_number',
     'password' => 'required|min:8|confirmed'
 ],[
   'full_name.required' => 'We need to know your full name!'
 ]);

  $data =[
    'full_name'  =>$request->input('full_name'),
    'email'  =>strtolower($request->input('email')),
    'mobile_number' =>$request->input('mobile_number'),
    'password' => bcrypt($request->input('password')),
];

  try{
     DB::table('users')->insert($data);
     $this->setSuccessMessage('User account created');
     return redirect()->route('userloginpage');

  } catch(Exception $e){
    $this->setErrorMessage($e->getMessage());
    return redirect()->back();
  }
    //return $request->all();
  }

  public function userLogin()
  {
      return view('frontend.users.userlogin');
  }
  public function processLogin(Request $request)
  {
    $request->validate([
     'email' => 'required|email',
     'password' => 'required|min:8'
  ]);
    $credentials = $request->except(['_token']);

    if(auth()->attempt($credentials)){
      $this->setSuccessMessage('Successfully Logged In');
      return redirect()->route('profile');
    }else{
      $this->setErrorMessage('Invalid Credentials.');
      return redirect()->back();
    }
  }


  public function logout()
  {
      auth()->logout();
      $this->setSuccessMessage('Logged out Successfully');
      $brands=DB::table('brands')->get();
      $singlecar = DB::table('singlecar')
      ->join('brands','singlecar.brands_id','brands.id')
      ->join('boverviews','singlecar.car_model_id','boverviews.id')
      ->select('singlecar.*','brands.name','boverviews.car_model')
      ->get();
      return view('welcome',compact('singlecar','brands'));
  }
}
