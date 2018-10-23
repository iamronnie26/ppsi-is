@extends('layouts.appRecept')
@section('title','Dashboard | Reception')
@section('content')


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>


<div class="row" id="mainContent">
	<div class="col s12">
		<div class="col s12 m12 l9">
			<div class="card maincard">
			<div class="card-content">
				<span class="card-title"> Applicant's Informations </span>
			<div class="row">
				<div class="col s12">

						<div class="input-field inline col s9 m9 l10">

							<!-- <label for="searchField">Search</label>
							<input type="search" id="searchField" name="searchQuery"> -->

						</div>
						<div class="input-field inline col s3 m3 l2">
							<!-- <button type="submit" class="btn"><i class="small material-icons">search</i></button> -->
						</div>
					{!! Form::close()!!}
				</div>
			</div>
			<div class="row">
					<div class="col s12 m12 centered" id="controls">
						<!-- <a href="{{ route('pdfview',['download'=>'pdf']) }}" class="btn"><i class="small material-icons">print</i></a> -->
				  	<a href="{{ route('recept.index') }}" class="btn"><i class="material-icons">arrow_back_ios</i><span>BACK</span></i></a>
						<a href="{{ route('recept.today') }}" class="btn"><i class="small material-icons">view_module</i><span>Today</span></a>
						<a href="{{ route('recept.all') }}" class="btn"><i class="small material-icons">view_module</i><span>All</span></a><br/><br/>
					</div>
				</div>
			<div class="row">
				<div class="col s12">
					<div class="table-container">
							<table class="highlight centered" id = "user-table">
								<thead>
									<tr>
										<th>Actions</th>
										<th>ID</th>
										<th>Series Number</th>
										<th>Date and Time Created</th>
										<th>Firstname</th>
										<th>Middlename</th>
										<th>Lastname</th>
										<th>Contact Number</th>
										<th>Position Applying</th>
										<th>Contact Person</th>
										<th>Call Center Experience</th>
										<th>Educational Attainment</th>
										<th>Last School Year</th>
										<th>Work Status</th>
										<th>Activity</th>
										<th>Business Partner</th>
										<th>Site Endorsed</th>
										<th>Endorse</th>
										<th>Birthday</th>
										<th>Email Address</th>
										<th>Address</th>
										<th>Nationality</th>
										<th>Gender</th>
										<th>Marital Status</th>
										<th>Course</th>
										<th>School</th>
										<th>Year Graduated</th>
										<th>Remarks</th>
									</tr>
									<tbody>
									</tbody>

											</table>
											<script>
										$(function() {
											$('#user-table').DataTable({
												"order": [[ 2, "desc" ]],
												processing: true,
												ajax: '{{url("recept/data_all")}}',
												columns: [
													
													{
														"defaultContent": "<button class='btn'>Edit</button>"
													} ,
													{data:'id',name:'id'},
													{ data: 'series_no'},
													{ data: 'created'},
													{ data: 'firstname'},
													{ data: 'middlename'},
													{ data: 'lastname'},
													{ data: 'contact_no'},
													{ data: 'position_applying'},
													{defaultContent:"", data: 'recept_contact_person.firstname'},
													{ data: 'contact_experience'},
													{ data: 'educational_attainment'},
													{ data: 'last_year_attended'},
													{ data: 'work_status'},
													{data:"activity"},
													{data:"business_partner"},
													{data:"site_endorsed"},
													{data:"endorse"},
													{data:"birthdate"},
													{data:"email"},
													{data:"address"},
													{data:"nationality"},
													{data:"gender"},
													{data:"marital_status"},
													{data:"course"},
													{data:"school_id"},
													{data:"year_graduated"},
													{data:"remarks"}
													

												],
												dom: 'Bfrtip',
												buttons: [
														'copy',
														'excel',
														'pdf',
													 	{
															extend: 'print',
															text: 'Print all',
															exportOptions: {
																modifier: {
																	selected: null
																}
															}
														},
														{
															extend: 'print',
															text: 'Print selected'
														}
													],
													select: true
											});
										});

										$('#user-table tbody').on('click', '.btn', function(){
											var id = $(this).parent().next().text();
											window.location.href = '/recept/applicants/all/edit/'+id;
										});

										</script>
										</div>
				</div>
			</div>
			</div>
		</div>
		</div>

	<div class="col s12 m12 l3 right-panel">
		<!-- Account Summary Dashboard  -->
		<div class="card" style="background-color:#009CFE">
			<div class="card-content">
				<span class="card-title"><font color="white">Applicant</font></span>
				<div class="card-body">
				<ul>
					<li><font color="white">Today's Showups: {{ $recept_countApplicantAll }}</font></li><br/>
					<div class = "divider"></div><br/>
					<li><font color="white">Call Center: {{ $recept_countJobAll }}</font></li>
					<li><font color="white">Training: {{ $recept_countTrainingAll }}</font></li>
					<li><font color="white">Internal: {{ $recept_countInternalAll }}</font></li>
				</ul>
				</div>
			</div>
		</div>

		<!-- Showups Summary Dashboard  -->
		<div class="card" style="background-color:#735AF2">
			<div class="card-content">
				<span class="card-title"><font color="white">Showups</font></span>
				<ul>
					<li><font color="white">Today's Showups: {{ $recept_countApplicantAll }}</font></li>
					<li><font color="white">On Progress: {{ $recept_onProgressAll }}</font></li>
					<li><font color="white">On Interview: {{ $recept_onInterviewAll }}</font></li>
				</ul>
			</div>
		</div>

		<!-- Interviews Summary Dashboard -->

		<div class="card" style="background-color:#4FD05D">
			<div class="card-content">
				<span class="card-title"><font color="white">Interviews</font></span>
				<ul>
					<li><font color="white">Today's Interviews: {{ $recept_countApplicantAll }}</font></li>
					<li><font color="white">On Progress: {{ $recept_onProgressAll }}</font></li>
					<li><font color="white">Passed Interviews: {{ $recept_passedInterviewAll }}</font></li>
				</ul>
			</div>
		</div>
		</div>
	</div>
</div>
@endsection
