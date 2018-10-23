@extends('layouts.appRecept')
@section('title','Dashboard | Reception')
@section('content')



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css"/>


<div class="row" id="mainContent">
	<div class="col s12">
		<div class="col s12 m12 l12">
			<div class="card maincard" style="min-height:550px!important;">
			<div class="card-content">
				<span class="card-title"> Applicant's Informations </span>
			<div class="row">
					<div class="col s12 m12 centered" id="controls">

					<form action="{{route('recept.add')}}" method="post" id="addForm">
						{{csrf_field()}}
					</form>
						<button class="btn" form="addForm" id="btnAdd" disabled type="submit"><i class="small material-icons">add</i><span>ADD</span></button>

						<a href="{{ route('recept.today') }}" class="btn"><i class="small material-icons">view_module</i><span>Today</span></a>
						<a href="{{ route('recept.all') }}" class="btn"><i class="small material-icons">view_module</i><span>All</span></a><br/><br/>
					</div>
				</div>
			<div class="row">
			<div class="col s12">
			<div class="input-field col s3">
								<i class="material-icons prefix">account_circle</i>
								<input type="text" required name="firstname" form="addForm" class="validate" id="firstname" id = "user-table">
								<label for="firstname">First Name</label>
			 </div>
			 <div class="input-field col s3">
								<i class="material-icons prefix">account_circle</i>
								<input type="text" required name="middlename" form="addForm" class="validate" id="middlename" id = "user-table">
								<label for="middlename">Middle Name</label>
			 </div>
			<div class="input-field col s3">
								<i class="material-icons prefix">account_circle</i>
								<input type="text" required name="lastname" form="addForm" class="validate" id="lastname" id = "user-table">
								<label for="lastname">Last Name</label>
			 </div>
			 <div class="input-field col s3">
								<i class="material-icons prefix">account_circle</i>
								<!-- <input type="text" name="contact_no" form="addForm" maxlength="11" class="validate" id="contact_no"> -->
								<input type="text" required name="contact_no" form="addForm" id="phonefield"  maxlength="11" class="contact_no" id = "user-table" onkeyup=" return validatephone(this.value); ">
								<label for="contact_no">Contact No.</label>
			 </div>

			 <script>

				$(function(){
					$('input[name=firstname],input[name=middlename],input[name=lastname],input[name=contact_no]').keyup(function(){

						let fname = $("input[name=firstname]").val();
			 let mname = $("input[name=middlename]").val();
			 let lname = $("input[name=lastname]").val();
			 let contactno = $("input[name=contact_no]").val();

			 window.data = {
				 firstname:fname,
				 middlename:mname,
				 lastname:lname,
				 contact_no:contactno,
			 };

			$.ajax({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						method:"POST",
						url:"{{route('recept.applicantSearch')}}",
						data:window.data,
						dataType:"json",
						error: function (request, status, error) {
							console.log(request.responseText);
						},
						success:function(d){
							if(d.length > 0){
								window.table.clear();
								window.table.rows.add(d);
								window.table.draw();
							}else{
								if(d.length == 0 && fname == "" && mname == "" && lname=="" && contactno == ""){
									$("#btnAdd").attr("disabled",true);
								}else{
									$("#btnAdd").removeAttr("disabled");
								}
								
								window.table.ajax.reload();
							}
							
						}
					});
					});

					
				});
			 </script>
			</div>
				<div class="col s12">
					<div class="table-container" id="reload'">
							<table class="highlight centered" id = "user-table" style="white-space:nowrap; min-height:220px!important; ">
								<thead>
									<tr>
										<th>Actions</th>
										<th>ID</th>
										<th>Series Number</th>
										<th>Contact Person</th>
										<th>Date and Time Created</th>
										<th>Lastname</th>
										<th>Firstname</th>
										<th>Middlename</th>
										<th>Contact Number</th>
										<th>Position Applying</th>
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
										</thead>
										<tbody>
										</tbody>
										</table>

											<script>
										$(function() {
											window.table = $('#user-table').DataTable({
												"order": [[ 2, "desc" ]],
												processing: true,
												ajax: '{{url("recept/data")}}',
												columns: [

													{
														"defaultContent": "<button class='btn'>Edit</button>"
													},
													{data:'id',name:'id'},
													{ data: 'series_no'},
													{defaultContent:"", data: 'recept_contact_person.firstname'},
													{ data: 'created'},
													{ data: 'lastname'},
													{ data: 'firstname'},
													{ data: 'middlename'},
													{ data: 'contact_no'},
													{ data: 'position_applying'},
													{ data: 'contact_experience'},
													{ data: 'educational_attainment'},
													{ data: 'last_year_attended'},
													{ data: 'work_status'},
													{data:"activity"},
													{data:"partner.company_name", defaultContent:"NONE"},
													{data:"site.site_name",defaultContent:"NONE"},
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
												dom: 'Brtip',
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
									


											$('#firstname').on( 'keyup', function () {
												table
													.column( 6 )
													.search( $(this).val() )
													.draw();
											} );

											$('#middlename').on( 'keyup', function () {
												table
													.column( 7 )
													.search( $(this).val() )
													.draw();
											} );

											$('#lastname').on( 'keyup', function () {
												table
													.column( 5 )
													.search( $(this).val() )
													.draw();
											} );

										});

										$('#user-table tbody').on('click', '.btn', function(){
											var id = $(this).parent().next().text();
											window.location.href = '/recept/edit/'+id;
										});

										</script>

										<script type="text/javascript">
											$(function(){
												
													$('#reload').show();
													setTimeout(function() {$('#reload').fadeOut(1500);}, 1000);
											
											});




										function validatephone(contact_no)
									    {

									        contact_no = contact_no.replace(/[^0-9]/g,'');
									        $("#phonefield").val(contact_no);

									        if( contact_no == '' || contact_no.match(/^[a-z]$/i) )
									            {
													$('#phonefield').val('');

									            }


									    }
										</script>
										</div>

				</div>
			</div>
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

@endsection
