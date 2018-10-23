@extends('layouts.appInterview')
@section('content')

<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="position: absolute;left: 300px;background-color:#000080; width: 1065px">
  
    <a class="navbar-brand" href="#"> &nbsp; &nbsp; PPSI Integrated Software</a>
  <ul class="navbar-nav">
     </ul>
</nav>

<!-- <img class="materialboxed" 
     width="1049" 
     height="180" 
     src="{{URL::to('/images/PPSIBANNER.jpg')}}" style="position: absolute; left:300px">-->
     <br/><br/><br/><br/>

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
			<div style="position:absolute; left:350px" class="container">
			<div class="card-panel" style="background-color:#191970">
					<h4><font color="white">Edit Applicant's Information</font></h4></div>&nbsp; <a href="{{ route('recept.index') }}" class="label label-primary pull-right"><button type="button" class="btn btn-dark">Back</button></a><br/><br/>
			<div class="panel-body">
				<form action="{{ route('recept.update', $receptionist->id) }}" method="POST" class="form-horizontal">
					{{ csrf_field() }}

					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="number" name="series_no" placeholder="Series Number" id="icon_prefix" value="{{ $receptionist->series_no }}" readonly="">
						<label for="series_no">Series Number:</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">date_range</i>
						<input type="text" name="date" placeholder="Date" id="icon_prefix" value="{{ $receptionist->date }}" readonly="">
						<label for="date">Date:</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">schedule</i>
						<input type="text" name="time" placeholder="Time" id="icon_prefix" value="{{ $receptionist->time }}" readonly=" ">
						<label for="time">Time:</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="firstname" placeholder="Firstname" id="icon_prefix" value="{{ $receptionist->firstname }}">
						<label for="firstname">Firstname</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="middlename" placeholder="Middlename" id="icon_prefix" value="{{ $receptionist->middlename }}">
						<label for="middlename">Middlename</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="lastname" placeholder="Lastname" id="icon_prefix" value="{{ $receptionist->lastname }}">
						<label for="lastname">Lastname</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">local_phone</i>
						<input type="text" name="contact_no" placeholder="Contact Number" id="icon_prefix" value="{{ $receptionist->contact_no }}">
						<label for="contact_no">Contact Number</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">business_center</i>
						<input type="text" name="position_applying" placeholder="Position Applying" id="icon_prefix" value="{{ $receptionist->position_applying }}">
						<label for="position_applying">Position Applying</label>
					</div>
					
					<div class="input-field col s6">
						<i class="material-icons prefix">contacts</i>
						<input type="text" name="contact_person" placeholder="Contact Person" id="icon_prefix" value="{{ $receptionist->contact_person }}">
						<label for="contact_person">Contact Person</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">business_center</i>
						<input type="text" name="contact_experience" placeholder="Call Center Experience" id="icon_prefix" value="{{ $receptionist->contact_experience }}">
						<label for="contact_experience">Call Center Experience</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">school</i>
						<input type="text" name="educational_attainment" placeholder="Educational Attainment" id="icon_prefix" value="{{ $receptionist->educational_attainment }}">
						<label for="educational_attainment">Educational Attainment</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">business_center</i>
						<input type="text" name="last_year_attended" placeholder="Last School Year Attended" id="icon_prefix" value="{{ $receptionist->last_year_attended }}">
						<label for="last_year_attended">Last School Year Attended</label>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="submit" class="btn btn-default" value="Update Post">
						</div>
					</div>
				</form>
				<br/>
			</div>
			</div>
		</div>
	</div>
	</div>
</div>
@endsection