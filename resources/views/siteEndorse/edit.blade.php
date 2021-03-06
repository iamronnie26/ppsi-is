@extends('layouts.appSiteEndorse')
@section('title', 'Edit | Site Endorse')
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
						<span class="card-title">Edit Site Endorse Maintenance</span>
						<div class="row">
							<div class="col s12">

								<div class="col s12 m12 centered" id="controls">
									<a href="{{ route('siteEndorse.index') }}" class="btn"><i class="small material-icons">arrow_back_ios</i><span>BACK</span></a><br/><br>
								</div>
							</div>
					</div>



						<div class="row">
							<div class="col s12">
								<div class="table-centered">

										<form action="{{ route('siteEndorse.update', $siteEndorse->id) }}" method="POST" class="form-horizontal" id="addUser">
												{{ csrf_field() }}

										<div class = "input-field col s6">
											<i class="material-icons prefix">account_circle</i>
											<input type = "text" name="company_name" value="{{ $siteEndorse->site_name }}" class ="icon_prefix" required>
											<label for="company_name">Company Name</label>
										</div>

								<div class="form-group" id="submit_button">
								 &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-default" value="Update"></br></br>
										
							 </div>
							</div>
						</div>
					</form>


@endsection
