@extends('layouts.appIntern')
@section('title', 'Add | Interns')
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
				<span class="card-title">Add New Intern's Information</span>
				<div class="row">
					<div class="col s12">


								<div class="col s12 m12 centered" id="controls">
									<a href="{{ route('intern.index') }}" class="btn"><i class="small material-icons">arrow_back_ios</i><span>Back</span></a><br/><br/>
								</div>
						
					</div>
				</div>

		<form action="{{ route('intern.insert') }}" method="POST" class="form-horizontal" id="addUser">
				{{ csrf_field() }}

				 <script>
			         $(document).ready(function() {
			            $('select').formSelect();
			         });
		        </script>
					<!-- Datalists -->
					<datalist id="list-school">
							@if(count($schools)>0)
							@foreach($schools as $school)
							<option value="{{$school->school_name}}">
								@endforeach
							@endif
							</datalist>

							<datalist id="list-school-address">
							@foreach($schools as $school)
							<option value="{{$school->school_address}}">
								@endforeach
							</datalist>
							<!-- End Datalist -->
				<div class="row">
					<div class="col s12">
						<div class="table-centered">

							<div class="input-field col s6">
								<i class="material-icons prefix">alarm</i>
								<input type="text" name="created" value="{{$now}}" readonly class="validate" id="icon_prefix" required>
								<label for="firstname">Date and Time</label>
						    </div>

							<!-- <div class="input-field col s6">
							<i class="material-icons prefix">account_circle</i>
								<input type="text" name="created" value="{{$id_no}}"  class="validate" id="icon_prefix" required>
								<label for="firstname">ID No. :</label>
						    </div> -->

					 		<div class="input-field col s6">
								<i class="material-icons prefix">account_circle</i>
								<input type="text" name="firstname"  placeholder="Enter First Name" class="validate" id="icon_prefix" required>
								<label for="firstname">First Name</label>
						    </div>

							<div class="input-field col s6">
								<i class="material-icons prefix">account_circle</i>
								<input type="text" name="middlename" placeholder="Enter Middle Name" class="validate" id="icon_prefix"required>
								<label for="middlename">Middle Name</label>
						    </div>

						    <div class="input-field col s6">
						    	<i class="material-icons prefix">account_circle</i>
						    	<input type="text" name="lastname" placeholder="Enter Last Name" class="validate" id="icon_prefix" required>
						    	<label for="lastname">Last Name</label>
							</div>

					 		<div class="input-field col s6">
						    	<i class="material-icons prefix">phone</i>
						    	<!-- <input type="number" name="contact_no" placeholder="Enter Contact Number" class="validate" id="icon_prefix" required> -->
								
									<input type="text" name="contact_no" id="phonefield" placeholder="Enter Contact Number" maxlength="11" class="validate"  onkeyup=" return validatephone(this.value); " required>
								
						    	<label for="contact_no">Contact Number</label>
							</div>

							<div class="input-field col s6">
						    	<i class="material-icons prefix">school</i>
						    	<input type="text" name="course" placeholder="Enter Course" class="validate" id="icon_prefix" required>
						    	<label for="course">Course</label>
							</div>

							<div class="input-field col s6">
						    	<i class="material-icons prefix">school</i>
						    	<input type="number" name="ojt_hours" placeholder="Enter OJT Hours" class="validate" id="icon_prefix" required>
						    	<label for="ojt_hours">OJT Hours</label>
							</div>

							<div class="input-field col s6">
						    	<i class="material-icons prefix">school</i>
						    	<input type="text" list="list-school" name="school" placeholder="Enter School" class="validate" id="icon_prefix" required>
						    	<label for="ojt_hours">School</label>
							</div>

							<div class="input-field col s6">

							<div class="col-sm-12">
							<style>
								select:invalid { color: gray; }
								option:invalid { color: white; }
							</style>

							<select class="custom-select" name="contact_id"  id="contact_id">
							<option value="" disabled selected hidden>Please Choose Contact Person...</option >

								@foreach ($contactPersons as $contactPerson)
									<option value="{{ $contactPerson->id }}" >{{ $contactPerson->firstname }} {{ $contactPerson->middlename }} {{ $contactPerson->lastname }} </option>
								@endforeach
							</select>

							<label class="control-label col-sm-2">Contact Person</label>

							</div>
					 </div>

					 <div class="input-field col s6">
						    	<i class="material-icons prefix">school</i>
						    	<input type="text" name="school_address" list="list-school-address" placeholder="Enter School Address" class="validate" id="icon_prefix" required>
						    	<label for="ojt_hours">School Address</label>


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
					<div class="form-group">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-default" value="Add Intern" required><br><br>
						</div>
				</div>
			</div>
		</div>
	</div>


								<script>
								$(function(){
									$("#alert1").modal();

									$('#addUser').submit(function(evt){
										
										$("#info").html("");

										let contactperson = $("#contact_id").val();
											if(contactperson == null){
												$("#info").append("<p>Choose Contact Person.</p>");
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
</form>
@endsection
