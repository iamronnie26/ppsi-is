@extends('layouts.appEncoder')

@section('title','Details')

@section('content')
<div class="card" id="detailsCard">
	<div class="card-content" style="min-height:500px!important;">
		<div class="card-title row">
		<span class="col s8">Applicant's Information</span>
		<div class="col s4">
		<div class="right">
			<a href="{{route('encoder.index')}}" class="btn" id="btnEdit">Back</a>
			<button form="appDetails" type="submit" class="btn" disabled id="btnSave">Save</button>
			
			<script>
				$(function(){
					$("#appDetails").change(function(){
						$("#btnSave").removeAttr('disabled');
					});
				});
			</script>
		</div>
		</div>
		</div>
		<div class="row">
<datalist id="schoolname">
	@foreach($schools as $school)
				<option value="{{$school->school_name}}">
	@endforeach
</datalist>
<datalist id="schooladdress">
	@foreach($schools as $school)
				<option value="{{$school->school_address}}">
	@endforeach
</datalist>
		@if(isset($applicant))
		<form id="appDetails" method="post" action="{{route('encoder.appUpdate',$applicant->id)}}">
				{{method_field('PUT')}}
		
				{{csrf_field()}}
				

<script>
	$(document).ready(function() {
	   $('select').formSelect();
	});
</script>
		<div class="input-field col s4 offset-s8">
				<input id="series_no" value="{{$applicant->series_no}}" readonly type="text" >
				<label for="series_no">Series Number</label>
			</div>
			<div class="input-field col s4">
				<input id="first_name" type="text" value="{{$applicant->firstname}}" name="firstname" class="custom_input" required>
				<label for="first_name">First Name</label>
			</div>
			<div class="input-field col s4">
				<input id="middle_name" type="text" value="{{$applicant->middlename}}" name="middlename" required>
				<label for="middle_name">Middle Name</label>
			</div>
			<div class="input-field col s4">
				<input id="last_name" type="text" value="{{$applicant->lastname}}" name="lastname" required>
				<label for="last_name">Last Name</label>
			</div>

			<div class="input-field col s12">
				<input id="address" type="text" value="{{$applicant->address}}" name="address" required>
				<label for="address">Address</label>
			</div>

			<div class="input-field col s6">
				<input id="email" value="{{$applicant->email}}" type="email" name="email" required>
				<label for="email">Email</label>
			</div>
			<div class="input-field col s6">
			<input type="text" name="contact_no" id="phonefield" placeholder="Enter Contact Number" maxlength="11" class="validate" value="{{$applicant->contact_no}}" onkeyup=" return validatephone(this.value); " required>
				<label for="contact_no">Contact Number</label>
			</div>

			<div class="input-field col s6">
				<input id="birthdate" required value="{{$applicant->birthdate}}" type="date" name="birthdate" required>
				<label for="birthdate">Birthdate</label>
			</div>
			<div class="input-field col s6">
				<select class="custom-select" name="gender" id="gender_id">
					<option disabled selected hidden>Choose Gender</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
				<label for="gender">Gender</label>
				
			</div>

			<div class="input-field col s6">
				<input id="Nationality" type="text" value="{{$applicant->nationality}}" name="nationality" required>
				<label for="Nationality">Nationality</label>
			</div>
			<div class="input-field col s6">
				<select name="marital_status" class="custom-select" id="marital_status">
					<option selected disabled>Choose Marital Status</option>
					<option value="Single">Single</option>
					<option value="Married">Married</option>
					<option value="Divorced">Divorced</option>
					<option value="Separated">Separted</option>
					<option value="Widowed">Widowed</option>
				</select>
				<label for="marital_status">Marital Status</label>
			</div>

			<div class="input-field col s4">
				<input id="position_applying" type="text" value="{{$applicant->position_applying}}" name="position_applying" required>
				<label for="position_applying">Position Applying</label>
			</div>
			<div class="input-field col s4">
				<input id="contact_experience" type="text" value="{{$applicant->contact_experience}}" name="contact_experience" required>
				<label for="contact_experience">Contact Experience</label>
			</div>
			<div class="input-field col s4">
			<input id="contact_experience" type="text" value="{{$contactPerson}}" readonly>
				<label for="Contact Person">Contact Person</label>
			</div>

			<div class="input-field col s6">
			<select class="custom-select"  name="educational_attainment" id='educational_attainment'  required>
				  <option  disabled selected hidden>Please Choose Educational Attainment...</option>
				  <option value="High School Graduate">HIGH SCHOOL GRADUATE</option>
				  <option value="Vocational Graduate">VOCATIONAL GRADUATE</option>
				  <option value="Undergraduate">UNDERGRADUATE</option>
				  <option value="College Graduate">COLLEGE GRADUATE</option>
				</select>
				<label for="educational_attainment">Educational Attainment</label>
			</div>
			<div class="input-field col s6">
				<input id="last_year_attended" value="{{$applicant->last_year_attended}}" type="number" name="last_year_attended" required>
				<label for="last_year_attended">Last Year Attended</label>
			</div>
			
			<div class="input-field col s4">
				<input id="course" type="text" value="{{$applicant->course}}" name="course" required>
				<label for="course">Course</label>
			</div>
			<div class="input-field col s4">
			@if($applicant->school)
				<input id="school" list="schoolname" value="{{$applicant->school->school_name}}" type="text" name="school_name" required>
			@else
				<input id="school" type="text" list="schoolname" name="school_name" required>
			@endif
				<label for="school">School Name</label>
			</div>
			<div class="input-field col s4">
			@if($applicant->school)
				<input id="school_address" type="text" list="schooladdress" value="{{$applicant->school->school_address}}" name="school_address" required>
			@else
				<input id="school_address" type="text" list="schooladdress" name="school_address"required>
			@endif	
				<label for="school_address">School Address</label>
			</div>

			<div class="input-field col s4">
				<select class="custom-select" id="business_partner" name="business_partner">
					<option disabled selected>Choose Business Partner</option>
					@foreach($partners as $partner)
					<option value="{{$partner->id}}">{{$partner->company_name}}</option>
					@endforeach
				</select>
				<label for="business_partner">Business Partner</label>
			</div>
			<div class="input-field col s4">
				<select class="custom-select" id="site_endorsed" name="site_endorsed">
					<option disabled selected>Choose Site</option>
					@foreach($sites as $site)
					<option value="{{$site->id}}">{{$site->site_name}}</option>
					@endforeach
				</select>
				<label for="site_endorsed">Site</label>
			</div>
			<div class="input-field col s4">
				<select class="custom-select" id="activity" name="activity">
					<option disabled selected>Choose Activity</option>
					<option value="N/A">N/A</option>
					<option value="Onsite">Onsite</option>
					<option value="Direct Endorsement">Direct Endorsement</option>
					<option value="Remote/UDP">Remote/UDP</option>
				</select>
				<label for="activity">Activity</label>
			</div>

			<div class="input-field col s6">
				<select class="custom-select" name="work_status" id="work_status" disabled>
					<option disabled selected>Choose Work Status</option>
					<option value="JOB">Job</option>
					<option value="INTERNAL">Internal Hiring</option>
					<option value="TRAINING">Training</option>
				</select>
				<label for="work_status">Work Status</label>
			</div>
			<div class="input-field col s6">
			<select class="custom-select" name="endorse" id="endorse_id">
					<option disabled selected>Choose Endorsement Type</option>
					<option value="Endorse to Client">Endorse to Client</option>
					<option value="Endorse to Training">Endorse to Training</option>
					<option value="Endorse to Training">Endorse to Local</option>
				</select>
				<label for="endorse">Endorse</label>
			</div>

			<div class="input-field col s12">
				<input id="comment" value="{{$applicant->comments}}" type="text" disabled>
				<label for="comment">Comment</label>
			</div>

			<div class="input-field col s12">
				<input id="remarks" value="{{$applicant->remarks}}" type="text" disabled>
				<label for="remarks">Remarks</label>
			</div>
		</form>
		@else
			<p class="center">No Data</p>
		@endif


	  </div>

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


<script>
			$(function(){
			$("#alert1").modal();

			$('#appDetails').submit(function(evt){
								
				$("#info").html("");

					let gender = $("#gender_id").val();
					let educ_attain = $("#educational_attainment").val();
					let bus_partner = $("#business_partner").val();
					let activity = $("#activity").val();
					let work_stats = $("#work_status").val();
					let endorse = $("#endorse_id").val();
					let marital_stats =$("#marital_status").val();
					
					if(gender == null){
						$("#info").append("<p>Choose Gender.</p>");
						$("#alert1").modal("open");									
					}
					else if(educ_attain == ""){
						$("#info").append("<p>Choose Educational Attainment.</p>");
						$("#alert1").modal("open");
											
					}
					else if(marital_stats == null){
						$("#info").append("<p>Choose Marital Status.</p>");
						$("#alert1").modal("open");
											
					}else if(bus_partner == null){
						$("#info").append("<p>Choose Business Partner.</p>");
						$("#alert1").modal("open");
											
					}else if(activity == null){
						$("#info").append("<p>Choose Activity.</p>");
						$("#alert1").modal("open");
											
					}else if(work_stats == null){
						$("#info").append("<p>Choose Work Status.</p>");
						$("#alert1").modal("open");
											
					}else if(endorse == null){
						$("#info").append("<p>Choose Endorse.</p>");
						$("#alert1").modal("open");						
					}else{
						$("#appDetails").submit();
				    }	

					evt.preventDefault();
					});
					})
</script>


<script>

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


$(function(){
	let gender = "{{$applicant->gender}}";
	let marital_status = "{{$applicant->marital_status}}";
	let endorse = "{{$applicant->endorse}}";
	let work_status = "{{$applicant->work_status}}";
	let business_partner = {{$applicant->business_partner}};
	let site = "{{$applicant->site_endorsed}}";
	let activity = "{{$applicant->activity}}";
	let educational_attainment = "{{$applicant->educational_attainment}}";


	if(educational_attainment != ""){
		$("select[name=educational_attainment]").val(educational_attainment);
	}

	if(gender != ""){
		$("select[name=gender]").val(gender);
	}

	if(marital_status != ""){
		$("select[name=marital_status]").val(marital_status);
	}

	if(endorse != ""){
		$("select[name=endorse]").val(endorse);
	}

	if(work_status != ""){
		$("select[name=work_status]").val(work_status);
	}

	if(business_partner != 0){
		$("select[name=business_partner]").val(business_partner);
	}

	if(site != ""){
		$("select[name=site_endorsed]").val(site);
	}

	if(activity != ""){
		$("select[name=activity]").val(activity);
	}
});
</script>
@endsection