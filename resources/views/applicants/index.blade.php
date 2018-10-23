@extends('layouts.appApplicants')
@section('title','Dashboard |Administrator')
@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css"/>


<div class="row" id="mainContent">
	<div class="col s12">
		<div class="col s12 m12 l9">
			<div class="card maincard">
			<div class="card-content">
				<span class="card-title"> Applicant's Informations </span>
			<div class="row">
				<div class="col s12">

						<div class="input-field inline col s9 m9 l10">
						</div>
						<div class="input-field inline col s3 m3 l2">
						</div>
					{!! Form::close()!!}
				</div>
			</div>
			<div class="row">
					<div class="col s12 m12 centered" id="controls">
						<a href="{{ route('applicants.today') }}" class="btn"><i class="small material-icons">view_module</i><span>Today</span></a>
						<a href="{{ route('applicants.all') }}" class="btn"><i class="small material-icons">view_module</i><span>All</span></a><br/><br/>
					</div>
				</div>
			<div class="row">
				<div class="col s12">
					<div class="table-container">
							<table class="highlight centered" id="users-table">
								<thead>
									<tr>
										<th>Actions</th>
										<th>ID</th>
										<th>Series Number</th>
										<th>Firstname</th>
										<th>Middlename</th>
										<th>Lastname</th>
										<th>Contact Number</th>
										<th>Email Address</th>
										<th>Birthday</th>
										<th>Nationality</th>
										<th>Gender</th>
										<th>Marital Status</th>
										<th>Position Applying</th>
										<th>Work Status</th>
										<th>Contact Person</th>
										<th>Address</th>
										<th>Educational Attainment</th>
										<th>Course</th>
										<th>Year Graduated</th>
									</tr>
											<tbody>
											</tbody>
									</table>
										</div>

										<div id="deleteModal" class="modal">
											<div class="modal-content">
											<h5>Confirm Delete</h5>
											<p style="font-size:11pt!important;">Do you really want to delete this record?</p>
											</div>
											<div class="modal-footer">
											<a href="javascript:void(0);" id="btnYes" class="modal-close waves-effect waves-green btn-flat">Yes</a>
											<a href="javascript:void(0);" id="btnNo" class="modal-close waves-effect waves-green btn-flat">no</a>
											</div>
										</div>

										<script>
										$(function() {
											$("#deleteModal").modal();
											window.table = $('#users-table').DataTable({

												processing: true,
												// serverSide: true,
												ajax: '{{url("admin/applicants/data")}}',
												"order":[[1,"desc"]],
												columns: [
													{
														"defaultContent":
														'<button class="btn btn-delete" type="button">Delete</button>'
													} ,
													{ data: 'id', name: 'id' },
													{ data: 'series_no', name: 'series_no' },
													{ data: 'firstname', name: 'firstname' },
													{ data: 'middlename', name: 'middlename' },
													{ data: 'lastname', name: 'lastname' },
													{ data: 'contact_no', name: 'contact_no'},
													{ data: 'email', name: 'email'},
													{ data: 'birthdate', name: 'birthdate'},
													{ data: 'nationality', name: 'nationality'},
													{ data: 'gender', name: 'gender'},
													{ data: 'marital_status', name: 'marital_status'},
													{ data: 'position_applying', name: 'position_applying'},
													{ data: 'work_status', name: 'work_status'},
													{ data:'contactperson',
														"render":function(data, type, full, meta){
															return data.firstname +" "+ data.middlename +" "+ data.lastname;
														}},
													{ data: 'address', name: 'address'},
													{ data: 'educational_attainment', name: 'educational_attainment'},
													{ data: 'course', name: 'course'},
													{ data: 'year_graduated', name: 'year_graduated'}
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

										$('#users-table tbody').on( 'click', '.btn-delete', function () {
										var id = $(this).parent().next().text();
										$("#deleteModal").modal("open");

										$("#btnYes").click(function(){

										window.location.href = '/admin/applicants/delete/'+id;
										});
									});
							</script>
				</div>
			</div>
			</div>
		</div>
		</div>


		<div class="col s12 m12 l3 right-panel">
	
		<div class="card" style="background-color:#009CFE">
			<div class="card-content">
				<span class="card-title"><font color="white">Today's Showups:</font></span>
				<div class="card-body">
				<ul>
					<li><font color="white">Call Center: <span class="new badge"> {{ $applicants_count }}</span></font></li>
					<li><font color="white">Internal: <span class="new badge"> {{ $applicants_Internal }}</span></font></li>
					<li><font color="white">Training: <span class="new badge"> {{ $applicants_Training }}</span></font></li>
				</ul>
				</div>
			</div>
		</div>

		
		<div class="card" style="background-color:#735AF2">
			<div class="card-content">
				<span class="card-title"><font color="white">Users</font></span>
				<ul>
					<li><font color="white">Total No. of Users: <span class="new badge"> {{ $admin_user }}</spam></font></li>
				</ul>
			</div>
		</div>

	

		<div class="card" style="background-color:#4FD05D">
			<div class="card-content">
				<span class="card-title"><font color="white" size="4">Business Partners</font></span>
				<ul>
					<li><font color="white">Total No. of Business Partners: <span class="new badge">{{ $business_partner }}</span></font></li>
				</ul>
			</div>
		</div>
		</div>
	</div>
</div>

<script src="{{asset('js/echo.js')}}"></script>
<script src="https://js.pusher.com/4.3/pusher.min.js"></script>

<script>
          window.Echo = new Echo({
            broadcaster: 'pusher',
            key: '44c02c9ee7d5ae97cb3d',
            cluster: 'ap1',
            encrypted: true,
            logToConsole: true
          });

          Echo.channel('applicants')
          .listen('NewApplicant', (e) => {
            //   alert("yey");
			window.table.ajax.reload();
          });
        </script>

	

		

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>

@endsection
