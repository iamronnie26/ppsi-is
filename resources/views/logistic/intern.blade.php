@extends('layouts.appLogistic')
@section('title','Home Page | Intern')
@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css"/>

<div class="row main">
	<div class="col s12 m12 19">
		<br/>
		<div class="card maincard">
			<div class="card-content">
				<span class="card-title">Intern's Information</span>
				<div class="row">
					<div class="col s12">
						<form action="#" method="post">
							<div class="col s12 m12 centered" id="controls">
							
							</div>

							<div class="input-field inline col s3 m3 12">
							</div>
						</form>
					</div>
				</div>

				<div class="row">
					<div class="col s12">
						<div class= "table-container">
							<table class="highlight centered" id="userIntern-table">
								<thead>
									<tr>
									<th>ID</th>
                                    <th>Date and Time</th>
									<th>Fullname</th>
									<th>Contact Person</th>
									<th>School</th>
                                    <th>Course</th>
                                    <th>OJT Hours</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>

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

											window.table = $('#userIntern-table').DataTable({
												"order":[[1,"desc"]],
												processing: true,
												//serverSide: true,
												ajax: '{{url("logistic/intern/dataIntern")}}',
												columns: [
													
													{ data: 'id', name: 'id' },
                                                    { data: 'created', name: 'created'},
													{ data: 'firstname',
														"render":function(data, type, full, meta){
															return full.firstname +" "+ full.middlename +" "+ full.lastname;
													}},
													{ data: 'contact_id_supervisor.firstname', name: 'contact_id_supervisor.firstname'},
													{ data: 'school.school_name', name: 'school.school_name'},
													{ data: 'course', name: 'course'},
                                                    { data: 'ojt_hours', name: 'ojt_hours'}
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
									
							</script>

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

          Echo.channel('interns')
          .listen('NewIntern', (e) => {
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

