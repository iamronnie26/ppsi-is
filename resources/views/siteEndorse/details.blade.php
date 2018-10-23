@extends('layouts.app')
@extends('layouts.nav')

@section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Read Site Endorse</h2>
		</div>
		<div class="pull-right">
			<a href="{{ route('siteEndorse.index') }}" class="label label-primary pull-right">Back</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group"> 
			 <strong>Site Endorse Name:</strong>
			 {{ $siteEndorses->site_endorse }}
		</div>
	</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group"> 
			 <strong>Created:</strong>
			 {{ $siteEndorses->created }}
		</div>
	</div>
</div>
@endsection