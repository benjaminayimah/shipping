<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Newsletter;
use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class messageController extends Controller{

    public function postNewsletter(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
        ]);
        $checkQuery = DB::table('newsletters')->where('email', $request['email'])->first();
        if ($checkQuery){
            return back()->with('status2', 'Status! you have already subscribed to our newsletter. Thank you.');
        }else{
            $newsletter = new Newsletter();
            $newsletter->email = $request['email'];
            $newsletter->save();
            return back()->with('status', 'Success! you are added to our newsletter list');
        }

    }
    public function postFeedback(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'name' => 'required',
            'message' => 'required'
        ]);
        $msg = new Feedback();
        $msg->name = $request['name'];
        $msg->email = $request['email'];
        $msg->message = $request['message'];
        $msg->save();

        $data =[
            'title' => 'Customer feedback',
            'content' => $request['message'],
            'name' => $request['name'],
            'email' => $request['email'],
            'footnote' => 'aflogisticsandmining.com'
        ];
        Mail::send('layouts.mail', $data, function ($msg){
            $msg->to('benjaminayimah@gmail.com', 'Benjamin Ayimah')->subject('New message from website');
        });


        return back()->with('status', 'Success! Thank you for your feedback');
    }
    public function getFeedback(){

        Feedback::where('seen', '1')->update(['seen' => '0']);
        $feed = DB::table('feedback')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.feedback', [
            'feedback' => $feed
        ]);
    }
    public function postDelFeedback(Request $request){

        //checks
        $id = $request['inputId'];
        $del = Feedback::find($id);
        $del->delete();

        return redirect()->back()->with('status', 'deleted');
    }
    public function getAdminQuote(){

        Quote::where('seen', '1')->update(['seen' => '0']);
        $quote = DB::table('quotes')->orderBy('id', 'DESC')->paginate(10);

        return view('admin.adminQuote', [
            'quotes' => $quote
        ]);
    }
    public function postDelQuote(Request $request){

        //checks
        $id = $request['inputId'];
        $del = Quote::find($id);
        $del->delete();

        return redirect()->back()->with('status', 'deleted');
    }

}
