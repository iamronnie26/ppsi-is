<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use App\ContactPerson;
use App\Intern;
use App\Logistic;
use Session;
use App\Events\NewApplicant;
use Yajra\Datatables\DataTables;

class LogisticController extends Controller
{
    public function index()
    {
        $date = date('Y-m-d');
        $logistics = Applicant::whereRaw("created like '".$date." %'")
                                ->where(['work_status' => 'JOB'])
                                ->with('contactperson')
                                ->get();

        return view('logistic.index',['logistics' => $logistics]);
    }

    public function anyData()
	{
        $date = date('Y-m-d');
        $logistics = Applicant::whereRaw("created like '".$date." %'")
                                ->where(['work_status' => 'JOB'])
                                ->with('contactperson')
                                ->get();
		return Datatables::of($logistics)->make();
    }

    public function today()
    {
        $date = date('Y-m-d');
        $logistics = Applicant::whereRaw("created like '".$date." %'")
                                ->where(['work_status' => 'JOB']);
        return view('logistic.today',['logistics' => $logistics]);
    }

    public function all()
    {
        $logisticAll = Applicant::where(['work_status' => 'Job']);
        return view('logistic.all',['logisticAll' => $logisticAll]);
    }

    public function allData()
    {
        $logisticAll = Applicant::where(['work_status' => 'Job']);
        return Datatables::of($logisticAll)->make();
    }

    public function report()
    {
        $applicants = Applicant::whereRaw("created like '".date('Y-m-d')." %'")
        ->where('deleted_at',null)->get();
$interns = Intern::whereRaw("created like '".date('Y-m-d')." %'")
->where('deleted_at',null)->get();
$partialTotalMonthly = Applicant::where("deleted_at",null)
                      ->whereRaw("created like '".date("Y-m")."-%'")
                      ->get()
                      ->count();
//Initialize empty collections
$applicantsContact_ids = collect([]);
$internsContact_ids = collect([]);
$applicantShowups = collect([]);
$internShowups = collect([]);
$totalShowups = 0;

//Loop for applicants contact IDs
foreach($applicants as $applicant) $applicantsContact_ids->push($applicant->contact_id);

//Loop for Interns contact Ids
foreach($interns as $intern) $internsContact_ids->push($intern->contact_id);


//filter the collection with unique values
$applicantsContact_ids = $applicantsContact_ids->unique();
$internsContact_ids =$internsContact_ids->unique();


//Loop for collecting applicants report
foreach($applicantsContact_ids as $contact_id){
$contact = ContactPerson::find($contact_id);
$todays = Applicant::where("contact_id",$contact_id)
          ->whereRaw("created like '".date("Y-m-d")." %'")
          ->where('deleted_at',null)
          ->get()
          ->count();
$totalShowups+=$todays;
$contact_name = $contact->firstname." ".$contact->lastname;
$applicantShowups->push(["name"=>$contact_name,"showups"=>$todays]);
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

$totalInterns = Intern::where('deleted_at',null)->count();

// return $report;

return view('logistic.report')->with([
"applicants"=>$applicantShowups,
"interns"=>$internShowups,
"todaysTotalShowups"=>$todaysTotalShowups,
"totalInterns"=>$totalInterns,
"partialMonthlyTotal"=>$partialTotalMonthly,
]);
        }

        public function weeklyReport(){
            date_default_timezone_set('Asia/Manila');
		$contactPerson = ContactPerson::where('deleted_at',null)->get();
		$partialTotalMonthly = Receptionist::where("deleted_at",null)
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
				$todays = Receptionist::where("contact_id",$c['id'])->whereRaw("created like '".$date." %'")->where('deleted_at',null)->get()->count();
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

		return view('logistic.weekly')->with([
			"reports"=>$report,
			"totalShowups"=>$total,
			"partialMonthlyTotal" =>$partialTotalMonthly,
		]);
    }

    public function productivity()
    {
         
        date_default_timezone_set("Asia/Manila");
        $date = date('Y-m-d');
        
        $hire = Applicant::where(['remarks' => 'Passed', 'work_status' => 'JOB']);
        // $hire = Applicant::where('remarks', 'Passed');
        $failed = Applicant::where('remarks', 'Failed');
        $pending = Applicant::where('remarks', 'Pending');
        $NA = Applicant::where('remarks', 'No Answer');
        $HO = Applicant::where('remarks', 'Hired Others');
        $CBR = Applicant::where('remarks', 'Cannot be reached');

        $countHired  = Applicant::where(['remarks'  => 'Passed','work_status' => 'JOB'])->count();

        $countFailed = Applicant::where(['remarks' => 'Failed','work_status' => 'JOB' ])->count();

        $countHO     = Applicant::where(['remarks' => 'Hired Others', 'work_status' => 'JOB'])->count();

        $countDNGY   = Applicant::where(['remarks' => 'Pending', 'work_status' => 'JOB'])->count();

        $countNA     = Applicant::where(['remarks' => 'No Answer', 'work_status' => 'JOB'])->count();

        $countCBR    = Applicant::where(['remarks' => 'Cannot be reach', 'work_status' => 'JOB'])->count();

        $countIntern = Intern::get()->count();

        $countTraining = Applicant::where(['work_status' => 'TRAINING'])->count();

        return view('logistic.productivity', ['hire' => $hire, 
                                            'failed' => $failed, 
                                            'pending' => $pending, 
                                            'NA' => $NA, 
                                            'HO' => $HO, 
                                            'CBR' => $CBR,
                                            'countHired' =>  $countHired,
                                            'countFailed' => $countFailed,
                                            'countHO' => $countHO,
                                            'countDNGY' => $countDNGY,
                                            'countNA' => $countNA,
                                            'countCBR' => $countCBR,
                                            'countIntern' => $countIntern,
                                            'countTraining' => $countTraining,
                                            'date' => $date]);
    }

    public function hired()
    {
       $logisticsPassed = Applicant::where(['remarks' => 'Passed', 'work_status' => 'JOB'])->get();
        return Datatables::of($logisticsPassed)->make();
    }

    public function failed()
    {
        $logisticsFailed = Applicant::where(['remarks' => 'Failed', 'work_status' => 'JOB'])->get();
        return Datatables::of($logisticsFailed)->make();
    }

    public function ho()
    {
        $logisticsHO = Applicant::where(['remarks' => 'Hired Others', 'work_status' => 'JOB'])->get();
        return Datatables::of($logisticsHO)->make();
    }

    public function dngy()
    {
        $logisticsDNGY = Applicant::where(['remarks' => 'Pending', 'work_status' => 'JOB'])->get();
        return Datatables::of($logisticsDNGY)->make();
    }

    public function na()
    {
        $logisticsNA = Applicant::where(['remarks' => 'No Answer', 'work_status' => 'JOB'])->get();
        return Datatables::of($logisticsNA)->make();
    }

    public function cbr()
    {
        $logisticsCBR = Applicant::where(['remarks' => 'Cannot be reach', 'work_status' => 'JOB'])->get();
        return Datatables::of($logisticsCBR)->make();
    }

    public function index_intern()
    {
        $date = date('Y-m-d');
        $interns = Intern::whereRaw("created like '". $date." %'")
        ->with('school')
        ->with('contact_id_supervisor')
        ->get();
        return view('logistic.intern', ['interns' => $interns, 'created' => $date]);	
    }

    public function intern()
    {
        $date = date('Y-m-d');
        $interns = Intern::whereRaw("created like '". $date." %'")
        ->with('school')
        ->with('contact_id_supervisor')
        ->get();
        return Datatables::of($interns)->make();
    }

    public function index_internal()
    {
        $date = date('Y-m-d');
        $internal = Applicant::whereRaw("created like '". $date."%'")->get();
        $statusInternal = Applicant::where(['work_status' => 'INTERNAL']);
        return view('logistic.internal', ['internal' => $internal, 
                                           'date' => $date, 
                                           'statusInternal' => $statusInternal]);
    }

    public function internal()
    {  
        date_default_timezone_set("Asia/Manila");
        $date = date('Y-m-d');
        $statusInternal = Applicant::whereRaw("created like '". $date."%'")
                            ->where('work_status','INTERNAL')
                            ->with('contactperson')
                            ->get();
        return Datatables::of($statusInternal)->make();
    }

    public function index_training()
    {
        $date = date('Y-m-d');
        $trainings = Applicant::whereRaw("created like '". $date." %'")->get();
        $statusTraining = Applicant::where(['work_status' => 'TRAINING']);
        return view('logistic.training', ['trainings' => $trainings, 'created' => $date, 'statusTraining' => $statusTraining]);
    }

    public function training()
    {
        $date = date('Y-m-d');
        $statusTraining = Applicant::where(['work_status' => 'TRAINING']);
        $trainings = Applicant::whereRaw("created like '". $date." %'")->get();
        return Datatables::of($statusTraining)->make();
    }

    public function edit($id)
    {
    	$logistics = Applicant::find($id);

        return view('logistic.edit', ['logistics' => $logistics]);
        event(new NewApplicant());
    }

    public function update($id, Request $request)
    {
        try{
           
            $logistics = Applicant::find($id);
            $logistics->remarks = $request->get('remarks');
            $logistics->comment = $request->get('comment');
            $logistics->save();
            event(new NewApplicant());
           
            return redirect()->route('logistic.index');
            
    }catch(\Exception $e){
    	echo $e;
    }
    }
    
}
