@extends('layouts.appIntern')
@section('title','Dashboard | Intern')
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
				<span class="card-title"> Intern's Informations </span>
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
						<a href="{{ route('intern.index') }}" class="btn"><i class= "small material-icons">arrow_back_ios</i><span>BACK</span></a>
						<a href="{{ route('intern.today') }}" class="btn"><i class="small material-icons">view_module</i><span>Today</span></a>
						<a href="{{ route('intern.all') }}" class="btn"><i class="small material-icons">view_module</i><span>All</span></a><br/><br/>
					</div>
				</div>
			<div class="row">
				<div class="col s12">
					<div class="table-container">
							<table class="highlight centered" id = "user-tables" style="white-space:nowrap!important;">
								<thead>
									<tr>
										<th>Actions</th>
										<th>ID</th>
										<th>Firstname</th>
										<th>Middlename</th>
										<th>Lastname</th>
										<th>Contact Number</th>
										<th>Course</th>
										<th>OJT Hours</th>
										<th>School Name</th>
										<th>Contact Person</th>
									</tr>
									<tbody>
									</tbody>
											</table>
											<script>
										$(function() {
											$('#user-tables').DataTable({
												"order":[[1,"desc"]],
												processing: true,
												ajax: '{{route("intern.data")}}',
												columns: [

													{
														"defaultContent": "<button class='btn'>Edit</button>"
													} ,
													{ data: 'id', name: 'id'},
													{ data: 'firstname', name: 'firstname'},
													{ data: 'middlename', name: 'middlename'},
													{ data: 'lastname', name: 'lastname'},
													{ data: 'contact_no', name: 'contact_no'},
													{ data: 'course', name: 'course'},
													{ data: 'ojt_hours', name: 'ojt_hours'},
													{ data: 'school.school_name', name: 'school_name'},
													{ data:'contactperson.firstname',"defaultContent":"None"},
												],

												dom: 'Bfrtip',
													buttons: [
															'copy',
															'csv',
															'excel',
															'pdf',
															{
																extend: 'print',
																text: 'Print all (not just selected)',
																exportOptions: {
																	modifier: {
																		selected: null
																	}
																}
															}
														],
														select: true
											});
										});

										$('#user-tables tbody').on('click', '.btn', function(){
											var id = $(this).parent().next().text();
											window.location.href = '/recept/intern/all/edit/'+id;
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
						<span class="card-title"><font color="white" size="4">Total No. of Interns</font></span>
						<div class="card-body">
							<link><font color="white"><span class="new badge">{{ $countIntern }}</span></font></link><br/>
						</div>
					</div>
				</div>
				<br>

	@endsection
