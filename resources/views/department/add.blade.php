@extends('layouts.appDepartment')
@section('title', 'Add | Department')
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
				<span class="card-title">Add New Department Maintenance</span>
				<div class="row">
					<div class="col s12">


								<div class="col s12 m12 centered" id="controls">
									<a href="{{ route('department.index') }}" class="btn"><i class="small material-icons">arrow_back_ios</i><span>BACK</span></a><br/><br/>
								</div>
						</form>
					</div>
				</div>

		<form action="{{ route('department.insert') }}" method="POST" class="form-horizontal">
				{{ csrf_field() }}

				 <script>
			         $(document).ready(function() {
			            $('select').material_select();
			         });
		        </script>

				<div class="row">
					<div class="col s12">
						<div class="table-centered">

					 		<div class="input-field col s6">
								<i class="material-icons prefix">account_circle</i>
								<input type="text" name="dept_name"  placeholder="Enter Department" class="validate" id="icon_prefix" required>
								<label for="dept_name">Department Name</label>
						    </div>
						<div class="form-group">

							<input type="submit" class="btn btn-default" value="Add"><br/><br/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection
