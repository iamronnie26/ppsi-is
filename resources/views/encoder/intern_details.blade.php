@extends('layouts.appEncoder')

@section('title','Intern Details')

@section('content')
<div class="card" id="detailsCard">
	<div class="card-content" style="height:500px!important;">
		<div class="card-title row">
		<span class="col s8">Intern's Details</span>
		<div class="col s4">
		<div class="right">
			<a href="{{route('encoder.internsToday')}}" class="btn" id="btnEdit">Back</a>
			<button class="btn" type="submit" disabled id="btnSave">Save</button>
			<script>
				$(function(){
					$("#internDetails").change(function(){
						$("#btnSave").removeAttr('disabled');
					});
				});
			</script>
		</div>
		</div>
		</div>
		<div class="row">


		<form id="internDetails">

            <div class="input-field col s4 offset-s8">
                <input type="text" readonly id="date_created" value="{{$intern->created}}" name="date_creatd">
                <label for="date_created"> Date Applied </label>
            </div>
			<div class="input-field col s4">
				<input id="first_name" value="{{$intern->firstname}}" type="text" name="firstname">
				<label for="first_name">First Name</label>
			</div>
			<div class="input-field col s4">
				<input id="middle_name" type="text" value="{{$intern->middlename}}" name="middlename">
				<label for="middle_name">Middle Name</label>
			</div>
			<div class="input-field col s4">
				<input id="last_name" type="text" value="{{$intern->lastname}}" name="lastname">
				<label for="last_name">Last Name</label>
			</div>
			
            <div class="input-field col s5">
				<input id="contact_no" type="text" value="{{$intern->contact_no}}" name="contact_no">
				<label for="contact_no">Contact Number</label>
			</div>
            <div class="input-field col s5">
                <input type="text" id="course" value="{{$intern->course}}" name="course">
                <label for="course"> Course </label>
            </div>
            <div class="input-field col s2  ">
                <input type="number" id="ojt_hours" value="{{$intern->ojt_hours}}" name="ojt_hours">
                <label for="ojt_hours"> OJT Hours </label>
            </div>


            <div class="input-field col s6">
			@if($intern->school)
                <input type="text" id="school" value="{{$intern->school->school_name}}" name="school_name">
			@else
				<input type="text" id="school" name="school_name">
			@endif
                <label for="school"> School Name </label>
            </div>
            <div class="input-field col s6">
			@if($intern->school)
			<input type="text" id="school_address" value="{{$intern->school->school_address}}" name="school_address">
			@else
                <input type="text" id="school_address" name="school_address">
			@endif
                <label for="school_address"> School Address </label>
            </div>
        		
		</form>


	  </div>

	</div>
</div>
@endsection