<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\ContactPerson;
use App\Interview;
use App\User;
use App\Receptionist;
use App\BusinessPartners;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use PDF;
use DateTime;
use Carbon\Carbon;
use Yajra\Datatables\DataTables;


class ApplicantController extends Controller
{
	
	
    public function index()
    {
        $date = date('Y-m-d');
        
        $applicants = Applicant::whereRaw("created like '".$date." %'" )
                                ->where('work_status','JOB')
                                ->with('contactperson')
                                ->get();

        $applicants_count = Applicant::whereRaw("created like '".$date." %'" )
                                ->where('work_status','JOB')->get()->count();
            
        $applicants_Internal = Applicant::whereRaw("created like '".$date." %'")
                                        ->where('work_status', 'INTERNAL')->get()->count();

        $applicants_Training = Applicant::whereRaw("created like '".$date." %'")
                                        ->where('work_status', 'TRAINING')->get()->count();                
        $business_partner = BusinessPartners::all()->count();
        $admin_user = User::all()->count();

        return view('applicants.index', ['applicants' => $applicants,
                                         'applicants_count' => $applicants_count,
                                         'applicants_Internal' => $applicants_Internal,
                                         'applicants_Training' => $applicants_Training,
                                         'business_partner' => $business_partner,
                                         'admin_user' => $admin_user,]);

    }

       public function count_today()
    {
        $date = date('Y-m-d');

        $applicantsToday = Applicant::whereRaw("created like '".$date." %'" )
                                ->where('work_status','JOB')->get();

        $applicants_countToday = Applicant::whereRaw("created like '".$date." %'" )
                                ->where('work_status','JOB')->get()->count();
            
        $applicants_InternalToday = Applicant::whereRaw("created like '".$date." %'")
                                        ->where('work_status', 'INTERNAL')->get()->count();

        $applicants_TrainingToday = Applicant::whereRaw("created like '".$date." %'")
                                        ->where('work_status', 'TRAINING')->get()->count();                
        $business_partnerToday = BusinessPartners::all()->count();
        $admin_userToday = User::all()->count();

        return view('applicants.today', ['applicantsToday' => $applicantsToday,
                                         'applicants_countToday' => $applicants_countToday,
                                         'applicants_InternalToday' => $applicants_InternalToday,
                                         'applicants_TrainingToday' => $applicants_TrainingToday,
                                         'business_partnerToday' => $business_partnerToday,
                                         'admin_userToday' => $admin_userToday,]);

    }

    public function count_all()
    {
        $date = date('Y-m-d');
        $applicants_all   = Applicant::where(['created' => $date, 'work_status' => 'JOB'])->count();
        return view('applicants.all', ['applicants_all' => $applicants_all]);
        // return view('applicants.all', ['applicants_all' => $applicants_all]);
    }


    public function today()
    {
        $date = date('Y-m-d');

        $applicantsToday = Applicant::whereRaw("created like '".$date." %'" )
                                ->where('work_status','JOB')->get();

        $applicants_countToday = Applicant::whereRaw("created like '".$date." %'" )
                                ->where('work_status','JOB')->get()->count();
            
        $applicants_InternalToday = Applicant::whereRaw("created like '".$date." %'")
                                        ->where('work_status', 'INTERNAL')->get()->count();

        $applicants_TrainingToday = Applicant::whereRaw("created like '".$date." %'")
                                        ->where('work_status', 'TRAINING')->get()->count();                
        $business_partnerToday = BusinessPartners::all()->count();
        $admin_userToday = User::all()->count();

        return view('applicants.today', ['applicantsToday' => $applicantsToday,
                                         'applicants_countToday' => $applicants_countToday,
                                         'applicants_InternalToday' => $applicants_InternalToday,
                                         'applicants_TrainingToday' => $applicants_TrainingToday,
                                         'business_partnerToday' => $business_partnerToday,
                                         'admin_userToday' => $admin_userToday,]);
    }

    public function all()
    {

        $applicants_countAll = Applicant::all()->count();
        $applicants_countAllInternal = Applicant::where(['work_status' => 'INTERNAL'])->count();
        $applicants_countAllTraining = Applicant::where(['work_status' => 'TRAINING'])->count();
        $applicants_countAllJob      = Applicant::where(['work_status' => 'JOB'])->count();

        $business_partnerAll = BusinessPartners::all()->count();
        $admin_userAll = User::all()->count();
        $applicants = Applicant::all();

        return view('applicants.all', ['applicants' => $applicants, 
                                       'applicants_countAll' => $applicants_countAll,
                                       'applicants_countAllInternal' => $applicants_countAllInternal, 
                                       'applicants_countAllTraining' => $applicants_countAllTraining,
                                       'applicants_countAllJob' => $applicants_countAllJob,
                                       'admin_userAll' => $admin_userAll, 
                                       'business_partnerAll' => $business_partnerAll]);  
        
    }

    public function anyData_recept()
	{
		$receptionists = Receptionist::with('recept_contactPerson');
		return Datatables::of($receptionists)->make();
    }
    
    public function anyData()
    {
        date_default_timezone_set("Asia/Manila");
        $date = date('Y-m-d');

        $applicants = Applicant::whereRaw("created like '".$date." %'")
        ->where("deleted_at",null)
        ->with('contactperson')
        ->with('interviewer')
        ->get();

        return Datatables::of($applicants)->make();
    }

    public function anyData_all()
    {

        $applicants = Applicant::with('contactperson')
        ->get();

        return Datatables::of($applicants)->make();
    }

    public function details($id)
    {
    	$applicants = Applicant::find($id);

    	return view('applicants.details', ['applicants' => $applicants]);
    }

   

    public function add()
    {
		date_default_timezone_set('Asia/Manila');
		$now = date('Y-m-d h:i:s');

    	$contactPersons = contactPerson::all();
    	$contactPersons = ContactPerson::orderBy('firstname','asc')->get();
    	return view('recept.add')->with(['contactPersons'=> $contactPersons,'now'=>$now]);
    }

   

    public function insert(Request $request)
    {
    	$this->validate($request,[
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
        
        date_default_timezone_set("Asia/Manila");

    	$receptionistData = $request->all();

    	Applicant::create($receptionistData);
		
		//Add applicant's application to the Interviews Queue
		$interview = new Interview;
		$interview->applicant_no = DB::getPDO()->lastInsertId();
		$interview->interviewer_id = $request->input("contact_id");
		$interview->status = "Pending";
		$interview->save();

    	Session::flash('success_msg', 'Applicant added successfully');

    	return redirect()->route('recept.index');
    }

    public function edit($id)
    {
        try{
    	$applicants = Applicant::find($id);

    	return view('applicants.edit', [
    		'applicants'  => $applicants
        ]);
    }catch(\Exception $e){
    	echo $e;
    }

    }

    public function update($id, Request $request)
    {
        try{
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

    	$applicantData = $request->all();

    	Applicant::find($id)->update($applicantData);

    	Session::flash('success_msg', 'Applicant updated successfully');

        return redirect()->route('applicants.index');
    }catch(\Exception $e){
    	echo $e;
    }
    }

    public function delete($id)
    {
        // Applicant::find($id)->delete();

        // Session::flash('success_msg', 'Applicant deleted successfully!');

        // return redirect()->route('applicants.index');

        $applicants = Applicant::find($id);
        if($applicants->delete()){
            return redirect()->back()->with('message_success', 'Delete Successfully');
        }else{
            return redirect()->back()->with('mesage_success', 'Sorry please try again');
        }
    }

}
