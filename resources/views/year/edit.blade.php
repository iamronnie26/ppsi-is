@extends('layouts.appYear')
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
				Edit Post <a href="{{ route('year.index') }}" class="label label-primary pull-right">Back</a>
			</div>
			<div class="panel-body">
				<form action="{{ route('year.update', $year->id) }}" method="POST" class="form-horizontal">
					{{ csrf_field() }}
					<div class="form-group">
						<label class="control-label col-sm-2">Year</label>
						<div class="col-sm-12">
							<input type="text" name="year" id="year" class="form-control" value="{{ $year->year }}">
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