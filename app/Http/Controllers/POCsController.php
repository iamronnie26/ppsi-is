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
use App\Endorsement;
use App\School;
//use App\NewApplicant;
use Session;
use Validator;
class POCsController extends Controller
{
    //Properties
    protected $showups;
    protected $schools;
    protected $businessPartners;
    protected $user;
    protected $id;
    public function __construct(){
        $this->showups = Applicant::where("contact_id",Auth::id())
                    ->orderBy('created_at', 'desc')
                    ->get();
        $this->schools = School::all();
        $this->businessPartners = BusinessPartners::all();
        $this->user = Auth::user();
    }
################################################################################
//Dashboard Page Controllers
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Today's Showups
    public function index()
    {
        $url = route("poc.index.today");
        $id =  Auth::user()->contact_id;
        $todaysShowups = Applicant::whereRaw("created like '".date("Y-m-d")." %'")
                            ->where('contact_id',$id)
                            ->get()->count();

        $training = count(Applicant::whereRaw("created like'".date("Y-m-d")." %'")
                            ->where('work_status','TRAINING')
                            ->where('contact_id',$id)
                            ->get());

        $endorsed = count(Applicant::where('endorsement_status','SINGLE')
                            ->orWhere('endorsement_status','MULTIPLE')
                            ->where('contact_id',$id)
                            ->whereRaw("created like'".date("Y-m-d")." %'")
                            ->get());

        $totalInterviews = ContactPerson::find($id);

        $processing = ContactPerson::find($id);
        if(!is_null($totalInterviews)){
            $totalInterviews = $totalInterviews->interviews()
                                    ->where('status','<>','Transferred')
                                    ->whereRaw("created like '".date("Y-m-d")." %'")
                                    ->get()
                                    ->count();
        }else{
            $totalInterviews = 0;
        }

        if(!is_null($processing)){
            $processing = count($processing->interviews()->whereRaw("created like '".date("Y-m-d")." %'")->where('status','Processing')->get());
        }else{
            $processing = 0;
        }

        $doneInterviews = ContactPerson::find($id);
        if(!is_null($doneInterviews)){
            $done = count($doneInterviews->interviews()->whereRaw("created like '".date("Y-m-d")." %'")->where('status','Done')->get());
        }else{
            $done = 0;
        }

        return view('poc.index')->with([
            "url"=>$url,
            "todaysShowups"=>$todaysShowups,
            "training"=>$training,
            "processingInterviews"=>$processing,
            "totalInterviews"=>$totalInterviews,
            "endorsed"=>$endorsed,
            "doneInterviews"=>$done,
        ]);
    }
    //All Showups
    public function allApplicants(){
        //Logged In User ID
        $id =  Auth::user()->contact_id;
        $url = route("poc.index.all");
        $todaysShowups = count(Applicant::whereRaw("created like'".date("Y-m-d")." %'")
                            ->where('contact_id',$id)
                            ->get());
        $training = count(Applicant::whereRaw("created like'".date("Y-m-d")." %'")
                            ->where('work_status','TRAINING')
                            ->where('contact_id',$id)
                            ->get());

        $endorsed = Applicant::where('endorsement_status','SINGLE')
                            ->orWhere('endorsement_status','MULTIPLE')
                            ->where('contact_id',$id)
                            ->whereRaw("created like'".date("Y-m-d")." %'")
                            ->get()->count();
                            
                            $processing = ContactPerson::find($id);
        $totalInterviews = ContactPerson::find($id);
                            if(!is_null($totalInterviews)){
                                $totalInterviews = $totalInterviews->interviews()
                                                        ->where('status','<>','Transferred')
                                                        ->whereRaw("created like '".date("Y-m-d")." %'")
                                                        ->get()
                                                        ->count();
                            }else{
                                $totalInterviews = 0;
                            }
                    
                            if(!is_null($processing)){
                                $processing = count($processing->interviews()->where('status','Processing')->get());
                            }else{
                                $processing = 0;
                            }
                    
                            $doneInterviews = ContactPerson::find($id);
                            if(!is_null($doneInterviews)){
                                $done = count($doneInterviews->interviews()->where('status','Done')->get());
                            }else{
                                $done = 0;
                            }
                    return view('poc.index')->with([
            "url"=>$url,
            "todaysShowups"=>$todaysShowups,
            "training"=>$training,
            "endorsed"=>$endorsed,
            "totalInterviews"=>$totalInterviews,
            "processingInterviews"=>$processing,
            "doneInterviews"=>$done,
        ]);
    }
##############################################################################################
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showup = Applicant::find($id);
        $interview = Interview::where('applicant_no',$id)->first();
        $sites = SiteEndorsed::all();
        return view('poc.edit')->with([
            'showup'=>$showup,
            'interview'=>$interview,
            'schools'=>$this->schools,
            'businessPartners'=>$this->businessPartners,
            'sites'=>$sites
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
        // $validator = Validator::make($request->all(),[
        //     "email"=>"required|email",
        //     "contact_no"=>"required|size:11",
        //     "address"=>"required|alpha_spaces",
        //     "nationality"=>"required|alpha",
        //     "gender"=>"required|in:Male,Female",
        //     "marital_status"=>"required|alpha",
        //     "birthday"=>"required|date",
        //     "position_applying"=>"required|alpha_spaces",
        //     "work_status"=>"required|alpha_spaces",
        //     "contact_experience"=>"required|alpha_spaces",
        //     "educational_attainment"=>"required|alpha_spaces",
        //     "course"=>"required|alpha",
        //     "year_graduated"=>"required|numeric",
        //     "school"=>"required|alpha_spaces",
        //     "school_address"=>"required|alpha_spaces",
        //     "activity"=>"required|alpha_spaces",
        //     "business_partner"=>"required|integer",
        //     "site_endorsed"=>"required|integer",
        //     "remarks"=>"required|alpha_spaces",
        //     "status"=>"required|alpha_spaces",
        //     "comment"=>"required|alpha_spaces"
        // ],[
        //     "contact_no.size"=>"Enter a valid Contact Number!"
        // ]);
        // $showupData = $request->all();

        // $errors = $validator->errors();
        // if($validator->fails()){
        //     return $errors;
        // }else{
            $applicant = Applicant::find($id);
            $school_id = School::firstOrCreate([
            'school_name'=>$request->input('school'),
            "school_address"=>$request->input('school_address')
        ])->id;
        $interview = Interview::where("applicant_no",$id)
                                ->where("status","Processing")
                                ->first();
        $applicant->birthdate = $request->input('birthday');
        $applicant->email = $request->input('email');
        $applicant->contact_no = $request->input('contact_no');
        $applicant->address = $request->input('address');
        $applicant->nationality = $request->input('nationality');
        $applicant->gender = $request->input('gender');
        $applicant->marital_status = $request->input('marital_status');
        $applicant->position_applying = $request->input('position_applying');
        $applicant->educational_attainment = $request->input('educational_attainment');
        $applicant->course = $request->input('course');
        $applicant->year_graduated = $request->input('year_graduated');
        $applicant->last_year_attended = $request->input("last_year_attended");
        $applicant->school_id = $school_id;
        $applicant->activity = $request->input("activity");
        $applicant->contact_experience = $request->input("contact_experience");
        $applicant->endorsement_status = $request->input("endorsement_status");
        
        $applicant->comment = $request->input("comment");
        $applicant->remarks = $request->input("remarks");
        $applicant->interviewStatus = $request->input("status");
        $applicant->endorsement_status = $request->input("endorsement_status");
        $applicant->endorse = $request->input("endorse");

        if($request->input('endorse') == 'Endorse to Training' && $applicant->work_status != $request->input('work_status')){
            $applicant->work_status = "TRAINING";
            $applicant->endorsement_status = "";
            $endorsement = new Endorsement();
                    $endorsement->contact_id = $applicant->contact_id;
                    $endorsement->status = "TRAINING";
                    $endorsement->applicant_id = $id;
                    $endorsement->save();
        }

        if($request->input('endorse') == 'Endorse to Local' && $applicant->work_status != $request->input('work_status') ){
            $applicant->work_status = "INTERNAL";
            $applicant->endorsement_status = "";
            $endorsement = new Endorsement();
                    $endorsement->contact_id = $applicant->contact_id;
                    $endorsement->status = "INTERNAL";
                    $endorsement->applicant_id = $id;
                    $endorsement->save();
        }
        
        //Select the endorsement if it exists
        $endorsement = $applicant->endorsements->first();

        if($request->input('endorsement_status') !== null && $request->input('endorsement_status') == "SINGLE"){
            $endorsement->company_id = $request->input('business_partner');
            $endorsement->site_id = $request->input('site_endorsed');
            $applicant->business_partner = $request->input('business_partner');
            $applicant->site_endorsed = $request->input('site_endorsed');
            $applicant->endorsement_status = "SINGLE";
            $endorsement->save();
        }elseif($request->input('endorsement_status') !== null && $request->input('endorsement_status') == "MULTIPLE")
            {
            $applicant->endorsement_status = "MULTIPLE";
            //Variable where to store the endorsement ID if it exists
            $endorsement_id = null;
    
            //Endorsement Values
            $endorsement_1 = ['company_id'=>$request->input('endorsement_1'),
                                'site_id'=>$request->input('endorsement_site_1')
                ];
    
            $endorsement_2 = ['company_id'=>$request->input('endorsement_2'),
                            'site_id'=>$request->input('endorsement_site_2')
            ];
    
            $endorsement_3 = ['company_id'=>$request->input('endorsement_3'),
                            'site_id'=>$request->input('endorsement_site_3')
            ];
    
            //Update endorsement if single endorsement
            if($request->input('endorsement_1') && $request->input('endorsement_site_1')){
                if($endorsement->company_id != 0 && $endorsement->site_id != 0){
                    $endorsement = new Endorsement();
                    $endorsement->applicant_id = $id;
                }
                $endorsement->company_id = $endorsement_1['company_id'];
                $endorsement->site_id = $endorsement_1['site_id'];
                $endorsement->contact_id = $applicant->contact_id;
                $applicant->business_partner = $endorsement_1['company_id'];
                $applicant->site_endorsed = $endorsement_1['site_id'];
                $applicant->endorsement_status = "MULTIPLE";
                $endorsement->save();
            }
    
            //If multiple endorsements, create new endorsement and get the ID
            if($request->input('endorsement_2')  && $request->input('endorsement_site_2')){
                    $endorsement = new Endorsement();
                    $endorsement->company_id = $endorsement_2['company_id'];
                    $endorsement->site_id = $endorsement_2['site_id'];
                    $endorsement->contact_id = $applicant->contact_id;
                    $endorsement->status = "JOB";
                    $endorsement->applicant_id = $id;
                    $applicant->endorsement_status = "MULTIPLE";
                    $endorsement->save();
    
                $applicant->business_partner = $endorsement_2['company_id'];
                $applicant->site_endorsed = $endorsement_2['site_id'];
    
            }
    
            if($request->input('endorsement_3')  && $request->input('endorsement_site_3')){
                    $endorsement = new Endorsement();
                    $endorsement->company_id = $endorsement_3['company_id'];
                    $endorsement->site_id = $endorsement_3['site_id'];
                    $endorsement->status = "JOB";
                    $endorsement->applicant_id = $id;
                    $endorsement->contact_id = $applicant->contact_id;
                    $applicant->endorsement_status = "MULTIPLE";
                    $endorsement->save();
                $applicant->business_partner = $endorsement_3['company_id'];
                $applicant->site_endorsed = $endorsement_3['site_id'];
            }
        }

        $interview->status = "Done";
        $interview->save();
        $applicant->save();

        // return "Success";
        // }
       // event(new NewApplicant());
        // Session::flash('success_alert','Record Updated Successfully!');
        return redirect()->back();
    }

    public function interviews(){
        $contacts = DB::table('contact_people')
                    ->leftJoin('users','contact_people.id','=','users.contact_id')
                    ->where('role','poc')
                    ->get();
        return view('poc.interviews')->with('contacts',$contacts);
    }
    public function processApplication($id){
        $showup = Interview::where('applicant_no',$id)->first();
        $app_id = $showup->applicant_no;
        $showup->status = "Processing";
        $showup->save();
        $applicant = Applicant::find($app_id);
        $applicant->interviewer_id = Auth::user()->contact_id;
        $applicant->save();
    }
    public function passInterview(Request $request){
        $this->validate($request,[
            "contact_person"=>"required|integer",
            "applicant_id"=>"required|integer"
        ]);
        $applicant_id = $request->input('applicant_id');
        $applicant = Applicant::find($applicant_id);
        $applicant->interviewer_id = $request->input('contact_person');
        $applicant->save();
        return redirect()->back()->with('message_success','Successfully Passed!');
    }
###########################################################################################
    //Datatable data
    public function showups($view){
        if($view === "all"){
            $url = route("poc.data");
        }elseif($view === "today"){
            $url = route("poc.data.today");
        }
        return view('poc.showups')->with("url",$url);
    }

    //showup all
    public function showDataTableAll(){
        $applicants = Applicant::where('contact_id',Auth::user()->contact_id)
                    ->with("contactperson")
                    ->with('interview')
                    ->with("school")
                    ->with('businessPartner')
                    ->with('siteEndorsed')
                    ->get();
        return Datatables::of($applicants)->make();
        // return dd($applicants);
    }
    //showup poc
    public function pocDataTableToday(){
        date_default_timezone_set("Asia/Manila");
        $applicants = Applicant::where('contact_id',Auth::user()->contact_id)
                    ->whereRaw("created like '".date("Y-m-d")." %'")
                    ->with("contactperson")
                    ->with('interview')
                    ->with("school")
                    ->with('interview.businessPartner')
                    ->with('interview.siteEndorsed')
                    ->get();
        return Datatables::of($applicants)->make();
    }
    //Dashboard Today's
    public function todaysApplicants(){
        date_default_timezone_set("Asia/Manila");
        $id = Auth::user()->contact_id;
        $applicants = Applicant::select("id","series_no","firstname","middlename","lastname","position_applying")
                        ->where('contact_id',$id)
                        ->whereRaw("created like '".date("Y-m-d")." %'")->orderBy('created','desc')
                        ->with("interviewStatus")
                        ->get();
        return Datatables::of($applicants)->make();
    }

    //Dashboard All
    public function allApplicantsIndex(){
        $id =  Auth::user()->contact_id;
        $applicants = Applicant::select("id","series_no","firstname","middlename","lastname","position_applying")
        ->where('contact_id',$id)
        ->orderBy('created','desc')
        ->with("interviewStatus")
        ->get();
        return Datatables::of($applicants)->make();
    }
    //Interview
    public function interviewsDataTableAll(){
        $applicants = Applicant::where('interviewer_id',Auth::user()->contact_id)
                    ->orWhere('contact_id',Auth::user()->contact_id)
                    ->with("contactperson")
                    ->with('interviewer')
                    ->with("school")
                    ->with('businessPartner')
                    ->with('siteEndorsed')
                    ->orderBy('updated_at','desc')
                    ->get();
        return Datatables::of($applicants)->make();
        // return dd($applicants);
    }
    public function interviewer($id){
        $applicant = Applicant::find($id)->interviewer;
        $interviewer = $applicant->firstname ." ".$applicant->lastname;
        return $interviewer;
    }
###############################################################################################
}
