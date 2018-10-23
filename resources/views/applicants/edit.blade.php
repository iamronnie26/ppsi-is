@extends('layouts.app')

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
		<div class="panel panel-default">
			<div class="panel-heading">
				Edit Post <a href="{{ route('applicants.index') }}" class="label label-primary pull-right">Back</a>
			</div>
			<div class="panel-body">
				<form action="{{ route('applicants.update', $applicants->id) }}" method="POST" class="form-horizontal">
					{{ csrf_field() }}
					<div class="form-group">
						<label class="control-label col-sm-2">Series Number</label>
						<div class="col-sm-12">
							<input type="text" name="series_no" id="series_no" class="form-control" value="{{ $applicants->series_no }}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Date</label>
						<div class="col-sm-12">
							<input type="text" name="date" id="date" class="form-control" value="{{ $applicants->date }}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Time</label>
						<div class="col-sm-12">
							<input type="text" name="time" id="time" class="form-control" value="{{ $applicants->time }}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Firstname</label>
						<div class="col-sm-12">
							<input type="text" name="firstname" id="firstname" class="form-control" value="{{ $applicants->firstname }}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Middlename</label>
						<div class="col-sm-12">
							<input type="text" name="middlename" id="middlename" class="form-control" value="{{ $applicants->middlename }}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Lastname</label>
						<div class="col-sm-12">
							<input type="text" name="lastname" id="lastname" class="form-control" value="{{ $applicants->lastname }}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Contact Number</label>
						<div class="col-sm-12">
							<input type="text" name="contact_no" id="contact_no" class="form-control" value="{{ $applicants->contact_no }}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Position Applying</label>
						<div class="col-sm-12">
							<input type="text" name="position_applying" id="position_applying" class="form-control" value="{{ $applicants->position_applying }}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Contact Person</label>
						<div class="col-sm-12">
							<input type="text" name="contact_person" id="contact_person" class="form-control" value="{{ $applicants->contact_person }}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Call Center Experience</label>
						<div class="col-sm-12">
							<input type="text" name="contact_experience" id="contact_experience" class="form-control" value="{{ $applicants->contact_experience }}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Educational Attainment </label>
						<div class="col-sm-12">
							<input type="text" name="educational_attainment" id="educational_attainment" class="form-control" value="{{ $applicants->educational_attainment }}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Lsst School Year</label>
						<div class="col-sm-12">
							<input type="text" name="last_year_attended" id="last_year_attended" class="form-control" value="{{ $applicants->last_year_attended }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="submit" class="btn btn-default" value="Update Post">
						</div>
					</div>
				</form>
			</div>
			</div>
	</div>
</div>
@endsection
