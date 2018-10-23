<?php

namespace App\Http\Controllers;

use App\IDI;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class IDIController extends Controller
{
    //
    public function index()
    {
    	$idis = IDI::orderBy('created', 'desc')->get();

    	return view('idis.index', ['idis' => $idis]);
    }

    public function details($id)
    {
    	$idis = IDI::find($id);

    	return view('idis.details', ['idis' => $idis]);
    }

    public function add()
    {
    	return view('idis.add');
    }

    public function insert(Request $request)
    {
    	$this->validate($request, [
    		'series_no_idi'   => 'required',
    		'date_idi'		  => 'required',
    		'wiwo_idi'		  => 'required',
    		'recruiter_idi'   => 'required',
    		'idi_result'      => 'required',
    		'idi_reason'      => 'required',
    		'idi_subreason'   => 'required',
    	]);

    	$idiData = $request->all();

    	IDI::create($idiData);

    	Session::flash('success_msg', 'Information added successfully');

    	return redirect()->route('idis.index');
    }

    public function edit($id)
    {
    	$idis = IDI::find($id);

    	return view('idis.edit', ['idi' => $idis]);
    }

    public function update($id, Request $request)
    {
    	$this->validate($request, [
    		'series_no_idi'   => 'required',
    		'date_idi'		  => 'required',
    		'wiwo_idi'		  => 'required',
    		'recruiter_idi'   => 'required',
    		'idi_result'      => 'required',
    		'idi_reason'      => 'required',
    		'idi_subreason'   => 'required',
    	]);

    	$idiData = $request->all();

    	IDI::find($id)->update($idiData);

    	Session::flash('success_msg', 'Information updated successfully');

    	return redirect()->route('idis.index');
    }

    public function delete($id)
    {
    	IDI::find($id)->delete();

    	Session::flash('success_msg', 'Information deleted successfully');

    	return redirect()->route('idis.index');
    }
}
