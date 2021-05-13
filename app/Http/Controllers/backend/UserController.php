<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class UserController extends Controller
{
    public function dashboard(Request $request)
    {
      $users=DB::table('users')->paginate(5);
        return view('backend.user.users',compact('users'));
    }
    public function userssearch(Request $request)
    {
      $userssearch= $request->get('userssearch');
      $users=DB::table('users')->where('full_name','like','%'.$userssearch.'%')->paginate(10);
      return view('backend.user.users',compact('users'));
    }
}
