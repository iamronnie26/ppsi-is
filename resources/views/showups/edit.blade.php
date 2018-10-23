@extends('layouts.appShowup')
@section('content')

<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="position: absolute;left: 300px;background-color:#000080; width: 1065px">
  
    <a class="navbar-brand" href="#"> &nbsp; &nbsp; PPSI Integrated Software</a>
  <ul class="navbar-nav">
     </ul>
</nav>
<br/><br/><br/>

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
					<h4><font color="white">Edit Applicant's Information</font></h4></div>&nbsp; <a href="{{ route('showups.index') }}" class="label label-primary pull-right"><button type="button" class="btn btn-dark">Back</button></a><br/><br/>
			<div class="panel-body">
				<form action="{{ route('showups.update', $showups->id) }}" method="POST" class="form-horizontal">
					
					{{ csrf_field() }}

					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="number" name="series_no" placeholder="Series Number" id="icon_prefix" value="{{ $showups->series_no }}" readonly="">
						<label for="series_no">Series Number</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="date" placeholder="Date" id="icon_prefix" value="{{ $showups->date }}" readonly="">
						<label for="date">Date</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="time" placeholder="Time" id="icon_prefix" value="{{ $showups->time }}" readonly="">
						<label for="time">Time</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="firstname" placeholder="Firstname" id="icon_prefix" value="{{ $showups->firstname }}" readonly="">
						<label for="firstname">Firstname</label>
					</div>
					
					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="middlename" placeholder="Middlename" id="icon_prefix" value="{{ $showups->middlename }}" readonly="">
						<label for="middlename">Middlename</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="Lastname" placeholder="Lastname" id="icon_prefix" value="{{ $showups->lastname }}" readonly="">
						<label for="lastname">Lastname</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">local_phone</i>
						<input type="number" name="contact_no" placeholder="Contact Number" id="icon_prefix" value="{{ $showups->contact_no }}" readonly="">
						<label for="contact_no">Contact Number</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">work</i>
						<input type="text" name="position_applying" placeholder="Position Applying" id="icon_prefix" value="{{ $showups->position_applying }}" readonly="">
						<label for="position_applying">Position Applying</label>
					</div>

					
					<div class="input-field col s6">
						<i class="material-icons prefix">contacts</i>
						<input type="text" name="contact_person" placeholder="Contact Person" id="icon_prefix" value="{{ $showups->contact_person }}" readonly="">
						<label for="contact_person">Contact Person</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">business_center</i>
						<input type="text" name="contact_experience" placeholder="Call Center Experience" id="icon_prefix" value="{{ $showups->contact_experience }}" readonly="">
						<label for="contact_experience">Call Center Experience</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">school</i>
						<input type="text" name="educational_attainment" placeholder="Educational Attainment" id="icon_prefix" value="{{ $showups->eudcational_attainment}}" readonly="">
						<label for="educational_attainment">Educational Attainment</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">school</i>
						<input type="text" name="last_year_attended" placeholder="Last School Year Attended" id="icon_prefix" value="{{ $showups->last_year_attended }}" readonly="">
						<label for="last_year_attended">Last School Year Attended</label>
					</div>

					 <div class = "input-field col s6"> 
				  	    <i class="material-icons prefix">business_center</i>
                        <select name="activity" id="icon_prefix">
		                <option value = "" disabled selected></option>
		               	<option>ONSITE ACTIVITY</option>
		               	<option>DIRECT ENDORSED</option>
		               	<option>REMOTE ACTIVITY</option>
                        </select>  
                        <label for="activity">Activity</label>            
                   </div>

                   <div class="input-field col s6">
                   	<i class="material-icons prefix">business_center</i>
                   	<select name="business_partner" id="icon_prefix">
                   		<option value="" disabled selected></option>
                   		<option>ALORICA</option>
				        <option>CITI BANK</option>
				        <option>C3</option>
				        <option>STELLAR</option>
				        <option>SITEL</option>
				        <option>TELEPERFORMANCE</option>
				        <option>TRANSCOM</option>
				    </select>
				    <label for="business_partner">Business Partner</label>
				</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">business_center</i>
						<input type="text" name="site_endorsed" placeholder="Enter Site Endorsed" id="icon_prefix">
						<label for="site_endorsed">Site Endorsed</label>
					</div>
					
					<div class="input-field col s6">
						<i class="material-icons prefix">business_center</i>
						<input type="text" name="endorsed" placeholder="Enter Endorsed" id="icon_prefix">
						<label for="endorsed">Endorsed</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">business_center</i>
						<input type="text" name="ppsi" placeholder="PPSI" id="icon_prefix">
						<label for="ppsi">PPSI</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">date_range</i>
						<input type="text" name="text" placeholder="Enter Birthdate" id="icon_prefix">
						<label for="birthdate">Birthdate</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">email</i>
						<input type="text" name="email_address" placeholder="Enter Email Address" id="icon_prefix">
						<label for="email_address">Email Address</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">location_city</i>
						<input type="text" name="address" placeholder="Enter Address" id="icon_prefix">
						<label for="address">Address</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">people</i>
						<input type="text" name="nationality" placeholder="Enter Nationality" id="icon_prefix">
						<label for="nationality">Nationality</label>
					</div>

					
					<div class="input-field col s6">
                   	<i class="material-icons prefix">people</i>
                   	<select name="gender" id="icon_prefix">
                   		<option value="" disabled selected></option>
                   		<option>FEMALE</option>
				        <option>MALE</option>
				    </select>
				    <label for="gender">Gender</label>
				</div>

					<div class="input-field col s6">
                   	<i class="material-icons prefix">peeple</i>
                   	<select name="marital_status" id="icon_prefix">
                   		<option value="" disabled selected></option>
                   		<option>SINGLE</option>
				        <option>MARRIED</option>
				        <option>DIVORCED</option>
				        <option>WIDOW</option>				    
				    </select>
				    <label for="marital_status">Marital Status</label>
				</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">school</i>
						<input type="text" name="course" placeholder="Enter Course" id="icon_prefix">
						<label for="course">Course</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">school</i>
						<input type="text" name="school" placeholder="Enter School" id="icon_prefix">
						<label for="school">Enter School</label>
 					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">school</i>
						<input type="text" name="year_graduated" placeholder="Enter Year Graduated" id="icon_prefix">
						<label for="year_graduated">Year Graduated</label>
                    </div>
					<div class="input-field col s6">
                   	<i class="material-icons prefix">people</i>
                   	<select name="remarks" id="icon_prefix">
                   		<option value="" disabled selected></option>
                   		<option>PASSED</option>
				        <option>FAILED</option>
				        <option>ACTIVE FILE</option>			    
				    </select>
				    <label for="remarks">Remarks</label>
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