<?php

namespace App\Http\Controllers;

use App\Interview;
use App\ContactPerson;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class InterviewController extends Controller
{
    //
    public function index()
    {
    	$interviews = Interview::orderBy('created', 'desc')->get();

    	return view('interview.index')->with('interviews', $interviews);
    }

    public function details($id)
    {
    	$interviews = Interview::find($id);

    	return view('interview.details', ['interviews' => $interviews]);
    }

    public function add()
    {
        $contactPersons = ContactPerson::all();
        $contactPersons = ContactPerson::orderBy('lastname', 'asc')->get();
    	return view('interview.add')->with('contactPersons', $contactPersons);
    }

    public function insert(Request $request)
    {
    	$this->validate($request, [
    		'series_no'               => 'required',
    		'created'				  => 'required',
    		'lastname'                => 'required',
    		'firstname'               => 'required',
    		'middlename'              => 'required',
    		'contact_no'              => 'required', 
    		'position_applying'       => 'required',
    		'contact_id'	          => 'required',
    		'contact_experience'      => 'required',
			'educational_attainment'  => 'required',
			'last_year_attended'      => 'required',
    		'work_status'             => 'required',
    	]);

    	$interviewData = $request->all();

    	Interview::create($interviewData);

    	Session::flash('success_msg', 'Application added successfully');

    	return redirect()->route('interview.index');
    }

    public function edit($id)
    {
         $interviews = Interview::find($id);

         return view('interview.edit', [
			'series_no'               => 'required',
    		'created'				  => 'required',
    		'lastname'                => 'required',
    		'firstname'               => 'required',
    		'middlename'              => 'required',
    		'contact_no'              => 'required', 
    		'position_applying'       => 'required',
    		'contact_id'	          => 'required',
    		'contact_experience'      => 'required',
			'educational_attainment'  => 'required',
			'last_year_attended'      => 'required',
			'work_status'             => 'required',
			'multipleEndorse'		  => 'required',
			'endorse'				  => 'required',
    	]);

         $interviewData = $request->all();

         Interview::find($id)->update($interviewData);

         Session::flash('success_msg', 'Applicant updated successfully');
		 event(new NewApplicant());
         return redirect()->route('interview.index');
    }

    public function delete($id)
    {
    	Interview::find($id)->delete();

    	Session::flash('success_msg', 'Applicant deleted successfully');

    	return redirect()->route('interview.index');
    }
}
