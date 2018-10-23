@extends('layouts.appTQ')
@extends('layouts.nav')

@section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Read TQ Details</h2>
		</div>
		<div class="pull-right">
			<a href="{{ route('intern.index') }}" class="label label-primary pull-right"><button type="button" class="btn btn-dark">Back</button></a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Series Number TQ:</strong>
			{{ $tqs->series_no_tq }}  
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Date TQ:</strong>
			{{ $tqs->date_date_tq }}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>WIWO TQ:</strong>
			{{ $tqs->wiwo_tq }}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Recruiter TQ:</strong>
			{{ $tqs->recruiter_tq }}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Result TQ:</strong>
			{{ $tqs->tq_result }}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Reason TQ:</strong>
			{{ $tqs->tq_reason }}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Sub Reason TQ:</strong>
			{{ $tqs->tq_subreason }}
		</div>
	</div>
</div>
@endsection