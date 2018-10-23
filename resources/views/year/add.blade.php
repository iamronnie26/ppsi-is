@extends('layouts.appYear')

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
		 <h3 class="card-header">Add a New Year <a href="{{ route('years.index') }}" class="label label-primary pull-right">Back</a></h3>
	<div class="card-body">
	<h4 class="card-title"></h4>
<p class="card-text"><form action="{{ route('years.insert') }}" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				<div class="form-group">
					<label class="control-label col-sm-2">Year</label>
					<div class="col-sm-12">
						<input type="number " name="year" id="year" class="form-control">
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