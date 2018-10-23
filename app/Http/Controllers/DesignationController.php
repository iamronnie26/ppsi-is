<?php

namespace App\Http\Controllers;

use App\Designation;
use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Yajra\Datatables\DataTables;

class DesignationController extends Controller
{
    //
    public function index()
    {
    	$designations = Designation::orderBy('created', 'desc')->get();
		//return view('designation.index',['designations' => $designations]);

		return view('designation.index',['designations' => $designations]);
		
	}
	
	public function anyData()
	{
		$designations = Designation::all();
		return Datatables::of($designations)->make();
	}

    public function details($id)
    {
    	$designations = Designation::find($id);

    	return view('designation.details', ['designations' => $designations]);
    }

    public function add()
    {
    	return view('designation.add');
    }

    public function insert(Request $request)
    {
    	$this->validate($request, [
    		'designation' => 'required',
    	]);

    	$designationData = $request->all();

    	Designation::create($designationData);

    	Session::flash('success_msg', 'Designation added successfully');

    	return redirect()->route('designation.index');
    }

    public function edit($id)
    {
    	$designations = Designation::find($id);
    	
    	return view('designation.edit', ['designation' => $designations]);	
    }

    public function update($id, Request $request)
    {
    	$this->validate($request, [
    		'designation' => 'required',
    	]);

    	$designationData = $request->all();

    	Designation::find($id)->update($designationData);

    	Session::flash('success_msg', 'Designation updated successfully');

    	return redirect()->route('designation.index');
    }

	public function delete($id)
    {
    	$designations = Designation::find($id);
		if($designations->delete()){ 
			return redirect()->back()->with('message_success', 'Delete Successfully');
		}else{
			return redirect()->back()->with('message_success', 'Sorry please try again');
		}
	}

}
