<?php

namespace App\Http\Controllers;

use App\Intern;
use App\School;
use App\ContactPerson;
use App\Receptionist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\NewIntern;
use Session;
use DB;
use App\Services\PayUService\Exception;
use Carbon\Carbon;
use Yajra\Datatables\DataTables;

class InternController extends Controller
{
	//SUPERVISOR PART


	public function index_supervisor()	{
		
		$now = date('Y-m-d');
		$supervisors = Intern::whereRaw("created like '".$now." %'")
		->with('contactperson')
		->get();
		return view('supervisor.index', ['supervisors' => $supervisors]);
	}

	public function today_supervisor()
	{
		$now = date('Y-m-d');
		$today_supervisor = Intern::whereRaw("created like '".$now." %'")
		->with('contactperson')
		->get();
		return view('supervisor.today', ['today_supervisor' => $today_supervisor]);
	}
	public function all_supervisor()
	{
		$all_supervisor = Intern::select('firstname', 'middlename', 'lastname', 'contact_no', 'ojt_hours')
		->with('contactperson');
		return view('supervisor.all', ['all_supervisor' => $all_supervisor]);
	}

	public function anyDataSupervisor()
	{	
		date_default_timezone_set("Asia/Manila");
		$now = date('Y-m-d');
		$supervisors = Intern::whereRaw("created like '".$now." %'")
						->with('contact_id_supervisor')->get();
        return Datatables::of($supervisors)->make();
	}

	public function anyDataAllSupervisor()
	{
		$supervisorsAll = Intern::all();
        return Datatables::of($supervisorsAll)->make();
	}

	

	public function count_internSupervisor()
	{
		$countInternSupervisor = Intern::all()->count();
		return view('supervisor.index', ['countInternSupervisor' => $countInternSupervisor]);

	}


	//INTERN PART
    public function index()
    {
			$now = date('Y-m-d');
			$interns = Intern::where(['created' => $now]);
			$countIntern = Intern::all()->count();
			return view('intern.index', ['interns' => $interns, 'countIntern' => $countIntern]);
	
	}

	public function today()
	{
		$now = date('Y-m-d');
		$countIntern = Intern::all()->count();

		$interns = Intern::where('created', $now);;
		return view('intern.today',['interns' => $interns, 'now' => $now, 'countIntern' => $countIntern]);
	}

	public function all()
	{
		$interns = Intern::all();
		$countIntern = Intern::all()->count();

		return view('intern.all', ['interns' => $interns, 'countIntern' => $countIntern]);
	}


	public function anyData()
	{

		$interns = Intern::with('school')
				->with('contactperson')
                ->get();

		return Datatables::of($interns)->make();

	}

	public function anyData_today()
	{
		date_default_timezone_set('Asia/Manila');
		$now = date('Y-m-d');

		$interns = Intern::whereRaw("created like '". $now." %'")
		->with('school')
		->with('contact_id_supervisor')
		->get();

        return Datatables::of($interns)->make();
	}

    public function details($id)
    {
    	$interns = Intern::find($id);

    	return view('intern.details', ['interns' => $interns]);
    }

    public function add()
    {
		date_default_timezone_set('Asia/Manila');
		$last = Intern::select('id_no')->orderBy('id','desc')->first();
		
		if($last){
			$last = $last->id_no;
			$last = explode('-',$last);
			$date = $last[0];
			$last = end($last);
		}else{
			$last = 0;
			$date = date("Y");
		}

		$currentDate = date("Y");

		if($date == $currentDate){
			$id_no = date('Y').'-'.sprintf('%03d',++$last);
		}else{
			$last = 1;
			$id_no = date('Y').'-'.sprintf('%03d',$last);
		}
	
		

		try{
		$now = date('Y-m-d h:i:s');
		$schools = School::all();

        $contactPersons = ContactPerson::all();
        $contactPersons = ContactPerson::orderBy('lastname', 'asc')->get();
    	return view('intern.add')->with([
			'id_no' => $id_no,
			'contactPersons' => $contactPersons,
			'now' => $now,
			'schools'=>$schools,
			]);
		}
		catch (\Exception $e){
			return $e->getMessage();
		}

		// return view('intern.index', ['schools' => $schools]);
    }

    public function insert(Request $request)
    {
		try{
    	$this->validate($request, [
			// 'id_no'       => 'required',
			'firstname'       => 'required',
			'middlename'      => 'required',
			'lastname'        => 'required',
			'contact_no'      => 'required',
			'course'		  => 'required',
			'ojt_hours'       => 'required',
			'school'          => 'required',
			'school_address'  => 'required',
			'contact_id'      => 'required',
			'created'		  => 'required',
    	]);

		$intern = new Intern;
		$intern->id_no  = $request->input('id_no');
		$intern->firstname  = $request->input('firstname');
		$intern->middlename = $request->input('middlename');
		$intern->lastname   = $request->input('lastname');
		$intern->contact_no = $request->input('contact_no');
		$intern->course     = $request->input('course');
		$intern->ojt_hours  = $request->input('ojt_hours');
		$intern->contact_id = $request->input('contact_id');
		$intern->created    = $request->input('created');

    $school_id = School::firstOrCreate([
    	'school_name'=>$request->input('school'),
      "school_address"=>$request->input('school_address')
		])->id;

		 $intern->school_id = $school_id;
		
	
		$intern->save();

		event(new NewIntern());

    	Session::flash('success_msg', 'Intern added successfully');

		return redirect(route('intern.index'))->with('success_mgs', 'Added Successfully!');
		}catch(\Exception $e){
				return $e->getMessage();
			}
    }

    public function edit($id)
    {
		try{

		$contactpersons = ContactPerson::all();
		$contactpersons = ContactPerson::orderBy('id', 'asc')->get();

    	$interns  = Intern::find($id);

		return view('intern.edit', ['intern'  => $interns, 'contactpersons', $contactpersons]);
		}
		catch (\Exception $e){
			return $e->getMessage();
		}
    }

    public function update($id, Request $request)
    {
		try{
    	// $this->validate($request, [
    	// 	'firstname'       => 'required',
    	// 	'middlename'      => 'required',
    	// 	'lastname'        => 'required',
		// 	'contact_no'      => 'required',
		// 	'course'		  => 'required',
		// 	'ojt_hours'       => 'required',
		// 	'school_id'       => 'required',
    	// ]);

    	$internData   = $request->all();

    	Intern::find($id)->update($internData);

    	Session::flash('success_msg', 'Intern updated successfully');
		event(new NewIntern());
		return redirect()->route('intern.index');
		}
		catch (\Exception $e){
			return $e->getMessage();
		}
    }

	public function delete($id)
    {

        $interns = Intern::find($id);
        if($interns->delete()){
            return redirect()->back()->with('message_success', 'Delete Successfully');
        }else{
            return redirect()->back()->with('mesage_success', 'Sorry please try again');
        }
    }

}
