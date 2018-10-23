@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Read Post</h2>
		</div>
		<div class="pull-right">
			<a href="{{ route('contactPersons.index') }}" class="label label-primary pull-right">Back</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Fullname</strong>
			{{ $contactPersons->firstname }} . {{ $contactPersons->middlename }} . {{ contactPersons->lastname }}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group"> 
			 <strong>Published On:</strong>
			 {{ $post->created }}
		</div>
	</div>
</div>
@endsection