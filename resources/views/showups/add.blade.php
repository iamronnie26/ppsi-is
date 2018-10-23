@extends('layouts.appShowup')
@extends('layouts.nav')
@section('content')
<div class="row">
	<div class="col-lg-12">
		@if($errors->any())
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
			<p>{{ $error }}</p>
		@endforeach()
	</div>
	@endif
	<div class="card" style="max-width: 100rem;">
		 <h3 class="card-header">Add a New User Profile <a href="{{ route('showups.index') }}" class="label label-primary pull-right"><button type="button" class="btn btn-dark">Back</button></a></h3>
<div class="card-body">
<h4 class="card-title"></h4>
<p class="card-text"><form action="{{ route('showups.insert') }}" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				<div class="form-group">
					<label class="control-label col-sm-2">Series Number</label>
					<div class="col-sm-12">
						<input type="text " name="series_no" id="series_no" value="PPSI-" class="form-control" readonly="">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Date</label>
					<div class="col-sm-12">
						<input type="date " name="date" id="date" class="form-control" readonly="">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Time</label>
					<div class="col-sm-12">
						<input type="text " name="time" id="time" class="form-control" value="" readonly="">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Firstname</label>
					<div class="col-sm-12">
						<input type="text " name="firstname" id="firstname" class="form-control" placeholder="Enter Firstname">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Middlename</label>
					<div class="col-sm-12">
						<input type="text " name="middlename" id="middlename" class="form-control" placeholder="Enter Middlename">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Lastname</label>
					<div class="col-sm-12">
						<input type="text " name="lastname" id="lastname" class="form-control" placeholder="Enter Lastname">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Contact Number</label>
					<div class="col-sm-12">
						<input type="number " name="contact_no" id="contact_no" class="form-control" placeholder="Enter Contact Number">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-6">Position Applying</label>
					<div class="col-sm-12">
						<input type="text " name="position_applying" id="position_applying" class="form-control" placeholder=" Enter Position Applying">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Contact Person</label>
				<div class="col-sm-12">
				<style>
		            select:invalid { color: gray; }
		            option:invalid { color: white; }
		         </style>
				<select class="custom-select" name="contact_person" id='contact_person'>
				  <option value="" disabled selected hidden>Please Choose Contact Person...</option>
                  <optgroup label="Please Select..">

                    @foreach ($contactPersons as $contactPerson)
				        <option value="{{ $contactPerson->id }}">{{ $contactPerson->firstname }} . {{ $contactPerson->middlename }} . {{ $contactPerson->lastname }}</option>
				    @endforeach
				</select>
				
				</div>
				<div class="form-group">
					<label class="control-label col-sm-6">Call Center Experience</label>
					<div class="col-sm-12">
						<input type="number " name="contact_experience" id="contact_experience" class="form-control" placeholder="Enter Call Center Experience">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-6">Educational Attainment</label>
				<div class="col-sm-12">
				<style>
		            select:invalid { color: gray; }
		            option:invalid { color: white; }
		         </style>
				<select class="custom-select" id='keyword' name="educational_attainment" id='educational_attainment'>
				  <option value="" disabled selected hidden>Please Choose Educational Attainment...</option>
                  <optgroup label="Please Select..">
				  <option value="1">HIGH SCHOOL GRADUATE</option>
				  <option value="2">VOCATIONAL GRADUATE</option>
				  <option value="3">UNDERGRADUATE</option>
				  <option value="4">COLLEGE GRADUATE</option>
				</select>
				</div>
			<div class="form-group">
					<label class="control-label col-sm-2">Work Status</label>
				<div class="col-sm-12">
				<style>
		            select:invalid { color: gray; }
		            option:invalid { color: white; }
		         </style>
				<select class="custom-select" name="work_status" id='work_status'>
				  <option value="" disabled selected hidden>Please Choose Work Status...</option>
                  <optgroup label="Please Select..">
				  <option value="1">JOB</option>
				  <option value="2">INTERNAL</option>
				  <option value="3">UNDERGRADUATE</option>
				</select>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Last School Year</label>
					<div class="col-sm-12">
						<input type="number " name="last_year_attended" id="last_year_attended" class="form-control" placeholder="Enter Last School Year">
					</div>
				</div>
			</div>
			</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" class="btn btn-default" value="Add Post">
					</div>
				</div>
			</form></p>
</div>
</div>


@endsection