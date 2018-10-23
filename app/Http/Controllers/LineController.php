<?php

namespace App\Http\Controllers;

use App\Line;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class LineController extends Controller
{
    //
    public function index()
    {
    	$lines = Line::orderBy('created', 'desc')->get();

    	return view('lines.index', ['lines' => $lines]);
    }

    public function details($id)
    {
    	$lines = Line::find($id);

    	return view('lines.details', ['lines' => $lines]);
    }

    public function add()
    {
    	return view('lines.add');
    }

    public function insert(Request $request)
    {
    	$this->validate($request, [
    		'series_no_line'   => 'required',
    		'date_line'        => 'required',
    		'wiwo_line'		   => 'required',
    		'recruiter_line'   => 'required',
    		'line_result'      => 'required',
    		'line_reason'      => 'required',
    		'line_subreason'   => 'required',
    	]);

    	$lineData = $request->all();

    	Line::find($id)->update($lineData);

    	Session::flash('success_msg', 'Information updated successfully');

    	return redirect()->route('lines.index');
    }

    public function delete($id)
    {
    	Line::find($id)->delete();

    	Session::flash('success_msg', 'Information deleted successfully');

    	return redirect()->route('lines.index');
    }
}

