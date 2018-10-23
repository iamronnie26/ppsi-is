@extends('layouts.appContactPerson')
@section('title', 'Add | Contact Person')
@section('content')

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
				<span class="card-title">Add New Contact Person Maintenance</span>
				<div class="row">
					<div class="col s12">


							<div class="col s12 m12 centered" id="controls">
									<a href="{{ route('contactPersons.index') }}" class="btn"><i class="small material-icons">arrow_back_ios</i><span>Back</span></a><br/><br/>
								</div>
						
					</div>
				</div>

		<form action="{{ route('contactPersons.insert') }}" method="POST" class="form-horizontal" id="addUser">
				{{ csrf_field() }}

				 <script>
			         $(document).ready(function() {
			            $('select').formSelect();
			         });
		        </script>

				<div class="row">
					<div class="col s12">
						<div class="table-centered">

					 		<div class="input-field col s6">
								<i class="material-icons prefix">account_circle</i>
								<input type="text" name="firstname"  placeholder="Enter First Name" class="validate" id="icon_prefix" required>
								<label for="firstname">First Name</label>
						    </div>

							<div class="input-field col s6">
								<i class="material-icons prefix">account_circle</i>
								<input type="text" name="middlename" placeholder="Enter Middle Name" class="validate" id="icon_prefix" required>
								<label for="middlename">Middle Name</label>
						    </div>

						    <div class="input-field col s6">
						    	<i class="material-icons prefix">account_circle</i>
						    	<input type="text" name="lastname" placeholder="Enter Last Name" class="validate" id="icon_prefix" required>
						    	<label for="lastname">Last Name</label>
							</div>

								<div class="input-field col s6">
										<i class="material-icons prefix">business</i>
											<select class="custom-select" class="icon_prefix" name="dept_id" id="dept_id" required>
												<option disabled selected hidden>Choose Department</option>
												@foreach ($departments as $department)

												<option value="{{ $department->id }}">{{ $department->dept_name }} </option>
												@endforeach
											</select>
											<label class="control-label col-sm-2">Department</label>
										</div>

										<div class="input-field col s6">
										<i class="material-icons prefix">assignment</i>
											<select class="custom-select" class="icon_prefix" name="designation_id" id="des_id" required>
												<option  disabled selected hidden>Choose Designation</option>
												@foreach ($designations as $designation)
												<option value="{{ $designation->id }}">{{ $designation->designation }} </option>
												@endforeach
											</select>
											<label class="control-label col-sm-2">Designation</label>
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

				<div class="form-group">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-default" value="Add User"><br/><br/>

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
	</div>
</form>
@endsection
