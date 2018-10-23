@extends('layouts.app')
@extends('layouts.nav')

@section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Read Users Details</h2>
		</div>
		<div class="pull-right">
			<a href="{{ route('posts.index') }}" class="label label-primary pull-right"><button type="button" class="btn btn-dark">Back</button></a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Fullname:</strong>
			{{ $posts->fullname }}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Department:</strong>
			{{ $posts->department }}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Designation:</strong>
			{{ $posts->designation }}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>user Type:</strong>
			{{ $posts->usertype }}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group"> 
			 <strong>Published On:</strong>
			 {{ $posts->created }}
		</div>
	</div>
</div>
@endsection