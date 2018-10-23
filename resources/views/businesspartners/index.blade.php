@extends('layouts.appBusinessPartners')
@section('title', 'Dashboard | Business Partner')
@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>

<div class="row main">
	<div class="col s12 m12 19">
		<br/>
		<div class="card maincard">
			<div class="card-content">
				<span class="card-title">Business Partner Maintenance</span>
				<div class="row">
					<div class="col s12">
						<form action="#" method="post">
							<div class="col s12 m12 centered" id="controls">
								<a href="{{ route('businesspartners.add') }}" class="btn"><i class= "small material-icons">add</i><span>ADD</span></a>
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
										<th>ID</th>
                   						<th>Business Partner Name</th>
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
											$('#user-table').DataTable({



												processing: true,
												serverSide: true,
												ajax: '{{url("admin/businesspartners/data")}}',
												columns: [

													{
														"defaultContent": "<button class='btn btn-delete'>Delete</button>"
														+' '+ '<button class = "btn btn-edit" type="button">Edit</button>'
													} ,
													{ data: 'id', name: 'id'},
													{ data: 'company_name', name: 'company_name'},
												]
											});
										});

										$('#user-table tbody').on( 'click', '.btn-delete', function () {
										var id = $(this).parent().next().text();
										$("#deleteModal").modal("open");

										$("#btnYes").click(function(){

										window.location.href = "/admin/businesspartners/delete/"+id;
										});
									});

									$('#user-table tbody').on( 'click', '.btn-edit', function () {
										var id = $(this).parent().next().text();
										window.location.href = "/admin/businesspartners/edit/"+id;

									});

										</script>
						</div>
					</div>
				</div>
			</div>
			@endsection
