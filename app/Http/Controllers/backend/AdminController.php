<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;



class AdminController extends Controller
{
  public function dashboard()
  {
    $contact=DB::table('contacts')->paginate(5);
    $subscribe=DB::table('subscribe')->paginate(5);
    return view('dashboard',compact('subscribe','contact'));
  }
  public function search(Request $request)
  {
    $search= $request->get('search');
    $subscribe=DB::table('subscribe')->where('name','like','%'.$search.'%')->paginate(10);
    return view('dashboard',compact('subscribe'));
  }

}
