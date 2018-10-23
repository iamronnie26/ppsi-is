<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ApplicantQueued;


class SampleQueueing extends Controller
{
    

	public function index(){
		return view('testing.display');
	}

	public function send(Request $request){
		$message = $request->input('input');
		event(new ApplicantQueued($message));
		return $message;
	}

    public function dashboard(){
    	return view('testing.sample');
    }
}
