@extends('layouts.appInterview')
@section('content')

<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="position: absolute;left: 300px;background-color:#000080; width: 1065px">
  
    <a class="navbar-brand" href="#"> &nbsp; &nbsp; PPSI Integrated Software</a>
  <ul class="navbar-nav">
     </ul>
</nav>

<!-- <br/><br/><br/>
<img class="materialboxed" 
     width="1049" 
     height="180" 
     src="{{URL::to('/images/PPSIBANNER.jpg')}}" style="position: absolute; left:300px"> -->

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
					@if(!empty($interviews))

	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
			</div>
				<a class="btn btn-success" href="{{ route('interview.add') }}"><i 
                                           class="material-icons">add</i> Add New</a>
		</div>
		<br/>
<div style="overflow-x:auto;">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<table class="striped">
				<thead>
				    <th colspan="5" style="background-color:#2BBBAD; text-align: center;"><font color="white">Actions</font></th>
					<th style="background-color:#2BBBAD; text-align: center;"><font color="white">Series Number</th></font>
					<th style="background-color:#2BBBAD; text-align: center;"><font color="white">Date</th></font>
					<th style="background-color:#2BBBAD; text-align: center;"><font color="white">Time</th></font>
					<th style="background-color:#2BBBAD; text-align: center;"><font color="white">Fullname</th></font>
					<th style="background-color:#2BBBAD; text-align: center;"><font color="white">Contact Number</font></th>
					<th style="background-color:#2BBBAD; text-align: center;"><font color="white">Position Applying</font></th>
					<th style="background-color:#2BBBAD; text-align: center;"><font color="white">Contact Person</font></th>
					<th style="background-color:#2BBBAD; text-align: center;"><font color="white">Call Center Experience</font></th>
					<th style="background-color:#2BBBAD; text-align: center;"><font color="white">Educational Attainment</font></th>
					<th style="background-color:#2BBBAD; text-align: center;"><font color="white">Last School Year</font></th>

					<th style="background-color:#191970; text-align: center;"><font color="white">Activty</font></th>
					<th style="background-color:#191970; text-align: center;"><font color="white">Business Partner</font></th>
					<th style="background-color:#191970; text-align: center;"><font color="white">Site Endorse</font></th>
					<th style="background-color:#191970; text-align: center;"><font color="white">Birthdate</font></th>
					<th style="background-color:#191970; text-align: center;"><font color="white">Email Address</font></th>
					<th style="background-color:#191970; text-align: center;"><font color="white">Address</font></th>
					<th style="background-color:#191970; text-align: center;"><font color="white">Nationality</font></th>
					<th style="background-color:#191970; text-align: center;"><font color="white">Gender</font></th>
					<th style="background-color:#191970; text-align: center;"><font color="white">Marital Status</font></th>
					<th style="background-color:#191970; text-align: center;"><font color="white">Course</font></th>
					<th style="background-color:#191970; text-align: center;"><font color="white">School</font></th>
					<th style="background-color:#191970; text-align: center;"><font color="white">Year Graduated</font></th>
					<th style="background-color:#191970; text-align: center;"><font color="white">Pre - Remarks (POC)</font></th>
				</thead>

				<tbody>
					@foreach($interviews as $interview)
					<tr>
						<td>
							</div><a class="btn btn-success" 
							         href="{{ route('interview.details', $interview->id) }}"
							         style="background-color: #31B0D5">PROCESS</a></td>
						</td>
						<td>
							</div><a class="btn btn-success" 
							         href="{{ route('interview.details', $interview->id) }}">DETAILS</a></td>
						</td>
						
						<td>
							<a class="btn btn-success" 
							   href="{{ route('interview.edit', $interview->id) }}" 
							   style="background-color:#449D44">EDIT</a>
						</td>
						<td>
							</div><a class="btn btn-success" 
							         href="{{ route('interview.details', $interview->id) }}"
							         style="background-color:#c9302c">DONE</a></td>
						</td>
						<td>
							</div><a class="btn btn-success" href="{{ route('interview.details', $interview->id) }}">PASS INTERVIEW</a></td>
						</td>

						<td class="table-text">
							<div>{{ $interview->series_no }}</div>
						</td>
						<td class="table-text">
							<div>{{ $interview->date}}</div>
						</td>
						<td class="table-text">
							<div>{{ $interview->time }}</div>
						</td>
						<td class="table-text">
							<div>{{ $interview->firstname }}  {{ $interview->middlename }}  {{ $interview->lastname }}</div>
						</td>
						<td class="table-text">
							<div>{{ $interview->contact_no }}</div>
						</td>
						<td class="table-text">
							<div>{{ $interview->position_applying }}</div>
						</td>
						<td class="table-text">
							<div>{{ $interview->contact_person }}</div>
						</td>
						<td class="table-text">
							<div>{{ $interview->contact_experience }}</div>
						</td>
						<td class="table-text">
							<div>{{ $interview->educational_attainment }}</div>
						</td>
						<td class="table-text">
							<div>{{ $interview->last_year_attended }}</div>
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
			</div>
		</div>
	


</div>
</div>
</div>
@endsection
<div style="position:absolute; left:338px">
@extends('layouts.footer')
</div>