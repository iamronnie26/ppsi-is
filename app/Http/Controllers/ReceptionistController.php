<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use App\BusinessPartners;
use App\Interview;
use App\Intern;
use App\Endorsement;
use App\Receptionist;
use App\ContactPerson;
use App\BusinessPartner;
use App\Events\NewApplicant;
use Session;
use PDF;
use DB;
use Yajra\Datatables\DataTables;

class ReceptionistController extends Controller
{
	

	public function __construct(){
		$this->middleware('auth');
		date_default_timezone_set('Asia/Manila');
	}

	public function summary(){
		$applicants = Receptionist::whereRaw("created like '".date('Y-m-d')." %'")
								  ->where('deleted_at',null)->get();

		$internals = Receptionist::whereRaw("created like '".date('Y-m-d')." %'")
								  ->where("deleted_at", null)->get();

		$trainings = Receptionist::whereRaw("created like'".date('Y-m-d')." %'")
								  ->where("deleted_at", null)->get();

		$activeFiles = Receptionist::whereRaw("created like '".date('Y-m-d')." %'")
								 ->where("deleted_at",null)->get();
		
		$reEndorses = Receptionist::whereRaw("created like '".date('Y-m-d')." %'")
								->where("deleted_at",null)->get();

		$interns = Intern::whereRaw("created like '".date('Y-m-d')." %'")
						 ->where('deleted_at',null)->get();

		//Business Partners;
		$singleEndorses = Receptionist::whereRaw("created like '".date('Y-m-d')." %'")
										->where("deleted_at", null)
										->where(['endorsement_status' => 'Single Endorsement'])
										->get();
		
		$multipleEndorses = Receptionist::whereRaw("created like '".date('Y-m-d')." %'")
										->where("deleted_at", null)
										->where(['endorsement_status' => 'Multiple Endorsement'])
										->get();
						 
		$partialTotalMonthly = Receptionist::where("deleted_at",null)
												->where('recept_status','<>','Active File')
												->whereRaw("created like '".date("Y-m")."-%'")
												->get()
												->count();
		//Initialize empty collections
		$applicantsContact_ids = collect([]);
		$internalContact_ids = collect([]);
		$trainingsContact_ids = collect([]);
		$activeFileContact_ids = collect([]);
		$reEndorseContact_ids = collect([]);
		$singleEndorseContact_ids = collect([]);
		$multipleEndorseContact_ids = collect([]);
		
		$internsContact_ids = collect([]);

		$applicantShowups = collect([]);
		$trainingShowups  = collect([]);
		$internalShowups = collect([]);
		$activeFileShowups = collect([]);
		$reEndorse = collect([]);
		$singlEndorse = collect([]);
		$multipleEndorse = collect([]);
		$applicantsMultipleEndorse = collect([]);

		$internShowups = collect([]);

		$totalShowups = 0;
		$totalTraining = 0;
		$totalInternal = 0;
		$totalActiveFile = 0;
		$totalReEndorse = 0;
		$totalSingleEndorse = 0;
		$totalMultipleEndorse = 0;
		$singleCompanyEndorsements = [];
		$multipleCompanyEndorsements = [];
		$showupMultipleEndorse = null;

		//Loop for applicants contact IDs
		foreach($applicants as $applicant) $applicantsContact_ids->push($applicant->contact_id);

		//Loop for Interns contact Ids
		foreach($interns as $intern) $internsContact_ids->push($intern->contact_id);

		//Loop for Training contact IDS
		foreach($trainings as $training) $trainingsContact_ids->push($training->contact_id);

		//Loop for Active File contact IDS
		foreach($activeFiles as $activeFile) $activeFileContact_ids->push($activeFile->contact_id);

		//Loop for Re Endorse contact IDS
		foreach($reEndorses as $reEndorse) $reEndorseContact_ids->push($reEndorse->contact_id);

		//Loop for Single Endorse contact IDS
		foreach($singleEndorses as $singleEndorse) $singleEndorseContact_ids->push($singleEndorse->contact_id);

		//Loop for Multiple Endorse contact IDS
		foreach($multipleEndorses as $multipleEndorse) $multipleEndorseContact_ids->push($multipleEndorse->contact_id);

		//Loop for Internal contact IDS
		foreach($internals as $internal) $internalContact_ids->push($internal->contact_id);

		//filter the collection with unique values
		$applicantsContact_ids = $applicantsContact_ids->unique();
		$internsContact_ids =$internsContact_ids->unique();
		$internalContact_ids = $internalContact_ids->unique();
		$trainingsContact_ids = $trainingsContact_ids->unique();
		$activeFileContact_ids = $activeFileContact_ids->unique();
		$singleEndorseContact_ids = $singleEndorseContact_ids->unique();
		$multipleEndorseContact_ids = $multipleEndorseContact_ids->unique();


		//Loop for collecting applicants report
		foreach($applicantsContact_ids as $contact_id){
			$applicantEndorsements = [];
			$contact = ContactPerson::find($contact_id);
			$todays = Receptionist::where("contact_id",$contact_id)
									->whereRaw("created like '".date("Y-m-d")." %'")
									->where(['work_status' => 'JOB'])
									->where('deleted_at',null)
									->get()
									->count();

			$todaysTraining = Receptionist::where("contact_id", $contact_id)
									->whereRaw("created like '".date("Y-m-d")." %'")
									->where('work_status','TRAINING')
									->where('deleted_at', null)
									->get()
									->count();

			$todaysInternal = Receptionist::where("contact_id", $contact_id)
									->whereRaw("created like '".date("Y-m-d")." %'")
									->where(['work_status'=>'INTERNAL'])
									->where('deleted_at', null)
									->get()
									->count();

			$todaysactiveFile = Receptionist::where("contact_id", $contact_id)
									->whereRaw("created like '".date("Y-m-d")." %'")
									->where(['recept_status'=>'Active File'])
									->where('deleted_at',null)
									->get()
									->count();
			$todaysReEndorse = Receptionist::where("contact_id" , $contact_id)
									->where(['recept_status' => 'Re Endorse'])
									->where('deleted_at',null)
									->get()
									->count();
			
			$todaySingleEndorse = Receptionist::where("contact_id", $contact_id)
									->whereRaw("created like '".date('Y-m-d')." %'")
									->where(['endorsement_status' => 'SINGLE'])
									->where('deleted_at',null)
									->get()
									->count();
									
									
			$todayMultipleEndorse = Receptionist::where("contact_id", $contact_id)
			->whereRaw("created like '".date('Y-m-d')." %'")
			->where(['endorsement_status' => 'MULTIPLE'])
			->where('deleted_at',null)
			->get()
			->count();

			$showupSingleEndorse = Receptionist::where("contact_id", $contact_id)
									->whereRaw("created like '".date('Y-m-d')." %'")
									->where(['endorsement_status' => 'SINGLE'])
									->where('deleted_at',null)
									->get();
			
				foreach($showupSingleEndorse as $applicant){
					array_push($singleCompanyEndorsements,$applicant->endorsements[0]->businesspartner->company_name);
				}
			
			
			$showupMultipleEndorse = Receptionist::where("contact_id", $contact_id)
									->whereRaw("created like '".date('Y-m-d')." %'")
									->where(['endorsement_status' => 'MULTIPLE'])
									->where('deleted_at',null)
									->with('endorsements.businesspartner')
									->get();
									$applicantBusinessPartners = "";
									
									foreach($showupMultipleEndorse as $applicant){
										$endorsements = $applicant->endorsements;
										$c = [];
										foreach($endorsements as $endorsement){
											array_push($c,$endorsement->businesspartner->company_name);
											sort($c);
										}
										$applicantBusinessPartners = implode(',',$c);
										array_push($multipleCompanyEndorsements,$applicantBusinessPartners);
				}
				
			

			$todaysIntern  = Intern::where("contact_id", $contact_id)
									->whereRaw("created like '".date('Y-m-d')." %'")
									->where('deleted_at', null)
									->get()
									->count();
			
			$totalTraining+=$todaysTraining;
			$totalInternal+=$todaysInternal;
			$totalActiveFile+=$todaysactiveFile;
			$totalReEndorse+=$todaysReEndorse;
			$totalShowups+=$todays;
			$totalSingleEndorse +=$todaySingleEndorse;
			$totalMultipleEndorse +=$todayMultipleEndorse;
			//$totalInterns+=$todaysIntern;

			$contact_name = $contact->firstname." ".$contact->lastname;
			$applicantShowups->push(["name"=>$contact_name , 
									 "showups"=>$todays,
									 "trainings"=>$todaysTraining, 
									 "internals"=>$todaysInternal, 
									 'activeFiles'=>$todaysactiveFile, 
									 'reEndorses'=>$todaysReEndorse,
									 'singleEndorses' => $todaySingleEndorse,
									 'interns' => $todaysIntern]);
			
			 $applicantsMultipleEndorse->push($showupMultipleEndorse);
			 $applicantEndorsements = [];
		}

		
		//Loop for collecting interns report
		foreach($internsContact_ids as $contact_id){
			$contact = ContactPerson::find($contact_id);
			$todays = Intern::where("contact_id",$contact_id)
									->whereRaw("created like '".date("Y-m-d")." %'")
									->where('deleted_at',null)
									->get()
									->count();
			// $totalShowups+=$todays;
			$contact_name = $contact->firstname." ".$contact->lastname;
			$internShowups->push(["name"=>$contact_name,"showups"=>$todays]);
		}

			
		$todaysTotalShowups = $totalShowups;
		$todaysTraining = $totalTraining;
		$todaysInternal = $totalInternal;
		$todaysReEndorse = $totalReEndorse;
		$todaysActiveFile = $totalActiveFile;
		$todaysSingleEndorse = $totalSingleEndorse;
		$todaysMultipleEndorse = $totalMultipleEndorse;
		$singleCompanyEndorsements = array_count_values($singleCompanyEndorsements);
		$multipleCompanyEndorsements = array_count_values($multipleCompanyEndorsements);

		$totalInterns = Intern::where(['deleted_at'=> null])
		->whereRaw("created like '".date('Y-m-d')." %'")
		->count();

		$grandTotal = $todaysTotalShowups + $todaysTraining + $todaysInternal + $todaysReEndorse + $todaysActiveFile + $totalInterns;
			//return dd($applicantsMultipleEndorse);
		return view('recept.summary')->with([
			"showupMultipleEndorse"=>$applicantsMultipleEndorse,
			"applicants"=>$applicantShowups,
			"trainings"=>$trainingShowups,
			"interns"=>$internShowups,
			"todaysTotalShowups"=>$todaysTotalShowups,
			"todaysTraining"=>$todaysTraining,
			"todaysInternal"=>$todaysInternal,
			"todaysActiveFile"=>$todaysActiveFile,
			"todaysReEndorse"=>$todaysReEndorse,
			"todaysSingleEndorse"=>$totalSingleEndorse,
			"totalMultipleEndorse"=>$todaysMultipleEndorse,
			"businessPartnerSingle"=>$singleCompanyEndorsements,
			"businessPartnerMultiple"=>$multipleCompanyEndorsements,
			"totalInterns"=>$totalInterns,
			"partialMonthlyTotal"=>$partialTotalMonthly,
			"grandTotal"=>$grandTotal
			]);
	}

	public function weeklyReport(){
		date_default_timezone_set('Asia/Manila');
		$contactPerson = ContactPerson::where('deleted_at',null)->get();
		$partialTotalMonthly = Receptionist::where("deleted_at",null)
												->where('work_status','JOB')
												->whereRaw("created like '".date("Y-m")."-%'")
												->get()
												->count();
		$report = collect([]);
		$total = 0; 
		foreach($contactPerson as $c){
			$weekly = collect([]);
			$name = $c["firstname"]." ".$c["lastname"];

			for($i=6;$i>=0;$i--){
				$contact = ContactPerson::find($c['id']);
				$str ="-".$i." day";
				$date = strtotime($str, strtotime(date("Y-m-d")));
				$date = date("Y-m-d",$date);
				$todays = Receptionist::where("contact_id",$c['id'])
						->whereRaw("created like '".$date." %'")
						->where('work_status','JOB')
						->where('deleted_at',null)
						->get()
						->count();
				// $todays += Intern::where("contact_id",$c['id'])->whereRaw("created like '".date("Y-m-d")." %'")->where('deleted_at',null)->get()->count();
				
				$date1 = date("D",strtotime($date));

				if($date1 !== "Sun" && $date1 !== "Sat"){
					$total+=$todays;
					$date = date("M d",strtotime($date));
					$weekly->push(["date"=>$date,"showups"=>$todays]);
				}
			}

			$report->push(["name"=>$name,"weekly"=>$weekly]);
		}

		return view('recept.weekly')->with([
			"reports"=>$report,
			"totalShowups"=>$total,
			"partialMonthlyTotal" =>$partialTotalMonthly,
		]);
	}

	public function monthlyReport(){
		date_default_timezone_set('Asia/Manila');
		$contactpersons = ContactPerson::all();
		$report = collect([]);
		$monthlyTotal = 0;

			$weeklyRep = collect();
			$weekstart = 1;
			$weekend = 6;
			for($j=1;$j<=5;$j++){
				$weekly = 0;
				for($i=$weekstart;$i<=$weekend;$i++){
					$date = date("Y-m-").sprintf("%02d",$i);
					$date = date("Y-m-d",strtotime($date));	
					$daily = Receptionist::where('deleted_at',null)
					->where('work_status','JOB')
					->whereRaw("created like '".$date." %'")
					->get()
					->count();
					$weekly +=$daily;
				}
				$week = date("M",strtotime($date))." ".$weekstart." - ".$weekend;
				$weeklyRep->push($weekly);

				$weekstart += 7;
				$weekend += 7;
				$currentMonth = date("F",strtotime($date));
				$last = date("d",strtotime("last day of ".$currentMonth));
				if($weekend >=31){
					$weekend = $last;
				}
			}
		

		foreach($contactpersons as $contactperson){
			$monthly = 0;
			$name = $contactperson->firstname." ".$contactperson->lastname;
			$date = 0;
			$weeklyreport = [];
			$weekstart = 1;
			$weekend = 6;
			for($j=1;$j<=5;$j++){
				$weekly = 0;
				for($i=$weekstart;$i<=$weekend;$i++){
					$date = date("Y-m-").sprintf("%02d",$i);
					$date = date("Y-m-d",strtotime($date));	
					$daily = Receptionist::where("contact_id", $contactperson->id)
					->where('deleted_at',null)
					->where('work_status','JOB')
					->whereRaw("created like '".$date." %'")
					->get()
					->count();
					$weekly +=$daily;
				}
				$week = date("M",strtotime($date))." ".$weekstart." - ".$weekend;
				array_push($weeklyreport,[
					$week=>$weekly
				]);

				$weekstart += 7;
				$weekend += 7;
				$currentMonth = date("F",strtotime($date));
				$last = date("d",strtotime("last day of ".$currentMonth));
				if($weekend >=31){
					$weekend = $last;
				}
				$monthly+=$weekly;
			}	 
			$report->push([
				"name"=>$name,
				"weekly" =>$weeklyreport,
				"total"=>$monthly,
			]);
			$monthlyTotal+=$monthly;
		}

		$businesspartners = BusinessPartner::orderBy('company_name','asc')->get();
		$business_report = collect();
		
		foreach($businesspartners as $businesspartner){
			$showup_per_company = 0;
			$totalShowup = 0;
			$bp_showup = collect();
			$company_name =  $businesspartner->company_name;
			foreach($contactpersons as $contactperson){

				$cp_name =  $contactperson->firstname." ".$contactperson->lastname;
				$totalShowup = $contactperson->applicants()->where('business_partner',$businesspartner->id)->count();
				$showup_per_company +=$totalShowup;
				if($totalShowup > 0){
					$bp_showup->push([
						"name"=>$cp_name,
						"total_showups"=>$totalShowup,
					]);
				}
			}

			if($showup_per_company > 0){
				$business_report->push([
					"company_name"=>$company_name,
					"showups"=>$bp_showup
				]);
			}
		}

			return view("recept.monthly")->with([
				"weeklyRep"=>$weeklyRep,
				"monthlyTotal"=>$monthlyTotal,
				"reports"=>$report,
				"business_partners"=>$business_report,
			]);
}

protected function businessPartnerMonthly(){

}

    public function index()
    {
		$date = date('Y-m-d');
        $receptionist = Receptionist::where('created', $date)->get();
		//return view('recept.index', ['receptionist' => $receptionist]);	
		
	}

	public function count()
	{ 
		$date = date('Y-m-d');
		$recept_countApplicant  = Receptionist::whereRaw("created like '".$date." %'")->count();
		$recept_onProgress      = Receptionist::where('remarks', 'OnProgress')->count();
		$recept_onInterview     = Receptionist::where('remarks', 'OnInterview')->count();
		$recept_passedInterview = Interview::where('status', 'Transferred')->count();

		return view('recept.index')->with(['recept_countApplicant'  => $recept_countApplicant, 
										   'recept_onProgress'      => $recept_onProgress, 
										   'recept_onInterview'     => $recept_onInterview,
										   'recept_passedInterview' => $recept_passedInterview]);
	}

	public function count_recept()
	{ 
		$date = date('Y-m-d');
		$recept_countApplicant  = Receptionist::whereRaw("created like '".$date." %'")->count();
		$recept_onProgress      = Receptionist::where('remarks', 'OnProgress')->count();
		$recept_onInterview     = Receptionist::where('remarks', 'OnInterview')->count();
		$recept_passedInterview = Interview::where('status', 'Transferred')->count();

		return view('recept.index')->with(['recept_countApplicant'  => $recept_countApplicant, 
										   'recept_onProgress'      => $recept_onProgress, 
										   'recept_onInterview'     => $recept_onInterview,
										   'recept_passedInterview' => $recept_passedInterview]);
	}

	public function count_receptToday()
	{ 
		$date = date('Y-m-d');
		$recept_countApplicantToday  = Receptionist::whereRaw("created like '".$date." %'")->count();

		$recept_countInternalToday   = Receptionist::whereRaw("created like '".$date." %'")
													->where(['work_status' => 'INTERNAL'])->count();

		$recept_countTrainingToday   = Receptionist::whereRaw("created like '".$date." %'")
													->where(['work_status' => 'TRAINING'])->count();

		$recept_countJobToday		 = Receptionist::whereRaw("created like '".$date." %'")
													->where(['work_status' => 'JOB'])->count();

		$recept_onProgressToday      = Receptionist::where('remarks', 'OnProgress')->count();
		$recept_onInterviewToday     = Receptionist::where('remarks', 'OnInterview')->count();
		$recept_passedInterviewToday = Interview::where('status', 'Transferred')->count();

		return view('recept.today')->with(['recept_countApplicantToday'  => $recept_countApplicantToday, 
										   'recept_onProgressToday'      => $recept_onProgressToday, 
										   'recept_onInterviewToday'     => $recept_onInterviewToday,
										   'recept_passedInterviewToday' => $recept_passedInterviewToday,
										   'recept_countInternalToday'   => $recept_countInternalToday,
										   'recept_countTrainingToday'   => $recept_countTrainingToday,
										   'recept_countJobToday'        => $recept_countJobToday]);
	}

	public function count_receptAll()
	{ 
		$date = date('Y-m-d');
		$recept_countApplicantAll  = Receptionist::whereRaw("created like '".$date." %'")->count();

		$recept_countInternalAll   = Receptionist::whereRaw("created like '".$date." %'")
													->where(['work_status' => 'INTERNAL'])->count();

		$recept_countTrainingAll   = Receptionist::whereRaw("created like '".$date." %'")
													->where(['work_status' => 'TRAINING'])->count();

		$recept_countJobAll		  = Receptionist::whereRaw("created like '".$date." %'")
													->where(['work_status' => 'JOB'])->count();

		$recept_onProgressAll      = Receptionist::where('remarks', 'OnProgress')->count();
		$recept_onInterviewAll     = Receptionist::where('remarks', 'OnInterview')->count();
		$recept_passedInterviewAll = Interview::where('status', 'Transferred')->count();

		return view('recept.all')->with(['recept_countApplicantAll'  => $recept_countApplicantAll, 
										   'recept_onProgressAll'      => $recept_onProgressAll, 
										   'recept_onInterviewAll'     => $recept_onInterviewAll,
										   'recept_passedInterviewAll' => $recept_passedInterviewAll,
										   'recept_countInternalAll'   => $recept_countInternalAll,
										   'recept_countTrainingAll'   => $recept_countTrainingAll,
										   'recept_countJobAll'        => $recept_countJobAll]);
	}

	public function anyData_today()
	{
		date_default_timezone_set("Asia/Manila");
		$date = date('Y-m-d');
		$receptionist_today = Receptionist::whereRaw("created like '".$date." %'")
							->where("deleted_at",null)
							->with('recept_contact_person')
							->with('partner')
							->with('site')
							->get();
		return Datatables::of($receptionist_today)->make();
	}

	public function today()
    {
        $date = date('Y-m-d');

        $receptionist = Receptionist::where('created', $date)->get();

        return view('recept.today', ['receptionist' => $receptionist]);
	}
	
	public function all()
	{
		$receptionist = Receptionist::all();
		return view('recept.all', ['receptionist' => $receptionist]);
	}

	public function anyData()
	{
		$receptionists = Receptionist::with('recept_contact_person')
							->where('deleted_at',null);
		return Datatables::of($receptionists)->make();
	}

public function searchApplicant(Request $request){
		$this->validate($request,[
			'firstname'=>'string|nullable',
			'middlename'=>'string|nullable',
			'lastname'=>'string|nullable',
			'contact_no'=>'string|nullable'
		]);

		$firstname = $request->input('firstname');
		$middlename = $request->input('middlename');
		$lastname = $request->input('lastname');
		$contact_no = $request->input('contact_no');
		$applicant = null;

		if(!empty($firstname)){
			$applicant = DB::table('applicants')
						->whereRaw("firstname like '".$firstname."%'")
						->get();
		}

		if(!empty($middlename)){
			$applicant = DB::table('applicants')
						->whereRaw("middlename like '".$middlename."%'")
						->get();
		}

		if(!empty($lastname)){
			$applicant = DB::table('applicants')
						->whereRaw("lastname like '".$lastname."%'")
						->get();
		}

		if(!empty($contact_no)){
			$applicant = DB::table('applicants')
						->whereRaw("contact_no like '".$contact_no."%'")
						->get();
		}
		
		if($applicant != null) return $applicant->toJson();
		else return [];
	}

	public function pdfview(Request $request)
    {
        $items = DB::table("applicants")->get();
        view()->share('items',$items);
        if($request->has('download')){
            $pdf = PDF::loadView('pdfview')->setPaper('a4', 'landscape');
            return $pdf->download('pdfview.pdf');
        }
        return view('pdfview');
	}
	

    public function details($id)
    {
    	$receptionists = Receptionist::find($id);

    	return view('recept.details', ['receptionists' => $receptionists]);
    }

    public function add(Request $request)
    {

		date_default_timezone_set('Asia/Manila');
		$last = Receptionist::select('series_no')->orderBy('id','firstname')->first();
		
		if($last){
			$last = $last->series_no;
			$last = explode('-',$last);
			$date = $last[1];
			$last = end($last);
		}else{
			$last = 0;
			$date = date("Ymd");
		}
		
		
		$currentDate = date("Ymd");

		if($date == $currentDate){
			$series_no = "PPSI-".date('Ymd').'-'.sprintf('%04d',++$last);
		}else{
			$last = 1;
			$series_no = "PPSI-".date('Ymd').'-'.sprintf('%04d',$last);
		}

		$now = date('Y-m-d h:i:s');

    	$contactPersons = contactPerson::all();
		$contactPersons = ContactPerson::orderBy('firstname','asc')->get();
		
		if(!is_null($request)){
			$firstname = $request->input('firstname');
			$middlename = $request->input('middlename');
			$lastname = $request->input('lastname');
			$contact_no = $request->input('contact_no');

			return view('recept.add')->with([
				'series_no'=>$series_no,
				'contactPersons'=> $contactPersons,
				'now'=>$now,
				'firstname'=>$firstname,
				'middlename'=>$middlename,
				'lastname'=>$lastname,
				"contact_no"=>$contact_no
				]);
		}
    }

    public function insert(Request $request)
    {
    	$this->validate($request,[
    		'series_no'               => 'required',
    		'lastname'                => 'required',
    		'firstname'               => 'required',
			'middlename'              => 'required',
			'lastname'			      => 'required',
    		'contact_no'              => 'required', 
    		// 'position_applying'       => 'required',
    		'contact_id'	          => 'required',
    		// 'contact_experience'      => 'required',
			'educational_attainment'  => 'required',
			'last_year_attended'      => 'required',
    		'work_status'             => 'required'
    	]);

    	$receptionistData = $request->all();
		

		$applicantID = Receptionist::create($receptionistData)->id;

		//Add applicant's application to the Applicants Queue
		$applicant = Receptionist::find($applicantID);
		$applicant->interviewer_id = $request->input('contact_id');
		
		if($request->recept_status ='JOB'){
			$applicant->recept_status ='Endorse';
		}
		else{
			$applicant->recept_status = $request->input("recept_status");
		}
		$applicant->save();
			
		//Add applicant's application to the Interviews Queue
		$interview = new Interview;
		$interview->applicant_no = $applicantID;
		$interview->interviewer_id = $request->input("contact_id");
		$interview->status = "Pending";
		$interview->save();

		//Add applicant's application to the Endorsement Queue
		$endorsement = new Endorsement;
		$endorsement->applicant_id = $applicantID;
		$endorsement->contact_id = $request->input("contact_id");
		$endorsement->source = $request->input('source');
		$endorsement->status = $request->work_status;

		// if($request->recept_status = "JOB"){
		// 	$applicant->recept_status ="Endorse";
		// }
		// else{
		// 	$applicant->recept_status = $request->input("recept_status");
		// }
		
		$endorsement->save();
		

		event(new NewApplicant());

    	Session::flash('success_msg', 'Applicant added successfully');
		return redirect()->route('recept.index');
		return $applicant;

	}

	
    public function edit($id)
    {	
		$date = date('Y-m-d');

		$businesspartners = BusinessPartner::all();
		$businesspartners = BusinessPartner::orderBy('company_name', 'asc')->get();

		$contactPersons = ContactPerson::all();
		$contactPersons = Contactperson::orderBy('lastname', 'asc')->get();

    	$receptionists = Receptionist::find($id);

    	return view('recept.edit', [
			'receptionist'     => $receptionists,
			'contactPersons'   => $contactPersons,
			'businesspartners' =>$businesspartners,
			'date'			   => $date,
    	]);
    }

    public function update($id, Request $request)
    {try{
		$receptionistData = $request->all();
		Receptionist::find($id)->update($receptionistData);


			$endorsement = new Endorsement;
			$endorsement->applicant_id = $request->input('applicant_id');
			$endorsement->contact_id = $request->input("contact_id");
			$endorsement->source= $request->input('source');
			$endorsement->status =$request->recept_status;
			$endorsement->save();

			// $endorsementUpdate = Receptionist::find($id);
			// $endorsementUpdate->work_status=$request->recept_status;
			// $endorsementUpdate->save();
	
	
			Session::flash('success_msg', 'Applicant added successfully');
			return redirect()->back()->with('message_success', 'Delete Successfully');
			}catch(\Exception $e){
				echo $e;
			}

		Session::flash('success_msg', 'Applicant updated successfully');
		event(new NewApplicant());
		// return $request->recept_status;
		return redirect()->route('recept.index');

	}

	public function reEndorsement(Request $request){	
		try{
		$receptionistData = $request->all();

		$endorsement = new Endorsement;
		$endorsement->applicant_id = $request->input('applicant_id');
		$endorsement->contact_id = $request->input("contact_id");
		$endorsement->source= $request->input('source');
		$endorsement->status = "Re Endorse";
		$endorsement->save();

    	Session::flash('success_msg', 'Applicant added successfully');
		return redirect()->back()->with('message_success', 'Delete Successfully');
		}catch(\Exception $e){
			echo $e;
		}
	}
	
	
	public function activeFile()
	{
		$endorsement = new Endorsement;
		$endorsement->applicant_id = $request->input('applicant_id');
		$endorsement->contact_id = $request->input("contact_id");
		$endorsement->source = $request->input('source');
		$endorsement->status = "Active File";
		$endorsement->save();

		$endorsementUpdate = Receptionist::find($id);
		$endorsementUpdate->work_status='Active File';
		$endorsementUpdate->save();

	}

	public function delete($id)
    {
       
        $receptionist = Receptionist::find($id);
        if($receptionist->delete()){
            return redirect()->back()->with('message_success', 'Delete Successfully');
        }else{
            return redirect()->back()->with('mesage_success', 'Sorry please try again');
        }
    }

}
