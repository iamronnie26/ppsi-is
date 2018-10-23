<?php

namespace App\Http\Controllers;

use App\BusinessPartners;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Yajra\Datatables\DataTables;

class BusinessPartnersController extends Controller
{
    //
    public function index()
    {
    	$businesspartners = BusinessPartners::orderBy('created', 'desc')->get();

    	return view('businesspartners.index', ['businesspartners' => $businesspartners]);
	}
	
	public function anyData()
	{
		$businesspartners = BusinessPartners::all();
		return Datatables::of($businesspartners)->make();
	}

    public function details($id)
    {
    	$businesspartners = BusinessPartners::find($id);

    	return view('businesspartners.details', ['businesspartners' => $businesspartners]);
    }

    public function add()
    {
    	return view('businesspartners.add');
    }

    public function insert(Request $request)
    {
    	$this->validate($request, [
    		'company_name' => 'required',
    	]);

    	$businesspartnersData = $request->all();

    	BusinessPartners::create($businesspartnersData);

    	Session::flash('success_msg', 'Business Partner added successfully');

    	return redirect()->route('businesspartners.index');
    }

    public function edit($id)
    {
    	$businesspartners = BusinessPartners::find($id);

    	return view('businesspartners.edit', ['businesspartners' => $businesspartners]);
    }

    public function update($id, Request $request)
    {
    	$this->validate($request, [
    		'company_name' => 'required',
    	]);

    	$businesspartnersData = $request->all();

    	BusinessPartners::find($id)->update($businesspartnersData);

    	Session::flash('success_msg', 'Business Partner updated successfully');

    	return redirect()->route('businesspartners.index');
    }

	public function delete($id)
    {
    	$businesspartners = BusinessPartners::find($id);
		if($businesspartners->delete()){ 
			return redirect()->back()->with('message_success', 'Delete Successfully');
		}else{
			return redirect()->back()->with('message_success', 'Sorry please try again');
		}
	}

}
