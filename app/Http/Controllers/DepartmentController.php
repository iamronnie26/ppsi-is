<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Yajra\Datatables\DataTables;

class DepartmentController extends Controller
{
    //
    public function index()
    {
    	$departments = Department::orderBy('created', 'desc')->get();
		return view('department.index', ['departments' => $departments]);
	}
	
	public function anyData()
	{
		$departments = Department::all();
		return Datatables::of($departments)->make();
	}

    public function details($id)
    {
    	$departments = Department::find($id);

    	return view('department.details', ['departments' => $departments]);
    }

    public function add()
    {
    	return view('department.add');
    }

    public function insert(Request $request)
    {
    	$this->validate($request, [
    		'dept_name' => 'required',
    	]);

    	$departmentData = $request->all();

    	Department::create($departmentData);

    	Session::flash('success_msg', 'Department added successfully');

    	return redirect()->route('department.index');
    }

    public function edit($id)
    {
    	$departments = Department::find($id);

    	return view('department.edit', ['department' => $departments]);
    }

    public function update($id, Request $request)
    {
    	$this->validate($request, [
    		'dept_name'  => 'required',
    	]);

    	$departmentData = $request->all();

    	Department::find($id)->update($departmentData);

    	Session::flash('success_msg', 'Department updated successfully');

    	return redirect()->route('department.index');
    }

    // public function delete($id)
    // {
    // 	Department::find($id)->delete();

    // 	Session::flash('success_msg', 'Department deleted successfully');

    // 	return redirect()->route('department.index');
	// }
	

	public function delete($id)
    {
    	$departments = Department::find($id);
		if($departments->delete()){ 
			return redirect()->back()->with('message_success', 'Delete Successfully');
		}else{
			return redirect()->back()->with('message_success', 'Sorry please try again');
		}
	}

}
