@extends('layouts.appUser')
@section('title', 'Dashboard | User')
@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>

<div class="row main">
	<div class="col s12 m12 19">
		<br/>
		<div class="card maincard">
			<div class="card-content">
				<span class="card-title">User Maintenance</span>
				<div class="row">
					<div class="col s12">
						<form action="#" method="post">
							<div class="input-field inline col s9 m9 110">
							<div class="col s12 m12 centered" id="controls">
							<a href="{{ route('posts.add') }}" class="btn"><i class= "small material-icons">add</i><span>ADD</span></a>
						</div>
							</div>

							<div class="input-field inline col s3 m3 12">
								<!-- <button type="submit" class="btn"><i class="small material-icons">search</i></button> -->

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
										<th>ID</th>
										<th>Employee ID</th>
										<th>Profile Image</th>
										<th>Firstname</th>
										<th>Middlename</th>
										<th>Lastname</th>
										<th>Department</th>
										<th>Designation</th>
										<th>Username</th>
										<th>User Type</th>
									</tr>
								</thead>
								<tbody>
								</tbody>

							</table>

							<!-- Modal Structure -->
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

											var data = "public/storage/{{Auth::user()->user_image}}";
											$('#user-table').DataTable({
												dom: 'Bfrtip',
												buttons: [
													'print'
												],
												processing: true,
												// serverSide: true,
												ajax: '{{url("admin/posts/data")}}',
												columnDefs: [
													{
													data:"user_image", name: 'employee.user_image',
													render: function(data) {
														return '<img src="/storage/'+data+'">'
													}
													}
												],

												columns: [
													{
														"defaultContent":
														'<button class="btn btn-delete" type="button">Delete</button>'

													+' '+ '<button class = "btn btn-edit" type="button">Edit</button>'
													} ,

													{ data: 'id', name: 'id'},

													{ data: 'employee_id', name: 'employee_id'},
													{
													data:"user_image", name: 'employee.user_image',
													render: function(data) {
														return '<img style="width:50px!important;height:50px!important;" class="circle valign-wrapper responsive-image" src="/storage/'+data+'">'
													}
													},
													{ data: 'employee.firstname', name: 'employee.firstname' },
													{ data: 'employee.middlename', name: 'employee.middlename'},
													{ data: 'employee.lastname', name: 'employee.lastname'},
													{ data: 'department_user.dept_name', name: 'department_user.dept_name' },
													{ data: 'designation_user.designation', name: 'designation_user.designation' },
													{ data: 'username', name: 'username'},
													{ data: 'role', name: 'role'},


												]

											});
										});

										$('#user-table tbody').on( 'click', '.btn-delete', function () {
											var id = $(this).parent().next().text();
										$("#deleteModal").modal("open");

										$("#btnYes").click(function(){

										window.location.href = "/admin/posts/delete/"+id;
										});
									});


									$('#user-table tbody').on( 'click', '.btn-edit', function () {
										var id = $(this).parent().next().text();
										window.location.href = "/admin/posts/edit/"+id;

									});

								</script>
						</div>
					</div>
				</div>
			</div>
			@endsection
