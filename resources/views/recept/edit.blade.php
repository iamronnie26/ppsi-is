@extends('layouts.appRecept')
@section('content')

<div class="row" id="mainContent">
	<div class="col s12">
		<div class="col s12 m12 l12">
			<div class="card maincard">
			<div class="card-content">
		
				<span class="card-title"> Applicant's Informations </span>
					<div>
			&nbsp; <a href="{{ route('recept.index') }}" class="label label-primary pull-right"><button type="button" class="btn btn-dark">Back</button></a><br/><br/>
			<div class="panel-body">
				<form action="{{ route('recept.update', $receptionist->id) }}" method="POST" class="form-horizontal">
					{{ csrf_field() }}
					<script>
			         $(document).ready(function() {
			            $('select').formSelect();
			         });
		        </script>

					
					<input type="hidden" name="applicant_id" value="{{ $receptionist->id }}">
					
					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="series_no" placeholder="Series Number" id="icon_prefix" value="{{ $receptionist->series_no }}" readonly>
						<label for="series_no">Series Number:</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">date_range</i>
						<input type="text" placeholder="Date" id="icon_prefix" value="{{ $receptionist->created }}" readonly>
						<label for="date">Date:</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="firstname" placeholder="Firstname" id="icon_prefix" value="{{ $receptionist->firstname }}" readonly>
						<label for="firstname">Firstname</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="middlename" placeholder="Middlename" id="icon_prefix" value="{{ $receptionist->middlename }}" readonly>
						<label for="middlename">Middlename</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="lastname" placeholder="Lastname" id="icon_prefix" value="{{ $receptionist->lastname }}" readonly>
						<label for="lastname">Lastname</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">local_phone</i>
						<input type="text" name="contact_no" value="{{ $receptionist->contact_no }}" id="phonefield"  placeholder="Contact Number" maxlength="11" class="validate" onkeyup=" return validatephone(this.value); " readonly>
						<!-- <input type="text" name="contact_no" placeholder="Contact Number" id="icon_prefix" value="{{ $receptionist->contact_no }}" required> -->
						<label for="contact_no">Contact Number</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">business_center</i>
						<input type="text" name="position_applying" placeholder="Position Applying" id="icon_prefix" value="{{ $receptionist->position_applying }}" readonly>
						<label for="position_applying">Position Applying</label>
					</div>
					
					<div class="input-field col s6">
						<i class="material-icons prefix">contacts</i>
						<input type="text" placeholder="Contact Person" id="icon_prefix" value="{{ $receptionist->recept_contact_person->firstname }} {{ $receptionist->recept_contact_person->lastname }}" readonly>
						<label for="contact_person">Contact Person</label>
						<input type="hidden" name="contact_id" value="{{$receptionist->contact_id}}" id="contact_person" readonly>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">business_center</i>
						<input type="text" name="contact_experience" placeholder="Call Center Experience" id="icon_prefix" value="{{ $receptionist->contact_experience }}" readonly>
						<label for="contact_experience">Call Center Experience</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">school</i>
						<input type="text" name="educational_attainment" placeholder="Educational Attainment" id="icon_prefix" value="{{ $receptionist->educational_attainment }}" readonly>
						<label for="educational_attainment">Educational Attainment</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">business_center</i>
						<input type="text" name="last_year_attended" placeholder="Last School Year Attended" id="icon_prefix" value="{{ $receptionist->last_year_attended }}" readonly>
						<label for="last_year_attended">Last School Year Attended</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">business_center</i>
						<input type="text" name="source" id="icon_prefix" value="{{ $receptionist->source }}" readonly>
						<label for="source">Sourced</label>
					</div>

					<div class="input-field col s6">
							<!-- <div class="col-sm-12"> -->
							<style>
								select:invalid { color: gray; }
								option:invalid { color: white; }
							</style>
							<select class="custom-select" class="icon_prefix"   name="recept_status" id='recept_status' onchange="return myFunction(this.value);">
							<option disabled selected hidden>Please Choose Status...</option>
							
							<option value="Active File">ACTIVE FILE</option>
							<option value="Passed">PASSED</option>
							<option value="Failed">FAILED</option>
							<option value="Re Endorse">RE ENDORSE</option>
							</select>
							<label class="control-label col-sm-6">Status</label>
							<!-- </div> -->
					 		</div>

					

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<br/>
							<input type="submit" class="btn btn-default" value="Update">
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
		</div>
		</div>
	</div>
</div>

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
 
 				<!-- Modal Structure -->
 <div id="deleteModal" class="modal">
    <div class="modal-content" style="min-height:300px!important;">
      <center><h4 class = "orange-text ">Previous History</h4></center>
      <div>
	  <div class = "input-field col s10">
											<span class = "blue-text ">Previous Contact Person: <font color="black">{{$receptionist->recept_contact_person->firstname}}
																													{{$receptionist->recept_contact_person->middlename}}
																													{{$receptionist->recept_contact_person->lastname}}</font></span><br/>
											<span class = "blue-text ">Previous Date and Time: <font color="black"> {{$receptionist->created}}</font></span><br/>
											@if($receptionist->business_partner != 0)
											<span class = "blue-text ">Previous Company Endorsed: <font color="black">{{$receptionist->partner->company_name}}</font></span><br/>
											@else
											<span class = "blue-text ">Previous Company Endorsed: <font color="black">Not Yet Endorsed</font></span><br/>
											@endif
											<span class = "blue-text ">Previous Status: <font color="black">{{$receptionist->status}}</font></span><br/>	
										</div>
      	<form action="{{route('recept.reEndorsement')}}" method="post">
		  {{csrf_field()}}
      		<div class="row">
      		<div class="input-field col s6">
								<i class="material-icons prefix">watch</i>
								<input type="text"
									   name="created"
									   value="{{$date}}"
									   class="validate"
									   id="icon_prefix"
									   readonly>
									<label for="created">Time</label>
					 			</div>

								<input type="hidden" name="applicant_id" value="{{$receptionist->id}}">

								<div class="input-field col s6">
								<i class="material-icons prefix">account_circle</i>
								<input type="text" name="firstname"  value= "{{$receptionist->firstname}}" class="validate" id="icon_prefix" required>
								<label for="firstname">First Name</label>
						    	</div>	

								<div class="input-field col s6">
								<i class="material-icons prefix">account_circle</i>
								<input type="text" name="middlename"  value= "{{$receptionist->middlename}}" class="validate" id="icon_prefix" required>
								<label for="middlename">Middle Name</label>
						    	</div>

								<div class="input-field col s6">
								<i class="material-icons prefix">account_circle</i>
								<input type="text" name="lastname"  value= "{{$receptionist->lastname}}" class="validate" id="icon_prefix" required>
								<label for="lastname">Last Name</label>
						    	</div>

								<div class="input-field col s12">
								<i class="material-icons prefix">account_circle</i>
								<select name="contact_person" >
									<option value="" disabled selected>Choose Contact Person</option>
									@forelse($contactPersons as $contactPerson)
										<option value="{{$contactPerson->id}}">{{$contactPerson->firstname}} {{$contactPerson->lastname}}</option>
									@empty
										<option value="">No Contact Person Exists</option>
									@endforelse
									</select>
								<label>Contact Person</label>
								<input type="hidden" name="contact_id" value="{{$receptionist->contact_id}}" id="contact_person" required>
							</div>

							<div class="input-field col s6">
							<div class="col-sm-12">
							<i class="material-icons prefix">face</i>
							<style>
								select:invalid { color: gray; }
								option:invalid { color: white; }
							</style>
							<select class="custom-select" class="icon_prefix"  name="source" id='source' required>
							<option disabled selected hidden>Please Choose Source...</option>
							<option value="Facebook">Facebook</option>
							<option value="Walk In">Walk In</option>
							<option value="Referral">Referral</option>
							<option value="Job Fair">Job Fair</option>
							</select>
							<label class="control-label col-sm-6">Source</label>
							</div>
					 		</div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
      <button type="submit" class="modal-close waves-effect waves-green btn-flat"> Save </button>
	  </form>
    </div>
  </div>
 <script>		
function myFunction(recept_status) {
	if(recept_status== 'Re Endorse'){

		$("#deleteModal").modal();
		$("#deleteModal").modal("open");
	}
	else{
		// document.getElementById("educational_attainment").disabled = false;
		// document.getElementById("educational_attainment").value = ""
		// document.getElementsByName("position_applying")[0].disabled = false;
		// document.getElementsByName("position_applying")[0].value = "";
	}
    
}
</script>
		
@endsection