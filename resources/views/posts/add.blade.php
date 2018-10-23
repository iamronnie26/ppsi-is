@extends('layouts.appUser')
@section('title', 'Add | User')
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
		<div class="card maincard">
			<div class="card-content">
				<span class="card-title">Add New User Maintenance</span>
				<div class="row">
					<div class="col s12">


								<div class="col s12 m12 centered" id="controls">
									<a href="{{ route('posts.index') }}" class="btn"><i class="small material-icons">arrow_back_ios</i><span>Back</span></a><br/><br/>
								</div>
						
					</div>
				</div>

		<form action="{{ route('posts.insert') }}" id="addUser" method="POST" class="form-horizontal" enctype="multipart/form-data">
				{{ csrf_field() }}

				 <script>
			         $(document).ready(function() {
			            $('select').formSelect();
			         });
		        </script>

				<div class="row">
					<div class="col s12">
						<div class="table-centered">

							<div class = "input-field col s6">
							<label for = "Profile_Image">Profile Image</label>
							<div style="margin-bottom: 10px;"><br/><br/>
							<center><img id="profile" src="{{URL::to('/images/default.jpg')}}" style="width:280px;
																									height:280px;
																									border-radius: 50%;
																									box-shadow: 0px 2px 10px
																									black;"></center><br/>
							<div style="margin-bottom: 10px;"></br>
							<center><input type="file"
										onchange="document.getElementById('profile').src = window.URL.createObjectURL(this.files[0])"
										name="user_image"
										id="files"
										accept=".jpg, .png, .jpeg"
										></center></td><br/>
								</div></div>
						    </div>

					 		<div class="input-field col s6">
								<i class="material-icons prefix">account_circle</i>
								<input type="text" name="employee_id"  value="{{$employee_id}}" readonly placeholder="Enter Employee ID" class="validate" id="icon_prefix" required>
								<label for="employee_id">Employee ID</label>
						    </div>

							<div class="input-field col s6">
								<i class="material-icons prefix">account_circle</i>
								<input type="text" name="username" placeholder="Enter Username" class="validate" id="icon_prefix" required>
								<label for="username">Username</label>
						    </div>

						    <div class="input-field col s6">
						    	<i class="material-icons prefix">account_circle</i>
						    	<input type="password" name="password" placeholder="Enter Password" class="validate" id="icon_prefix" required>
						    	<label for="password">Password</label>
							</div>

							<div class="input-field col s6">
									<i class="material-icons prefix">assignment</i>
										<style>
											select:invalid { color: gray; }
											option:invalid { color: white; }
										</style>
									<select class="custom-select" class="icon_prefix" name="contact_id" id="contact_id">
										<option disabled selected hidden>Choose Contact Person</option>
										@foreach ($contactPersons as $contactPerson)
											<option value="{{ $contactPerson->id }}" >{{ $contactPerson->firstname }}  {{ $contactPerson->middlename }}  {{ $contactPerson->lastname }}</option>
										@endforeach
									</select>
							<label class="control-label col-sm-1">Contact Person</label>

							 <script>
								 $("#contact_id").change(function(){
									 let id = $(this).val();
									 let url = "employee/"+id;

									 $.ajax({
										 url:url,
										 dataType:'json',
										 success:function(data){
											 $("#designation_id").val(data.designation);
											 $("#department_id").val(data.department);
										 }
									 });
								 });
							</script>
							</div>
								</div>

								<div class="input-field col s6">
									<div class="col-sm-12">
										<i class="material-icons prefix">assignment</i>
											<input type="text" name="designation_id" placeholder="Designation" class="validate" readonly id="designation_id" >
									    	<label for="designation_id">Designation</label>
									</div>
								</div>

								<div class="input-field col s6">
									<div class="col-sm-12">
										<i class="material-icons prefix">assignment</i>
											<input type="text" name="department_id" placeholder="Department" class="validate" readonly id="department_id">
									    	<label for="department_id">Department</label>
									</div>
								</div>

								<div class="input-field col s6" style="float:right;">
									<i class="material-icons prefix">assignment</i>
										<style>
											select:invalid { color: gray; }
											option:invalid { color: white; }
										</style>
									<select class="custom-select" class="icon_prefix" name="role" id="role">
										<option disabled selected hidden>Choose User Type</option>
										@foreach ($roles as $role)
											<option value="{{ $role->name }}" >{{ $role->name }}</option>
										@endforeach
									</select>
							<label class="control-label col-sm-1">User Type</label>
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
							<input type="submit" class="btn btn-default" value="Add User"><br/><br/>

							

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<script>
								$(function(){
									$("#alert1").modal();

									$('#addUser').submit(function(evt){
									
										$("#info").html("");

										let contactperson = $("#contact_id").val();
										let role = $("#role").val();
										let image = $("input[type=file]").val();

											if(role == null && contactperson == null){
												$("#info").append("<h6>Choose Contact Person and User Type.</h6>");
												$("#alert1").modal("open");
											}
											else if(contactperson == null){
												$("#info").append("<p>Choose Contact Person.</p>");
												$("#alert1").modal("open");

											}else if(role == null){
												$("#info").append("<p>Choose User Type.</p>");
												$("#alert1").modal("open");
											}else if(image == ""){
												$("#info").append("<p>Please choose an image to upload.</p>");
												$("#alert1").modal("open");
											}
											else{
												$("#addUser").submit();
											}	

									evt.preventDefault();
									});
								})
								</script>
@endsection
