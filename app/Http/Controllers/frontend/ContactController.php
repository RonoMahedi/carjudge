<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
  public function contacts()
  {
    return view('frontend.contacts.contact');
  }
  public function collect(Request $request)
  {
    // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:6|max:13',
            'subject'=>'required',
            'message' => 'required'
         ]);

        //  Store data in database
        Contact::create($request->all());

        //  Send mail to admin
        \Mail::send('frontend.contacts.mail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->to('carjudge7@gmail.com', 'Admin')->subject($request->get('subject'));
        });

        $notification=array(
            'message'=>'We have received your message and would like to thank you for writing to us.',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

  }
