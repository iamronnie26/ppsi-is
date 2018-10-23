@extends('layouts.appLogistic')
@section('content')

<div class="row" id="mainContent">
	<div class="col s12">
		<div class="col s12 m12 l12">
			<div class="card maincard">
			<div class="card-content">
				<span class="card-title"> Applicant's Informations </span>
					<div>
			&nbsp; <a href="{{ route('logistic.index') }}" class="label label-primary pull-right"><button type="button" class="btn btn-dark">Back</button></a><br/><br/>
			<div class="panel-body">
				<form action="{{ route('logistic.update', $logistics->id) }}" method="GET" class="form-horizontal">
				{{ csrf_field() }}

					<script>
						$(document).ready(function() {
						$('select').formSelect();
						});
					</script>

					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="series_no" placeholder="Series Number" id="icon_prefix" value="{{ $logistics->series_no }}" readonly="">
						<label for="series_no">Series Number:</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">date_range</i>
						<input type="text" placeholder="Date" id="icon_prefix" value="{{ $logistics->created }}" readonly="">
						<label for="date">Date:</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="firstname" placeholder="Firstname" id="icon_prefix" value="{{ $logistics->firstname }}" required>
						<label for="firstname">Firstname</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="middlename" placeholder="Middlename" id="icon_prefix" value="{{ $logistics->middlename }}" required>
						<label for="middlename">Middlename</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="lastname" placeholder="Lastname" id="icon_prefix" value="{{ $logistics->lastname }}" required>
						<label for="lastname">Lastname</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">local_phone</i>
						<input type="text" name="contact_no" value="{{ $logistics->contact_no }}" id="phonefield"  placeholder="Contact Number" maxlength="11" class="validate" onkeyup=" return validatephone(this.value); " required>
						
						<label for="contact_no">Contact Number</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">business_center</i>
						<input type="text" name="position_applying" placeholder="Position Applying" id="icon_prefix" value="{{ $logistics->position_applying }}" required>
						<label for="position_applying">Position Applying</label>
					</div>
					
					<div class="input-field col s6">
						<i class="material-icons prefix">contacts</i>
						<input type="text" placeholder="Contact Person" id="icon_prefix" value="{{ $logistics->firstname }} {{ $logistics->lastname }}" required>
						<label for="contact_person">Contact Person</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">business_center</i>
						<input type="text" name="contact_experience" placeholder="Call Center Experience" id="icon_prefix" value="{{ $logistics->contact_experience }}" required>
						<label for="contact_experience">Call Center Experience</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">school</i>
						<input type="text" name="educational_attainment" placeholder="Educational Attainment" id="icon_prefix" value="{{ $logistics->educational_attainment }}" required>
						<label for="educational_attainment">Educational Attainment</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">business_center</i>
						<input type="text" name="last_year_attended" placeholder="Last School Year Attended" id="icon_prefix" value="{{ $logistics->last_year_attended }}" required>
						<label for="last_year_attended">Last School Year Attended</label>
					</div>

                    <div class="input-field col s6">
						<i class="material-icons prefix">business_center</i>
						<style>
						select:invalid { color: gray; }
						option:invalid { color: white; }
						</style>
						<select class="custom-select" class="icon_prefix" name="remarks" id="remarks"}>
						<option  disabled selected hidden>Remarks</option>
						<option>Passed</option>
						<option>Failed</option>
						<option>Hired Others</option>
						<option>Pending</option>
						<option>No Answer</option>
						<option>Cannot be reach</option>
						</select>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">business_center</i>
						<textarea rows="4" cols="50" name="comment"></textarea>
						<label for="comments">Comments</label>
					</div>
				
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<br>
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
		
@endsection