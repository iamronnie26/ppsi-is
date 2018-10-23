@extends('layouts.appContactPerson')
@section('title', 'Edit | Contact Person')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

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
				<div class="card maincard">
					<div class="card-content">
						<span class="card-title">Edit Contact Person Maintenance</span>
						<div class="row">
							<div class="col s12">

								<div class="col s12 m12 centered" id="controls">
									<a href="{{ route('contactPersons.index') }}" class="btn"><i class="small material-icons">arrow_back_ios</i><span>BACK</span></a><br/><br>
								</div>
							</div>
					</div>



						<div class="row">
							<div class="col s12">
								<div class="table-centered">

										<form action="{{ route('contactPersons.update', $contactperson->id) }}" method="POST" class="form-horizontal" id="addUser">
												{{ csrf_field() }}

												<script>
															$(document).ready(function() {
																 $('select').formSelect();
															});
													 </script>
										<div class = "input-field col s6">
											<i class="material-icons prefix">account_circle</i>
											<input type = "text" name="firstname" value="{{ $contactperson->firstname }}" class ="icon_prefix" required>
											<label for="contact_id">Firstname</label>
										</div>

										<div class = "input-field col s6">
											<i class="material-icons prefix">account_circle</i>
											<input type="text" name="middlename" value="{{ $contactperson->middlename }}" class="icon_prefix" required>
											<label for="middlename">Middlename</label>
										</div>

										<div class="input-field col s6">
											<i class="material-icons prefix">account_circle</i>
											<input type="text" name="lastname" value="{{ $contactperson->lastname }}" class="icon_prefix" required>
											<label for="lastname">Lastname</label>
										</div>

										<div class="input-field col s6">

										<div class="col-sm-12">
												<i class="material-icons prefix">business</i>
										<style>
											select:invalid { color: gray; }
											option:invalid { color: white; }
										</style>
										<select class="custom-select" class="icon_prefix" name="department" id="dept_id" >
											<option  disabled selected hidden>Choose Department</option>
											@foreach ($departments as $department)

											<option value="{{ $department->dept_id }}">{{ $department->dept_name }} </option>
											@endforeach
										</select>
											<label class="control-label col-sm-1">Department</label>
										</div>
								 </div>

								<style>
								#designation{
									float:right;
								}
								</style>

										<div class="input-field col s6" id="designation">

										<i class="material-icons prefix">assignment</i>

											<select class="custom-select" class="icon_prefix" name="designation" id="des_id">
												<option  disabled selected hidden>Choose Designation</option>
												@foreach ($designations as $designation)
												<option value="{{ $designation->designation_id }}">{{ $designation->designation }} </option>
												@endforeach
											</select>
													<label class="control-label col-sm-1">Designation</label>
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

								<div class="form-group" id="submit_button">
								 &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-default" value="Update"></br></br>


								 <script>
								$(function(){
									$("#alert1").modal();

									$('#addUser').submit(function(evt){
								
										$("#info").html("");

										let department = $("#dept_id").val();
										let designation = $("#des_id").val();
									
										
											if(department == null && designation == null){
												$("#info").append("<h6>Choose Department and Designation.</h6>");
												$("#alert1").modal("open");
											}
										    else if(designation == null){
												$("#info").append("<p>Choose Designation.</p>");
												$("#alert1").modal("open");
											}
											
											else if(department == null){
												$("#info").append("<p>Choose Department.</p>");
												$("#alert1").modal("open");
											}else{
												$("#addUser").submit();
											}	

									evt.preventDefault();
									});
								})
								</script>


							 </div>
							</div>
						</div>
					</form>


@endsection
