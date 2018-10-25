<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Applicant;
use App\Designation;
use App\ContactPerson;
use App\Interview;
use App\InterviewInfo;
use App\BusinessPartners;
use App\BusinessLocation;
use App\SiteEndorsed;
use App\School;
use App\Intern;
use App\Events\NewApplicant;
use Session;
use Validator;

class EncodersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        
        $url = route('encoder.dt_appIndex');
        return view('encoder.index')->with([
            'url'=>$url,
        ]);
    }


    public function indexAll(){
        $url = route('encoder.dt_appIndexAll');
        return view('encoder.index')->with([
            "url"=>$url,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = School::all();
        $applicant = Applicant::find($id);
        $partners = BusinessPartners::all();
        $site = SiteEndorsed::all();
        $contactPerson = $applicant->contactperson->firstname." ".$applicant->contactperson->lastname;
        return view('encoder.details')->with([
            'applicant'=>$applicant,
            'contactPerson'=>$contactPerson,
            'partners'=>$partners,
            'sites'=>$site,
            'schools'=>$school,
        ]);
    }


    public function editIntern($id){
        $intern = Intern::find($id);
        return view('encoder.intern_details')->with([
            'intern'=>$intern,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        $this->validate($request,[
            'firstname'=>'string',
            'middlename'=>'string',
            'lastname'=>'string',
            'address'=>'string',
            'email'=>'string|email',
            'contact_no'=>'string',
            'birthdate'=>"string",
            "nationality"=>"string",
            "position_applying"=>"string",
            "contact_experience"=>"string",
            "last_year_attended"=>"string",
            "course"=>"string",
            "gender"=>"string",
            "activity"=>"string",
            "marital_status"=>"string",
            "business_partner"=>"string",
            "site_endorsed"=>"string",
            "endorse"=>"string",
            "school_name"=>"string",
            "school_address"=>"string",
            "work_status"=>"string"
        ]);

        $applicant = Applicant::find($id);
        $applicant->work_status = $request->input('work_status');
        $applicant->firstname = $request->input('firstname');
        $applicant->middlename = $request->input('middlename');
        $applicant->lastname = $request->input('lastname');
        $applicant->address = $request->input('address');
        $applicant->email = $request->input('email');
        $applicant->contact_no = $request->input('contact_no');
        $applicant->birthdate = $request->input('birthdate');
        $applicant->nationality = $request->input('nationality');
        $applicant->position_applying = $request->input('position_applying');
        $applicant->contact_experience = $request->input('contact_experience');
        $applicant->last_year_attended = $request->input('last_year_attended');
        $applicant->course = $request->input('course');
        $applicant->gender = $request->input('gender');
        $applicant->activity = $request->input('activity');
        $applicant->marital_status = $request->input('marital_status');
        $applicant->business_partner = $request->input('business_partner');
        $applicant->site_endorsed = $request->input('site_endorsed');
        $applicant->endorse = $request->input('endorse');
        $school_id = School::firstOrCreate([
            'school_name'=>$request->input('school_name'),
            "school_address"=>$request->input('school_address')
        ])->id;

        $applicant->school_id = $school_id;
        $applicant->save();
        event(new NewApplicant());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function internsToday(){
        $url = route('encoder.dt_interns_today');
        return view('encoder.interns')->with([
            'url'=>$url,
        ]);
    }

    public function internsAll(){
        $url = route('encoder.dt_interns_all');
        return view('encoder.interns')->with([
            'url'=>$url,
        ]);
    }

    public function summary(){
        return view('encoder.summary');
    }




    ################################Datatables#################################################################

    public function dt_applicants_index(){
        date_default_timezone_set('Asia/Manila');
        $applicants = Applicant::select(DB::raw('id,series_no,concat(firstname," ",lastname) as full_name,position_applying'))
                    ->where('deleted_at',null)
                    ->whereRaw("created like '".date('Y-m-d')." %'")
                    ->get();
        
        return Datatables::of($applicants)->make();
    }

    public function dt_applicants_indexAll(){
        $applicants = Applicant::select(DB::raw('id,series_no,concat(firstname," ",lastname) as full_name,position_applying'))
                    ->where('deleted_at',null)
                    ->get();
        
        return Datatables::of($applicants)->make();
    }

    public function dt_interns_today(){
        date_default_timezone_set('Asia/Manila');
        $interns = Intern::select(DB::raw("id,concat(firstname,' ',lastname) as full_name, course,ojt_hours"))
                            ->whereRaw("created like '".date("Y-m-d")." %'")
                            ->where('deleted_at',null)
                            ->get();
        return Datatables::of($interns)->make();
    }

    public function dt_interns_all(){
        date_default_timezone_set('Asia/Manila');
        $interns = Intern::select(DB::raw("id,concat(firstname,' ',lastname) as full_name, course,ojt_hours"))
                            ->where('deleted_at',null)
                            ->get();
        return Datatables::of($interns)->make();
    }
}
