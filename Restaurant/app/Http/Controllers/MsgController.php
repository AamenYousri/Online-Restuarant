<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MsgController extends Controller
{
    function add(Request $request){

       
  
        $msg = new Message;

        $msg->name = $request->name;
        $msg->email = $request->email;
        $msg->subject = $request->subject;
        $msg->mesg = $request->message;

        $msg->save();

        return redirect('/contactus')->with('status', 'Feedback has been sent');


    }


    function show() {

        $messages = Message::orderBy('id', 'desc')->paginate(50);
        return view('messages', compact('messages'));
    }
}
