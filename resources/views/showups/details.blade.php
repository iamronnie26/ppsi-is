@extends('layouts.appShowup')
@section('content')

<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="position: absolute;left: 300px;background-color:#000080; width: 1065px">
  
    <a class="navbar-brand" href="#"> &nbsp; &nbsp; PPSI Integrated Software</a>
  <ul class="navbar-nav">
     </ul>
</nav>
<br/><br/>


<div style="position:absolute; left:327px">
 <div class="card" style="width: 1000px">
    <div class="card-image waves-effect waves-block waves-light">
    	 <div class="card-panel" style="background-color:#191970">
					<h4><font color="white">Add New Applicant</font></h4></div>&nbsp; <a href="{{ route('showups.index') }}" class="label label-primary pull-right"><button type="button" class="btn btn-dark">Back</button></a><br/><br/>

      <img class="activator" src="{{URL::to('images/logo.png')}}" style="width: 100px; height: 100px; left: 30px;">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4"></span>

<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Series Number:</strong>
			{{ $showups->series_no }}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Applicant's Fullname:</strong>
			{{ $showups->firstname }}  {{ $showups->middlename }}  {{ $showups->lastname }}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group"> 
			 <strong>Position Applying:</strong>
			 {{ $showups->position_applying }}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Created:</strong>
			{{ $showups->created }}
		</div>
	</div>
</div>
@endsection