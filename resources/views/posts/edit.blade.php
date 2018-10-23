@extends('layouts.appUser')
@section('title', 'Edit | User')
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
						<span class="card-title">Edit User Maintenance</span>
						<div class="row">
							<div class="col s12">

								<div class="col s12 m12 centered" id="controls">
									<a href="{{ route('posts.index') }}" class="btn"><i class="small material-icons">arrow_back_ios</i><span>Back</span></a><br/><br>
								</div>
							</div>
						</form>
					</div>



						<div class="row">
							<div class="col s12">
								<div class="table-centered">

										<form action="{{ route('posts.update', $post->id) }}" method="POST" class="form-horizontal">
												{{ csrf_field() }}

										<div class = "input-field col s4">
											<i class="material-icons prefix">account_circle</i>
											<input type = "text" name="firstname" value="{{ $post->employee->firstname }}" class ="icon_prefix" readonly>
											<label for="contact_id">Firstname</label>
										</div>

										<div class = "input-field col s4">
											<i class="material-icons prefix">account_circle</i>
											<input type="text" name="middlename" value="{{ $post->employee->middlename }}" class="icon_prefix" readonly>
											<label for="middlename">Middlename</label>
										</div>

										<div class="input-field col s4">
											<i class="material-icons prefix">account_circle</i>
											<input type="text" name="lastname" value="{{ $post->employee->lastname }}" class="icon_prefix" readonly>
											<label for="laatname">Lastname</label>
										</div>

										<div class="input-field col s6">
											<i class="material-icons prefix">account_circle</i>
											<input type="text" readonly name="department" value="{{ $post->department_user->dept_name }}" class="icon_prefix">
											<label for="department">Department</label>
										</div>

										<div class="input-field col s6">
											<i class="material-icons prefix">account_circle</i>
											<input type="text" readonly name="designation" value="{{ $post->designation_user->designation }}" class="icon_prefix">
											<label for="designation">Designation</label>
										</div>

										<div class="input-field col s6">
											<i class="material-icons prefix">email</i>
											<input type="text" name="username" value="{{ $post->username }}" class="icon_prefix" required>
											<label for="username">Username</label>
										</div>

										<script>
										$(document).ready(function(){
											$('#checkbox').on('change', function(){
												$('#password').attr('type', $('#checkbox').prop('checked')==true?"text":"password");
											});
										});
										</script>

										<div class="input-field col s6">
											<i class="material-icons prefix">vpn_key</i>
											<input type="password" id="password" name="password"  class="icon_prefix" id="myInput">
											<label for="password">Password</label>
											<!-- <input type="checkbox" id="checkbox">Show Password -->
											<!-- <div class="input-field col s6">
											<input type="checkbox" onclick="myFunction()">Show Password</div> -->
										</div>

									<div class="form-group">
										<input type="submit" class="btn btn-default" value="Update"></div><br/>
									</div>
								</div>
							</div>
						</div>
					</form>


@endsection
