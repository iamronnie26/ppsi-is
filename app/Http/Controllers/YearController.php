<?php

namespace App\Http\Controllers;

use App\Year;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Session;

class YearController extends Controller
{
    //
    public function index(){
        $years = Year::orderBy('created', 'desc')->get();

        return view('year.index', ['years' => $years]);
    }

    public function details($id){
        $years = Year::find($id);

        return view('year.details', ['years' => $years]);
    }

    public function add(){
        return view('year.add');
    }

    public function insert(Request $request){
        $this->validate($request,[
            'year'     => 'required',
        ]);

        $yearData = $request->all();

        Year::create($yearData);

        Session::flash('success_msg', 'Year added successfully');

        return redirect()->route('years.index');
    }

    public function edit($id){
        $years = Year::find($id);

        return view('year.edit', ['year' => $years]);
    }

    public function update($id, Request $request){
        $this->validate($request, [
            'year'     => 'required',
        ]);

        $yearData = $request->all();

        Year::find($id)->update($yearData);

        Session::flash('success_msg', 'Year updated successfully');

        return redirect()->route('year.index');
    }

    public function delete($id){
        Year::find($id)->delete();

        Session::flash('success_msg', 'Year deleted successfully!');

        return redirect()->route('years.index');
    }
}
