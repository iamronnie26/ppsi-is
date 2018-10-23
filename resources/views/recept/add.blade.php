@extends('layouts.appRecept')
@section('title', 'Add | Reception')
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

<div class="row main">
	<div class="col s12 m12 19">
		<br/>
		<div class="card maincard" style="margin-left:10px!important;">
			<div class="card-content">
				<span class="card-title">Add New Applicant's Information</span>
				<div class="row">
					<div class="col s12">


								<div class="col s12 m12 centered" id="controls">
									<a href="{{ route('recept.index') }}" class="btn"><i class="small material-icons">arrow_back_ios</i><span>BACK</span></a><br/><br/>
								</div>
				
					</div>
				</div>

		<form action="{{ route('recept.insert') }}" method="POST" class="form-horizontal" id="addUser">
				{{ csrf_field() }}
				{{method_field('PUT')}}

				 <script>
			         $(document).ready(function() {
			            $('select').formSelect();
			         });
		        </script>

				<div class="row">
					<div class="col s12">
						<div class="table-centered">

							<!-- <div class = "input-field col s6">
							<label for = "Profile_Image">Profile Image</label>
							<div style="margin-bottom: 10px;"><br/><br/>
							<center><img id="profile" src="{{URL::to('/images/default.JPG')}}" style="width:280px;
																									height:280px;
																									border-radius: 50%;
																									box-shadow: 0px 2px 10px
																									black;"></center><br/>
							<div style="margin-bottom: 10px;"></br>
							<center><input type="file"
										onchange="document.getElementById('profile').src = window.URL.createObjectURL(this.files[0])"
										name="user_image"
										id="files"></center></td><br/>
								</div></div>
						    </div> -->

					 		<div class="input-field col s6">
								<i class="material-icons prefix">queue</i>
								@if($series_no)
									<input type="text" name="series_no" readonly value="{{$series_no}}" class="validate" id="icon_prefix" required>
					 			@else
								 	<input type="text" name="series_no" readonly class="validate" id="icon_prefix" required>
								@endif
								<label for="series_no">Series Number</label>
						    </div>

							<div class="input-field col s6">
								<i class="material-icons prefix">watch</i>
								<input type="text"
									   name="created"
									   value="{{$now}}"
									   class="validate"
									   id="icon_prefix"
									   readonly>

								<label for="created">Time</label>
					 		</div>

							<div class="input-field col s6">
								<i class="material-icons prefix">account_circle</i>
								@if($firstname)
									<input type="text" name="firstname" value="{{$firstname}}" placeholder="Enter First Name" class="validate" id="icon_prefix" required>
					 			@else
								 	<input type="text" name="firstname"  placeholder="Enter First Name" class="validate" id="icon_prefix" required>
								@endif
								<label for="firstname">Firstname</label>
						    </div>

							<div class="input-field col s6">
								<i class="material-icons prefix">account_circle</i>
								@if($middlename)
									<input type="text" name="middlename" value="{{$middlename}}" placeholder="Enter Middle Name" class="validate" id="icon_prefix" required>
					 			@else
								 	<input type="text" name="middlename"  placeholder="Enter Middle Name" class="validate" id="icon_prefix" required>
								@endif
								<label for="middlename">Middlename</label>
						    </div>

							<div class="input-field col s6">
								<i class="material-icons prefix">account_circle</i>
								@if($lastname)
									<input type="text" name="lastname" value="{{$lastname}}" placeholder="Enter Last Name" class="validate" id="icon_prefix" required>
					 			@else
								 	<input type="text" name="lastname"  placeholder="Enter Last Name" class="validate" id="icon_prefix" required>
								@endif
								<label for="lastname">Lastname</label>
						    </div>

							<div class="input-field col s6">
								<i class="material-icons prefix">contacts</i>
								@if($contact_no)
									<input type="text" name="contact_no" id="phonefield" placeholder="Enter Contact Number" maxlength="11" class="validate" value="{{$contact_no}}" onkeyup=" return validatephone(this.value); " required>
								@else
									<input type="text" name="contact_no" id="phonefield" placeholder="Enter Contact Number" maxlength="11" class="validate" onkeyup=" return validatephone(this.value); " required>
								@endif
								<label for="contact_no">Contact Number</label>
						    </div>

							<div class="input-field col s6" id="icon_prefix">
								<i class="material-icons prefix" >work</i>
								
								<input type="text" name="position_applying"  placeholder="Enter Position Applying" class="validate" id="icon_prefix" required>
								
								<label for="position_applying" >Position Applying</label>
						    </div>

							<div class="input-field col s6">
							<div class="col-sm-12">
							<style>
								select:invalid { color: gray; }
								option:invalid { color: white; }
							</style>
							<select class="custom-select" class="icon_prefix"  name="contact_id" id='contact_person'>
							<option   disabled selected hidden>Please Choose Contact Person...</option>
								@foreach ($contactPersons as $contactPerson)
									<option value="{{ $contactPerson->id }}">{{ $contactPerson->firstname }}  {{ $contactPerson->middlename }}  {{ $contactPerson->lastname }}</option>
								@endforeach
							</select>
							<label class="control-label col-sm-2">Contact Person</label>
							</div>
					 </div>

					 		<div class="input-field col s6">
								<i class="material-icons prefix">access_time</i>
								
							<input type="text" name="contact_experience"  id="experience" placeholder="Enter Call Center Experience" class="validate" id="icon_prefix" value="NA" disabled>
							
	
								<label for="contact_experience">Call Center Experience</label>
						    </div>

							<div class="input-field col s6">
							<div class="col-sm-12">
							<style>
								select:invalid { color: gray; }
								option:invalid { color: white; }
							</style>
							<select class="custom-select" class="icon_prefix"   name="educational_attainment" id='educational_attainment'>
							<option disabled selected hidden>Please Choose Educational Attainment...</option>
							<option value="High School Graduate">HIGH SCHOOL GRADUATE</option>
							<option value="Vocational Graduate">VOCATIONAL GRADUATE</option>
							<option value="Under Graduate">UNDER GRADUATE</option>
							<option value="College Graduate">COLLEGE GRADUATE</option>
							</select>
							<label class="control-label col-sm-6">Educational Attainment</label>
							</div>
					 		</div>

					 		<div class="input-field col s6">
								<i class="material-icons prefix">school</i>
								<input type="number" name="last_year_attended"  placeholder="Enter Last School Year Attended" class="validate" id="icon_prefix" required>
								<label for="last_year_attended">Last School Year Attended</label>
						    </div>

							<div class="input-field col s6">
							<div class="col-sm-12">
							<style>
								select:invalid { color: gray; }
								option:invalid { color: white; }
							</style>
							<select class="custom-select" class="icon_prefix"  name="work_status" id='work_status'  onchange=" return myFunction(this.value);" >
							<option disabled selected hidden>Please Choose Work Status...</option>
							<option value="JOB">JOB</option>
							<option value="INTERNAL">INTERNAL</option>
							<option value="TRAINING">TRAINING</option>
							<option value="RE ENDORSE">RE ENDORSE</option>
							</select>
							<label class="control-label col-sm-6">Work Status</label>
							</div>
					 		</div>

							<div class="input-field col s6">
							<div class="col-sm-12">
							<style>
								select:invalid { color: gray; }
								option:invalid { color: white; }
							</style>
							<select class="custom-select" class="icon_prefix"  name="source" id='source'>
							<option disabled selected hidden>Please Choose Source...</option>
							<option value="Facebook">Facebook</option>
							<option value="Walk In">Walk In</option>
							<option value="Referral">Referral</option>
							<option value="Referral">Job Fair</option>
							</select>
							<label class="control-label col-sm-6">Source</label>
							</div>
					 		</div>


					 		 	 <!-- Modal Structure -->
					 <div id="alert1" class="modal" style="width:35%!important;height:20%!important;border-radius:2px;">
							<div class="modal-content">
							<h4>Incomplete Details</h4>
							<div id="info"></div>
							</div>
							<div class="modal-footer">
							<a href="javascript:void(0)" class="modal-close waves-effect waves-green btn-flat">Close</a>
							</div>
						</div>

					</div>
				</div>
				<div class="form-group">
				&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-default" value="Add"><br/><br/>
						</div>
			</div>
		</div>
	</div>
</form>

									<script>
								$(function(){
									$("#alert1").modal();

									$('#addUser').submit(function(evt){
										// alert($("#contact_person").val());
										$("#info").html("");

										let contactperson = $("#contact_person").val();
										let educ_attainment = $("#educational_attainment").val();
										let work_stats = $("#work_status").val();

											
											if(contactperson == null){
												$("#info").append("<p>Choose Contact Person.</p>");
												$("#alert1").modal("open");

											}else if(educ_attainment == null){
												$("#info").append("<p>Choose Educational Attainment.</p>");
												$("#alert1").modal("open");

											

											}else if(work_stats == null){
												$("#info").append("<p>Choose Work Status.</p>");
												$("#alert1").modal("open");
										
											}else{
												$("#addUser").submit();
											}	

									evt.preventDefault();
									});
								})
								</script>


<script type="text/javascript">
  function validatephone(contact_no)
    {

        contact_no = contact_no.replace(/[^0-9]/g,'');
        $("#phonefield").val(contact_no);

        if( contact_no == '' || contact_no.match(/^[a-z]$/i) )
            {
				$('#phonefield').val('');
				$("#phonefield").css({'background':'#FFEDEF'});

                return false;
            }

        if(contact_no != '' && contact_no.match(/^\w{11}$/))
            {

                $("#phonefield").css({'background':'#99FF99'});
            return true;
            }
    }
</script>
 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
       <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

					<script>
						$(document).ready(function () {
						$('#form').validate({ // initialize the plugin
							rules: {
								work_status: {
									required: true
								},

							}
						});
					});
					</script>

<script>		
function myFunction(status) {
	//alert($("#work_status").val());
	//alert(status);
	if(status== 'INTERNAL'){
		document.getElementById("experience").disabled = true;
		document.getElementById("experience").value = "N/A";
		document.getElementsByName("position_applying")[0].disabled = false;
		document.getElementsByName("position_applying")[0].value = "";
	}
	else if( status =='TRAINING'){
		document.getElementById("experience").disabled = true;
		document.getElementById("experience").value = "N/A";
		document.getElementsByName("position_applying")[0].disabled = true;
		document.getElementsByName("position_applying")[0].value = "N/A";
	}

	else{
		document.getElementById("experience").disabled = false;
		document.getElementById("experience").value = ""
		document.getElementsByName("position_applying")[0].disabled = false;
		document.getElementsByName("position_applying")[0].value = "";
	}
    
}
</script>


@endsection



