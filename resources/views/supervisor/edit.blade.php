@extends('layouts.appSupervisor')
@section('content')

<div class="row" id="mainContent">
	<div class="col s12">
		<div class="col s12 m12 l12">
			<div class="card maincard">
			<div class="card-content">
				<span class="card-title"> Intern's Informations </span>
					<div>
			&nbsp; <a href="{{ route('supervisor.index') }}" class="label label-primary pull-right"><button type="button" class="btn btn-dark">Back</button></a><br/><br/>
			<div class="panel-body">
				<form action="{{ route('supervisor.update', $supervisor->id) }}" method="POST" class="form-horizontal">
					
					{{ csrf_field() }}

				 <script>
			         $(document).ready(function() {
			            $('select').formSelect();
			         });
		        </script>


					<div class="input-field col s6">
						<i class="material-icons prefix">add_queque</i>
						<input type="text" name="series_no" placeholder="Series Number" id="icon_prefix" value="{{ $logistics->series_no }}" readonly="">
						<label for="series_no">Series Number:</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">date_range</i>
						<input type="text" name="created" placeholder="Date" id="icon_prefix" value="{{ $logistics->created }}" readonly="">
						<label for="date">Date:</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="firstname" placeholder="Firstname" id="icon_prefix" value="{{ $logistics->firstname }}" readonly>
						<label for="firstname">Firstname</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="middlename" placeholder="Middlename" id="icon_prefix" value="{{ $logistics->middlename }}" readonly>
						<label for="middlename">Middlename</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="lastname" placeholder="Lastname" id="icon_prefix" value="{{ $logistics->lastname }}" readonly>
						<label for="lastname">Lastname</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">local_phone</i>
						<input type="text" name="contact_no" placeholder="Contact Number" id="icon_prefix" value="{{ $logistics->contact_no }}" readonly>
						<label for="contact_no">Contact Number</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">email</i>
						<input type="text" name="email_address" placeholder="Email Address" id="icon_prefix" value="{{ $logistics->email }}" readonly>
						<label for="email">Email Address</label>
					</div>
					
					<div class="input-field col s6">
						<i class="material-icons prefix">face</i>
						<input type="text" name="contact_person" placeholder="Interviewer" id="icon_prefix" value="" readonly>
						<label for="contact_person">Interviewer</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">business_center</i>
						<input type="text" name="contact_experience" placeholder="Call Center Experience" id="icon_prefix" value="{{ $logistics->contact_experience }}" readonly>
						<label for="contact_experience">Call Center Experience</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">business_center</i>
						<input type="text" name="business_partner" placeholder="Company Endorse" id="icon_prefix" value="{{ $logistics->business_partner }}" readonly>
						<label for="contact_experience">Company Endorse</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">business_center</i>
						<input type="text" name="source" placeholder="Source" id="icon_prefix" value="{{ $logistics->source }}" readonly>
						<label for="source">Source</label>
					</div>

					
					<div class="input-field col s6">
						<i class="material-icons prefix">business_center</i>
						<style>
						select:invalid { color: gray; }
						option:invalid { color: white; }
						</style>
						<select class="custom-select" class="icon_prefix" name="remarks"  id="icon_prefix">
						<option disabled selected hidden>Remarks</option>
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
						<textarea rows="4" cols="50"></textarea>
						<label for="source">Comments</label>
					</div>
					
					
					<div class="form-group">	
					<div class="col-sm-offset-2 col2-sm-10">
						<input type="submit" class="btn btn-default" value="Update" >
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
@endsection