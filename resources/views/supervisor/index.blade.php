@extends('layouts.appSupervisor')
@section('title', 'Dashboard | Supervisor')
@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>


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
							<a href="{{route('supervisor.today')}}" class="btn"><i class="small material-icons">view_module</i><span>Today</span></a>
							<a href="{{route('supervisor.all')}}" class="btn"><i class="small material-icons">view_module</i><span>All</span></a><br/><br/>
						</div>
							
							<div class="input-field inline col s3 m3 12">
								
							</div>
						</form>
					</div>
				</div>
				
				<div class="row">
					<div class="col s12">
						<div class= "table-container">
							<table class="highlight centered" id="user-table">
								<thead>
									<tr>
										<th>Actions</th>
										<th>Firstname</th>
										<th>Middlename</th>
										<th>Lastname</th>
										<th>Contact No.</th>
										<th>Course</th>
										<th>OJT Hours</th>
										<th>School</th>
										<th>Contact Person</th>
										<th>Department Assigned</th>
										<th>Designation</th>
									</tr>
								</thead>
							</table>
						

							<script>
										$(function() {
											
											window.table = $('#user-table').DataTable({
												processing: true,
												
												ajax: '{{url("supervisor/data_all")}}',
												dom: 'Bfrtip',
												dom: 'Bfrtip',
												buttons: [
													'copy', 'csv', 'excel', 'pdf', 'print'
												],

												columns: [
													
													{
														"defaultContent": "<button class='btn'>Delete</button>"
													} ,
												
													{ data: 'firstname', name: 'firstname'},
													{ data: 'middlename', name: 'middlename'},
													{ data: 'lastname', name: 'lastname'},
													{ data: 'contact_no', name: 'contact_no'},
													{ data: 'course', name: 'contact_no'},  
													{ data: 'ojt_hours', name: 'ojt_hours'},
													{ data: 'school_id', name: 'school_id'},
													{ data: 'contact_id', name: 'contact_id'},
													
												]
											});
										});
										</script>


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
						</div>
					</div>
				</div>
			</div>
			@endsection