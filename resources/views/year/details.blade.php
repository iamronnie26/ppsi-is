@extends('layouts.appYear')
@extends('layouts.nav')
@section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Read Year</h2>
		</div>
		<div class="pull-right">
			<a href="{{ route('year.index') }}" class="label label-primary pull-right">Back</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group"> 
			 <strong>Created:</strong>
			 {{ $years->created }}
		</div>
	</div>
</div>
@endsection