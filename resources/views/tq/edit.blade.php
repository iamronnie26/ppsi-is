@extends('layouts.appTQ')
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
		<div class="panel panel-default">
			<div class="panel-heading">
				Edit Post <a href="{{ route('tqs.index') }}" class="label label-primary pull-right"><button type="button" class="btn btn-dark">Back</button></a>
			</div>
			<div class="panel-body">
				<form action="{{ route('tqs.update', $tq->id) }}" method="POST" class="form-horizontal">
					{{ csrf_field() }}
					<div class="form-group">
						<label class="control-label col-sm-6">Series Number TQ:</label>
						<div class="col-sm-12">
							<input type="text" name="series_no_tq" id="series_no_tq" class="form-control" value="{{ $tq->series_no_tq }}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Date TQ:</label>
						<div class="col-sm-12">
							<input type="text" name="date_tq" id="date_tq" class="form-control" value="{{ $tq->date_tq }}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">WIWO TQ:</label>
						<div class="col-sm-12">
							<input type="text" name="wiwo_tq" id="wiwo_tq" class="form-control" value="{{ $tq->wiwo_tq }}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Recruiter TQ:</label>
						<div class="col-sm-12">
							<input type="text" name="recruiter_tq" id="recruiter_tq" class="form-control" value="{{ $tq->recruiter_tq }}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">TQ Result:</label>
						<div class="col-sm-12">
							<input type="text" name="tq_result" id="tq_result" class="form-control" value="{{ $tq->tq_result }}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">TQ Reason:</label>
						<div class="col-sm-12">
							<input type="text" name="tq_reason" id="tq_reason" class="form-control" value="{{ $tq->reason }}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">TQ Subreason:</label>
						<div class="col-sm-12">
							<input type="text" name="tq_subreason" id="tq_subreason" class="form-control" value="{{ $tq->tq_subreason }}">
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