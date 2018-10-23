@extends('layouts.app')
@extends('layouts.nav')
@section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Read Post</h2>
		</div>
		<div class="pull-right">
			<a href="{{ route('applicants.index') }}" class="label label-primary pull-right"><button type="button" class="btn btn-dark">Back</button></a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Series Number:</strong>
			{{ $applicants->series_no }}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Applicant's Fullname:</strong>
			{{ $applicants->firstname }}  {{ $applicants->middlename }}  {{ $applicants->lastname }}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group"> 
			 <strong>Position Applying:</strong>
			 {{ $applicants->position_applying }}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Created:</strong>
			{{ $applicants->created }}
		</div>
	</div>
</div>
@endsection