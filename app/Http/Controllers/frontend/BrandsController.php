<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BrandsController extends Controller
{
    public function brands(Request $request)
    {
      $brands=DB::table('brands')->get();
      return view('frontend.brands.brands',compact('brands'));
    }
}
