@extends('layouts.appInterview')
@section('content')

<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="position: absolute;left: 300px;background-color:#000080; width: 1060px">
  
    <a class="navbar-brand" href="#"> &nbsp; &nbsp; PPSI Integrated Software</a>
  <ul class="navbar-nav">
     </ul>
</nav>

<!-- <img class="materialboxed" 
     width="1049" 
     height="180" 
     src="{{URL::to('/images/PPSIBANNER.jpg')}}" style="position: absolute; left:300px"> -->

<div class="row">
	<div class="col-lg-12">
		@if($errors->any())
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
			<p>{{ $error }}</p>
		@endforeach()
	</div>
	@endif
<br/><br/><br/>

<div style="position:absolute; left:368px" class="container">
	<div class="card" style="max-width: 150rem;">
		 <div class="card-panel" style="background-color:#191970">
					<h4><font color="white">Add New Applicant</font></h4></div>&nbsp; <a href="{{ route('recept.index') }}" class="label label-primary pull-right"><button type="button" class="btn btn-dark">Back</button></a>
<div class="card-body">
<h4 class="card-title"></h4>
<p class="card-text"><form action="{{ route('recept.insert') }}" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				<div class="row">
					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="series_no" placeholder=" Enter Series Number" class="validate" id="icon_prefix">
						<label for="series_no">Series Number</label>
					</div>
					<div class="input-field col s6">
						<i class="material-icons prefix">date_range</i>
						<input type="text" name="date" placeholder=" Enter Date" class="validate" id="icon_prefix">
						<label for="datq e">Date</label>
					</div>
					<div class="input-field col s6">
						<i class="material-icons prefix">schedule</i>
						<input type="text" name="time" placeholder=" Enter Time" class="validate" id="icon_prefix">
						<label for="time">Time</label>
					</div>
					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="firstname" placeholder = "Enter Firstname" class="validate" id="icon_prefix">
						<label for="firstname">Firstname</label>
					</div>
					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="middlename" placeholder="Enter Middlename" class="validate" id="icon_prefix">
						<label for="middlename">Middlename</label>
					</div>
					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="lastname" placeholder="Enter Lastname" class="validate" id="icon_prefix">
						<label for="lastname">Lastname</label>
					</div>
					<div class="input-field col s6">
						<i class="material-icons prefix">local_phone</i>
						<input type="number" name="contact_no" placeholder="Enter Contact Number" class="validate" id="icon_prefix">
						<label for="contact_no">Contact Number</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">business_center</i>
						<input type="text" name="position_applying" placeholder="Enter Position Applying" class="validate" id="icon_prefix">
						<label for="position_applying">Position Applying</label>
					</div>
					
                    <div class = "input-field col s6">
                    	<i class="material-icons prefix">contacts</i>
                        <select name="contact_person" id="icon_prefix">
		                <option value = "" disabled selected></option>
		                @foreach ($contactPersons as $contactPerson)
				        <option value="{{ $contactPerson->id }}">{{ $contactPerson->firstname }}  {{ $contactPerson->middlename }}  {{ $contactPerson->lastname }}</option>
				         @endforeach
                        </select>  
                        <label for="contact_person">Contact Person</label>            
                   </div>

				  <div class="input-field col s6">
				  	<i class="material-icons prefix">business_center</i>
				  	<input type="number" name="contact_experience" placeholder="Enter Call Center Experience" class="validate" id="icon_prefix">
				  	<label for="contact_experience">Call Center Experience <font color="red">*</font> Year and Months </label>	
				  </div>

				  <div class = "input-field col s6"> 
				  	    <i class="material-icons prefix">school</i>
                        <select name="educational_attainment" id="icon_prefix">
		                <option value = "" disabled selected></option>
		               	<option>High School Graduate</option>
		               	<option>Vocational Graduate</option>
		               	<option>Undergraduate</option>
		               	<option>College Graduate</option>
                        </select>  
                        <label for="contact_person">Educational Attainment</label>            
                   </div>

                   <div class = "input-field col s6"> 
                   		<i class="material-icons prefix">business_center</i>
                        <select name="work_status" id="icon_prefix">
		                <option value = "" disabled selected></option>
		               	<option>Job</option>
		               	<option>Internal</option>
		               	<option>Training</option>
                        </select>  
                        <label for="contact_person">Work Status</label>            
                   </div>

			      <div class="input-field col s6">
			      	<i class="material-icons prefix">school</i>
			      	<input type="number" name="last_school_attended" placeholder="Enter Last School Year Attended" class="validate" id="icon_prefix">
			      	<label for="last_school_attended">Last School Year Attended</label>
			      </div>
			    </div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						&nbsp; &nbsp; <input type="submit" class="btn btn-default" value="Add Post">
					</div>
				</div>
				<br/><br/>
			</form></p> 
     </div>
</div>
</div>

@endsection
