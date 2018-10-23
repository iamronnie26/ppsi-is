<?php

namespace App\Http\Controllers;

use App\SiteEndorsed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Yajra\Datatables\DataTables;

class SiteEndorseController extends Controller
{
    //
    public function index()
    {
    	$siteEndorses = SiteEndorsed::orderBy('created', 'desc')->get();

    	return view('siteEndorse.index', ['siteEndorses' => $siteEndorses]);
	}
	
	public function anyData()
	{
		$siteEndorses = SiteEndorsed::all();
		return Datatables::of($siteEndorses)->make();
	}

    public function details($id)
    {
    	$siteEndorses = SiteEndorsed::find($id);

    	return view('siteEndorse.details', ['siteEndorses' => $siteEndorses]);
    }

    public function add()
    {
    	return view('siteEndorse.add');
    }

    public function insert(Request $request)
    {
    	$this->validate($request, [
    		'site_name' => 'required',
    	]);

    	$siteEndorseData = $request->all();

    	SiteEndorsed::create($siteEndorseData);

    	Session::flash('success_msg', 'Site Endorse added successfully');

    	return redirect()->route('siteEndorse.index');
    }

    public function edit($id)

    {
    	$siteEndorse = SiteEndorsed::find($id);

    	return view('siteEndorse.edit', ['siteEndorse' => $siteEndorse]);
    }

    public function update($id, Request $request)
    {
    	$this->validate($request, [
    		'site_name' => 'required',
    	]);

    	$siteEndorseData = $request->all();

    	SiteEndorsed::find($id)->update($siteEndorseData);

    	Session::flash('success_msg', 'Site Endorse updated Successfully');

    	return redirect()->route('siteEndorse.index');
    }

    public function delete($id)
    {
    	$siteEndorses = SiteEndorsed::find($id);
		if($siteEndorses->delete()){ 
			return redirect()->back()->with('message_success', 'Delete Successfully');
		}else{
			return redirect()->back()->with('message_success', 'Sorry please try again');
		}
	}


}
