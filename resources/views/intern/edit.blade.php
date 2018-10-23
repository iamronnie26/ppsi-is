@extends('layouts.appRecept')
@section('title', 'Edit | Intern')
@section('content')

<div class="row">
	<div class="col-lg-12">
		@if($errors->any())
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
			<p>{{ $error }}</p>
			@endforeach
		</div>
		@endif

<div class="row main">
	<div class="col s12 m12 19">
		<br/>
		<div class="card maincard">
			<div class="card-content">
				<span class="card-title">Edit Intern's Information</span>
				<div class="row">
					<div class="col s12">
						

								<div class="input-field inline col s3 m3 112">
									<a href="{{ route('intern.index') }}" class="btn"><i class="small material-icons"></i>Back</a><br/><br/>
								</div>
						</form>
					</div>
				</div>
		
		<form action="{{ route('intern.update', $intern->id) }}" method="POST" class="form-horizontal">
				{{ csrf_field() }}



				<div class="row">
					<div class="col s12">
						<div class="table-centered">

							<div class="input-field col s6">
							<i class="material-icons prefix">account_circle</i>
					 <input type="text" name="id_no" value="{{ $intern->id_no }}"  class="validate" id="icon_prefix" required>
					 <label for="firstname">ID No. :</label>
				 </div>

					 		<div class="input-field col s6">
								<i class="material-icons prefix">account_circle</i>
								<input type="text" name="firstname"  value="{{ $intern->firstname }}" class="validate" id="icon_prefix" required>
								<label for="firstname">Firstname</label>
						    </div>

							<div class="input-field col s6">
								<i class="material-icons prefix">account_circle</i>
								<input type="text" name="middlename"  value="{{ $intern->middlename }}" class="validate" id="icon_prefix" required>
								<label for="middlename">Middlename</label>
							</div>

							<div class="input-field col s6">
								<i class="material-icons prefix">account_circle</i>
								<input type="text" name="lastname"  value="{{ $intern->lastname }}" class="validate" id="icon_prefix" required>
								<label for="lastname">Lastname</label>
							</div>

							<div class="input-field col s6">
								<i class="material-icons prefix">phone</i>
								<!-- <input type="number" name="contact_no"  value="{{ $intern->contact_no }}" class="validate" id="icon_prefix" required> -->
								<input type="text" name="contact_no"    value="{{ $intern->contact_no }}" id="phonefield" placeholder="Enter Contact Number" maxlength="11" class="validate" onkeyup=" return validatephone(this.value); " required>
								<label for="contact_no">Contact Number</label>
							</div>

							 


							<div class="input-field col s6">
								<i class="material-icons prefix">account_circle</i>
								<input type="text" name="course"  value="{{ $intern->course }}" class="validate" id="icon_prefix" required>
								<label for="course">Course</label>
							</div>
							
							<div class="input-field col s6">
								<i class="material-icons prefix">access_time</i>
								<input type="number" name="ojt_hours"  value="{{ $intern->ojt_hours }}" class="validate" id="icon_prefix" required	>
								<label for="ojt_hours">OJT Hours</label>
							</div>

							<div class="input-field col s6">
								<i class="material-icons prefix">school</i>
								<input type="text" name="school"  value="{{ $intern->school->school_name }}" class="validate" id="icon_prefix" readonly>
								<label for="school">School</label>
							</div>

							<!-- <div class="input-field col s6">
								<i class="material-icons prefix">account_circle</i>
								<input type="text" name="contact_id"  value="{{ $intern->contactperson->firstname }} {{ $intern->contactperson->middlename }} {{ $intern->contactperson->lastname }}" class="validate" id="icon_prefix" readonly>
								<label for="contact_id">Contact Person</label>
							</div> -->

							<!-- <div class="input-field col s6">
								<div class="col-sm-12">
								<style>
									select:invalid { color: gray; }
									option:invalid { color: white; }
								</style>
								<select class="custom-select" name="contact_id" id='contact_id'>
								<option value="" disabled selected hidden>Please Choose Business Contact Person...</option>
								
								</select>
								<label class="control-label col-sm-2">Contact Person</label>
								</div>
						   </div> -->
						

						<div class="form-group">
							
							<input type="submit" class="btn btn-default" value="Edit"><br/><br/>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>	

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
@endsection