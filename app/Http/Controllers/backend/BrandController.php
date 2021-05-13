<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BrandController extends Controller
{
  public function add()
  {
    return view('backend.brands.addbrandcars');
  }
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name'=>'bail|required|unique:brands|max:15',
      'image'=>'required|mimes:png,PNG|max:1000'
    ]);
    $data=array();
    $data['name']=$request->name;
    $image = $request->file('image');
      if ($image) {
        $image_name=hexdec(uniqid());
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='images/brand/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        DB::table('brands')->insert($data);
        $notification=array(
            'message'=>'Successfully inserted data',
            'alert-type'=>'success'
        );
        return redirect()->route('brands.show')->with($notification);

      }
      else{
        $notification=array(
          'message'=>'Successfully inserted data',
          'alert-type'=>'success'
        );
        return redirect()->route('brands.show')->with($notification);
      }
 }
       public function show()
       {
         $brands=DB::table('brands')->paginate(5);
         return view('backend.brands.showbrandcars',compact('brands'));
       }
       public function delete($id)
       {
         $brands=DB::table('brands')->where('id',$id)->first();
         $image=$brands->image;

         $delete=DB::table('brands')->where('id',$id)->delete();
         if ($delete) {
           unlink($image);
           $notification=array(
             'message'=>'Successfully Deleted!',
             'alert-type'=>'success'
           );
           return redirect()->back()->with($notification);
         }else{
           $notification=array(
             'message'=>'Something wrong!',
             'alert-type'=>'error'
           );
           return redirect()->back()->with($notification);
         }
       }
       public function edit($id)
       {
         $brands=DB::table('brands')->where('id',$id)->first();
         return view('backend.brands.editbrandcars',compact('brands'));
       }
       public function update(Request $request,$id)
       {
         $validatedData = $request->validate([
           'name'=>'max:15',
           'image'=>'mimes:png,PNG|max:1000'
         ]);
         $data=array();
         $data['name']=$request->name;
         $image = $request->file('image');
           if ($image) {
             $image_name=hexdec(uniqid());
             $ext=strtolower($image->getClientOriginalExtension());
             $image_full_name=$image_name.'.'.$ext;
             $upload_path='images/brand/';
             $image_url=$upload_path.$image_full_name;
             $success=$image->move($upload_path,$image_full_name);
             $data['image']=$image_url;
             unlink($request->old_photo);
             DB::table('brands')->where('id',$id)->update($data);
             $notification=array(
               'message'=>'Successfully edited data!',
               'alert-type'=>'success'
             );
             return redirect()->route('brands.show')->with($notification);
       }else{
             $data['image']=$request->old_photo;
             DB::table('brands')->where('id',$id)->update($data);
             $notification=array(
               'message'=>'Successfully edited data!',
               'alert-type'=>'success'
             );
             return redirect()->route('brands.show')->with($notification);
           }
       }

       public function search(Request $request)
       {
         $search= $request->get('search');
         $brands=DB::table('brands')->where('name','like','%'.$search.'%')->paginate(5);
         return view('backend.brands.showbrandcars',compact('brands'));
       }
}
