<?php

namespace App\Http\Controllers;

use App\ContactPerson;
use App\Department;
use App\Designation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Yajra\Datatables\DataTables;

class ContactPersonController extends Controller
{
    //
    public function index(){

		$contactpersons = ContactPerson::orderBy('created', 'desc')->get();
    	return view('contactPersons.index', ['contactpersons' => $contactpersons]);

	}

	public function anyData()
    {

        $contactpersons = ContactPerson::select('id','firstname', 'middlename', 'lastname','designation_id','dept_id')
                ->with('department_contact_person')
                ->with('designation_contact_person')
                ->get();

        return Datatables::of($contactpersons)->make();
	}

    public function details($id){
    	$contactpersons = ContactPerson::find($id);

    	return view('contactpersons.details', ['contactpersons' => $contactpersons]);
    }

    public function add(){


		$departments = Department::all();
		$departments = Department::orderBy('id', 'asc')->get();

		$designations = Designation::all();
		$designations = Designation::orderBy('id', 'asc')->get();

		return view('contactPersons.add')->with(['departments' => $departments, 'designations' => $designations]);

    }

    public function insert(Request $request){
    	$this->validate($request,[
    		'firstname'      => 'required',
    		'middlename'     => 'required',
			'lastname'       => 'required',
			'dept_id'        => 'required',
			'designation_id' => 'required',
    	]);

    	$contactpersonData = $request->all();

    	ContactPerson::create($contactpersonData);

    	//Session::flash('success_msg', 'Contact Person added successfully');

    	return redirect()->route('contactPersons.index');
    }

    public function edit($id){

		$departments = Department::all();
		$departments = Department::orderBy('id', 'asc')->get();

		$designations = Designation::all();
		$designations = Designation::orderBy('id', 'asc')->get();

    	$contactperson = ContactPerson::find($id);

    	return view('contactPersons.edit')->with(['contactperson' => $contactperson, 'designations' => $designations, 'departments' => $departments]);
    }

    public function update($id, Request $request){
    	$this->validate($request,[
    		// 'firstname'      => 'required',
    		// 'middlename'     => 'required',
			// 'lastname'       => 'required',
			// 'designation_id' => 'required',
			// 'dept_id'        => 'required',
    	]);

    	$contactpersonData = $request->all();

    	ContactPerson::find($id)->update($contactpersonData);

    	Session::flash('success_msg', 'Contact Person updated successfully');

    	return redirect()->route('contactPersons.index');
    }

    public function delete($id)
    {
    	$contactpersons = ContactPerson::find($id);
		if($contactpersons->delete()){
			return redirect()->back()->with('message_success', 'Delete Successfully');
		}else{
			return redirect()->back()->with('message_success', 'Sorry please try again');
		}
	}
}
