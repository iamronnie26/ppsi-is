@extends('layouts.appShowup')
@section('content')

<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="position: absolute;left: 300px;background-color:#3299BB; width: 1065px">
  
    <a class="navbar-brand" href="#"> &nbsp; &nbsp;<!--  PPSI Integrated Software --></a>
  <ul class="navbar-nav">
     </ul>
</nav>
<br/><br/><br/>
<div class="row">
	<div class="col-lg-12">
		@if(Session::has('success_msg'))
		<div class="alert alert-success">{{ Session::get('success_msg') }}
	</div>
	@endif

<div style="position:absolute; left:338px">
	<div style="margin-top:25px; width: 980px;">
			<div class="card-panel" style="background-color:#191970">
					<h4><font color="white">Applicant's Information</font></h4></div>
	@if(!empty($showups))
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
			</div>
		</div>
<div style="overflow-x:auto;">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<table class="table table-striped">
				<thead>
				    <th colspan="4" style="background-color:#9B2335;text-align: center;"><font color="white">Actions</font></th>
					<th style="background-color:#9B2335;text-align: center;"><font color="white">Series Number</th></font>
					<th style="background-color:#9B2335;text-align: center;"><font color="white">Date</th></font>
					<th style="background-color:#9B2335;text-align: center;"><font color="white">Time</th></font>
					<th style="background-color:#9B2335;text-align: center;"><font color="white">Fullname</th></font>
					<th style="background-color:#9B2335;text-align: center;"><font color="white">Contact Number</font></th>
					<th style="background-color:#9B2335;text-align: center;"><font color="white">Position Applying</font></th>
					<th style="background-color:#9B2335;text-align: center;"><font color="white">Contact Person</font></th>
					<th style="background-color:#9B2335;text-align: center;"><font color="white">Call Center Experience</font></th>
					<th style="background-color:#9B2335;text-align: center;"><font color="white">Educational Attainment</font></th>
					<th style="background-color:#9B2335;text-align: center;"><font color="white">Last School Year</font></th>

					<th style="background-color:#BDB76B;text-align: center;"><font color="white">Activty</font></th>
					<th style="background-color:#BDB76B;text-align: center;"><font color="white">Business Partner</font></th>
					<th style="background-color:#BDB76B;text-align: center;"><font color="white">Site Endorse</font></th>
					<th style="background-color:#BDB76B;text-align: center;"><font color="white">Endorse</font></th>
					<th style="background-color:#BDB76B;text-align: center;"><font color="white">PPSI</font></th>
					<th style="background-color:#BDB76B;text-align: center;"><font color="white">Birthdate</font></th>
					<th style="background-color:#BDB76B;text-align: center;"><font color="white">Email Address</font></th>
					<th style="background-color:#BDB76B;text-align: center;"><font color="white">Address</font></th>
					<th style="background-color:#BDB76B;text-align: center;"><font color="white">Nationality</font></th>
					<th style="background-color:#BDB76B;text-align: center;"><font color="white">Gender</font></th>
					<th style="background-color:#BDB76B;text-align: center;"><font color="white">Marital Status</font></th>
					<th style="background-color:#BDB76B;text-align: center;"><font color="white">Course</font></th>
					<th style="background-color:#BDB76B;text-align: center;"><font color="white">School</font></th>
					<th style="background-color:#BDB76B;text-align: center;"><font color="white">Year Graduated</font></th>
					<th style="background-color:#BDB76B;text-align: center;"><font color="white">Pre - Remarks (POC)</font></th>
				</thead>

				<tbody>
					@foreach($showups as $showup)
					<tr>
						<td>
							<a href="{{ route('showups.details', $showup->id) }}" 
							   class="btn btn-outline-success" 
							   style="background-color: #31B0D5">PROCESS</a>
						</td>
						<td>
							<a href="{{ route('showups.details', $showup->id) }}" 
							   class="btn btn-success">DETAILS</a>
						</td>
						
						<td>
							<a href="{{ route('showups.edit', $showup->id) }}" 
							   class="btn btn-outline-warning"
							   style="background-color: #449D44">EDIT</a>
						</td>
						<td>
							<a href="{{ route('showups.details', $showup->id) }}" 
							   class="btn btn-outline-success"
							   style="background-color: #C9302C">DONE</a>
						</td>

						<td class="table-text">
							<div>{{ $showup->series_no }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->date}}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->time }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->firstname }} . {{ $showup->middlename }} . {{ $showup->lastname }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->contact_no }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->position_applying }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->contact_person }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->contact_experience }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->educational_attainment }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->last_year_attended }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->activity }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->business_partner }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->site_endorsed }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->endorsed_ }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->ppsi }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->birthdate }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->email_address }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->street }} . {{ $showup->city }} . {{ $showup->province }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->nationality }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->gender }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->marital_status }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->course }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->school }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->year_graduation }}</div>
						</td>
						<td class="table-text">
							<div>{{ $showup->remarks }}</div>
						</td>
						
					</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
	</div>
	@endif
</div>
</div>
</div>
@endsection 
<div style="position:absolute; left:338px">
@extends('layouts.footer')
</div>