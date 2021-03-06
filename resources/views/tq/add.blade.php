@extends('layouts.appIntern')
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
		 <h3 class="card-header">Add a New TQ Information <a href="{{ route('tqs.index') }}" class="label label-primary pull-right"><button type="button" class="btn btn-dark">Back</button></a></h3>
<div class="card-body">
<h4 class="card-title"></h4>
<p class="card-text"><form action="{{ route('tqs.insert') }}" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				<div class="form-group">
					<label class="control-label col-sm-2">Series No. TQ:</label>
					<div class="col-sm-12">
						<input type="text " name="series_no_tq" id="series_no_tq" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Date TQ:</label>
					<div class="col-sm-12">
						<input type="text " name="date_tq" id="date_tq" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">WIWO TQ:</label>
					<div class="col-sm-12">
						<input type="text " name="wiwo_tq" id="wiwo_tq" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Recruiter TQ:</label>
					<div class="col-sm-12">
						<input type="text " name="recruiter_tq" id="recruiter_tq" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">TQ Result:</label>
					<div class="col-sm-12">
						<input type="number " name="tq_result" id="tq_result" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">TQ Reason:</label>
					<div class="col-sm-12">
						<input type="school " name="tq_reason" id="tq_reason" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">TQ Sub Reason:</label>
					<div class="col-sm-12">
						<input type="text " name="tq_subreason" id="tq_subreason" class="form-control">
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