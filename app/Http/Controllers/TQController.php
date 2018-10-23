<?php

namespace App\Http\Controllers;

use App\TQ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class TQController extends Controller
{
    //
    public function index()
    {
    	$tqs = TQ::orderBy('created', 'desc')->get();

    	return view('tq.index')->with('tqs',$tqs);
    }

    public function details($id)
    {
    	$tqs = TQ::find($id);

    	return view('tq.details', ['tqs' => $tqs]);
    }

    public function add()
    {
    	return view('tq.add');
    }

    public function insert(Request $request)
    {
    	$this->validate($request, [
    		'series_no_tq'	=> 'required',
    		'date_tq'		=> 'required',
    		'wiwo_tq'		=> 'required',
    		'recruiter_tq'  => 'required',
    		'tq_result'		=> 'required',
    		'tq_reason'		=> 'required',
    		'tq_subreason'  => 'required',
    	]);

    	$tqData = $request->all();

    	TQ:create($tqData);

    	Session::flash('success_msg', 'Information added successfully');

    	return redirect()->route('tqs.index');
    }

    public function edit($id)
    {
    	$tqs = TQ::find($id);

    	return view('tqs.edit', ['tq' => $tqs]);
    }

    public function update($id, Request $request)
    {
    	$this->validate($request, [
    		'series_no_tq'	=> 'required',
    		'date_tq'		=> 'required',
    		'wiwo_tq'		=> 'required',
    		'recruiter_tq'  => 'required',
    		'tq_result'		=> 'required',
    		'tq_reason'		=> 'required',
    		'tq_subreason'  => 'required',
    	]);

    	$tqData = $request->all();

    	TQ::find($id)->update($tqData);

    	Session::flash('success_msg', 'Information updated successfully');

    	return redirect()->route('tqs.index');
    }

    public function delete($id)
    {
    	TQ::find($id)->delete();

    	Session::flash('success_msg', 'Information deleted successfully');

    	return redirect()->route('tqs.index');
    }

}
