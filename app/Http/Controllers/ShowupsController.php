<?php

namespace App\Http\Controllers;

use App\Showups;
use App\BusinessPartners;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class ShowupsController extends Controller
{
    //
  public function index()
   {
    $showups = Showups::orderBy('created', 'desc')->get();

    return view('showups.index', ['showups' => $showups]);
   }

   public function details($id)
   {

    $showups = Showups::find($id);

    return view('showups.details', ['showups' => $showups]);
   }

   public function add()
   {

    $businesspartners = BusinessPartners::all();
    $businesspartners = BusinessPartners::orderBy('businessPartner_name', 'desc');
    return view('showups.add')->with('businesspartners', $businesspartners);
   }

   public function insert(Request $request)
   {
    $this->validate($request, [
            'date'            => 'required',
            'firstname'       => 'required',
            'middlename'      => 'required',
            'lastname'        => 'required',
            'contactNo'       => 'required',
            'school'          => 'required',
            'course'          => 'required',
            'ojt_hours'       => 'required',
            'source'          => 'required',
            'contact_person'  => 'required',
            'department'      => 'required',
            'remarks'         => 'required',
            'comments'        => 'required',
    ]);

    $showupData = $request->all();

    Showups::create('success_msg', 'Applicant added successfully');

    return redirect()->route('showups.index');
   }

   public function edit($id)
   {
    $showups = Showups::find($id);
    $businesspartners = BusinessPartners::all();
    $businesspartners = BusinessPartners::orderBy('businessPartner_name', 'desc');
    return view('showups.edit', ['showups' => $showups])->with('businesspartners', $businesspartners);
   }

   public function update($id, Request $request)
   {
    // $this->validate($request, [
    //         'date'             => 'required',
    //         'firstname'        => 'required',
    //         'middlename'       => 'required',
    //         'lastname'         => 'required',
    //         'contactNo'        => 'required',
    //         'school'           => 'required',
    //         'course'           => 'required',
    //         'ojt_hours'        => 'required',
    //         'source'           => 'required',
    //         'contact_person'   => 'required',
    //         'department'       => 'required',
    //         'remarks'          => 'required',
    //         'comments'         => 'required',
    //         'activity'         => 'required',
    //         'business_partner' => 'required',
    //         'site_endorsed'    => 'required',
    //         'endorsed'         => 'required',
    //         'ppsi'             => 'required',
    //         'birthdate'        => 'required',
    //         'email_address'    => 'required',
    //         'address'          => 'required',
    //         'nationality'      => 'required',
    //         'gender'           => 'required',
    //         'marital_status'   => 'required',
    //         'course'           => 'required',
    //         'school'           => 'required',
    //         'year_graduation'  => 'required',
    // ]);

    $showupData = $request->all();

    Showups::find($id)->update($showupData);

    Session::flash('success_msg', 'Applicant updated successfully');

    return redirect()->route('showups.index');
   }

   public function delete($id)
   {
    Showup::find($id)->delete();

    Session::flash('success_msg', 'Applicant deleted successfully');

    return redirect()->route('showups.index');
   }
}
