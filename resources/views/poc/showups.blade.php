@extends('layouts.appPOC')

@section('title','POC | Showups')

@section('content')
<style>

@media screen{
	footer{
		visibility:hidden;
	}
	#header{
		visibility:hidden;
	}
}
				@media print{
					#header{
		visibility:visible!important;
		font-size:2.5em;
		
	}
#header{
	visibility:visible;
}
button{
	display:none;
}

body {
-webkit-print-color-adjust: exact !important;

font-family:"Calibri",sans-serif;
	font-size:13pt;

 -ms-filter: "progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#fffada', endColorstr='#fffada')"; /* IE8 */
}

@media screen and (orientation: landscape) {
  table {
    flex-direction: row;
  }
}
table{
	position:absolute;
	top:10%;
	border:1px solid #333;
	width:70%;
	border-collapse:collapse;
	text-align:center;
}

th{
	background-color:#eee;
	padding:10px;
	border:1px solid #333;
}

table tr td:first-child{
       display:none;
}

table tr th:first-child{
        display:none;
}

tr td{
	padding:10px;
	border:1px solid #333;
}

#cards{
	box-sizing:border-box;
	position:absolute;
	top:10%;
	left:72%;
	width:28%;

}

.card{
	border:1px solid black;
	padding:30px;
}

.btn{
  display:none;
}

.card-title{
  font-size:24pt;
  position:relative;
}

footer{
  display:block;
  position:fixed;
  bottom:0;
}
}
			</style>
<script type="text/javascript">
	$(function(){
		$('#dashboard-nav').removeClass('active');
		$('#interview-nav').removeClass('active');
		$('#showup-nav').addClass('active');
	});
</script>

<div class="row">
	<div class="card" style="margin-left:10px!important;">
		<div class="card-content">
		<div class="col s12 m12 centered" id="controls">
			<a href="{{route('poc.dashboard')}}" id="btnBack" class="left small btn-flat"><i class="small material-icons">chevron_left</i><span>Back to Dashboard</span></a>
			</div>
			<div class="row">
				<div class="col s12">
					<ul class="tabs">
						<li class="tab col s3"><a href="#recept">Recept</a></li>
						<li class="tab col s3"><a href="#poc">POC</a></li>
					</ul>
					<script type="text/javascript">
						$(function(){
							$('.tabs').tabs();
						});
					</script>
					<div id="recept" class="col s12">
						<div class="row">
				<div class="col s12">
						<div class="input-field inline col s10">
							<input type="search" id="receptSearch" name="searchQuery">
							<label for="searchField">Search</label>
						</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<div class="right">
					@if($url == route("poc.data"))
					<a href="#"><button class="btn disabled" disabled>View All</button></a>
					<a href="{{url('/poc/showups/today')}}"><button class="btn">View Today</button></a>
					@else
					<a href="{{url('/poc/showups/all')}}"><button class="btn">View All</button></a>
					<a href="#"><button class="btn disabled" disabled>View Today</button></a>
					@endif
				</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
						<div class="table-container" style="min-height:300px!important;margin-bottom:50px!important;" id="dailyreport">
							<table   id="receptTable" class="highlight centered">
								<thead>
									<tr style="padding:0!important;margin:0!important;">
										<th colspan="3" style="padding:0!important;margin:0!important;"></th>
										<th colspan="3" style="padding:0!important;margin:0!important;">Applicant Name</th>
										<th colspan="3" style="padding:0!important;margin:0!important;">Contact Person</th>
										<th colspan="6" style="padding:0!important;margin:0!important;">Details</th>
									</tr>
									<tr>
										<th>Actions</th>
										<th>ID</th>
										<th>Series Number</th>
										<th>First Name</th>
										<th>Middle Name</th>
										<th>Last Name</th>
										<th>First Name</th>
										<th>Middle Name</th>
										<th>Last Name</th>
										<th>Contact Number</th>
										<th>Position Applying</th>
										<th>Call Center Experience</th>
										<th>Educational Attainment</th>
										<th>Last School Year</th>
										<th>Work Status</th>
									</tr>
								</thead>
									<tbody>
												</tbody>
											</table>
											<footer style="position:absolute;bottom:10px;">Pierre and Paul Solutions, Inc. - {{date('Y')}}</footer>

										</div>
									</div>
								</div>
									</div>
									<div id="poc" class="col s12">
				<div class="col s12">
					<div id="recept" class="col s12">
						<div class="row">
				<div class="col s12">
						<div class="input-field inline col s10">
							<input type="search" id="pocSearch" name="searchQuery">
							<label for="searchField">Search</label>
						</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<div class="right">

					@if($url === route("poc.data"))
					<a href="#"><button class="btn disabled" disabled>View All</button></a>
					<a href="{{url('/poc/showups/today')}}"><button class="btn">View Today</button></a>
					@else
					<a href="poc/showups/all"><button class="btn">View All</button></a>
					<a href=""><button class="btn disabled" disabled>View Today</button></a>
					@endif
				</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
										<div class="table-container" style="min-height:300px!important;margin-bottom:50px!important;" id="dailyreport">
										<p id="header">Applicants</p>


											<table style="display: none;" id="pocTable" class="highlight centered">
											<footer style="position:absolute;bottom:10px;">Pierre and Paul Solutions, Inc. - {{date('Y')}}</footer>
												<thead>
													<tr>
														<th colspan="3" style="padding:0!important;margin:0!important;"></th>
														<th colspan="3" style="padding:0!important;margin:0!important;">Applicant Name</th>
														<th colspan="13" style="padding:0!important;margin:0!important;">Applicant Details</th>
														
													</tr>
													<tr>
														<th>Action</th>
														<th>ID</th>
														<th>Series Number</th>
														<th>First Name</th>
														<th>Middle Name</th>
														<th>Last Name</th>
														
														<th>Address</th>

														<th>Activity</th>
														<th>Business Partner</th>
														<th>Site Endorse</th>
														<th>Birthdate</th>
														<th>Email Address</th>
														<th>Nationality</th>
														<th>Gender</th>
														<th>Marital Status</th>
														<th>Course</th>
														<th>School</th>
														<th>Year Graduated</th>
														<th>Pre - Remarks (POC)</th>
														</tr>
														</thead>
														<tbody>
														</tbody>
													</table>
													<footer style="position:absolute;bottom:10px;">Pierre and Paul Solutions, Inc. - {{date('Y')}}</footer>
												</div>
											</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<script type="text/javascript">
							window.onload = function(){
				$('#receptTable').show();
				$('#pocTable').show();

				//DataTables
				var receptTable = window.table = $('#receptTable').DataTable({
					"order":[[1,"desc"]],
					"processing":true,
					ajax:"{{$url}}",
					dom: 'Brtip',
					orientation: 'landscape',
                pageSize: 'US LETTER',

							buttons: [
									'copy', 'csv', 'excel', 'pdf', 
									{
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' )
						
                }},
									
												],
					columns: [
						
					{defaultContent:"<button class='btn'>View</button>"},
					{data:"id",name:"id"},
					{data:"series_no",name:"series_no"},
					{data:"firstname",name:"firstname"},
					{data:"middlename",name:"middlename"},
					{data:"lastname",name:"lastname"},
					{data:"contactperson.firstname",name:"contactperson.firstname"},
					{data:"contactperson.middlename",name:"contactperson.middlename"},
					{data:"contactperson.lastname",name:"contactperson.lastname"},
					{data:"contact_no",name:"contact_no"},
					{data:"position_applying",name:"position_applying"},
					{data:"contact_experience",name:"contact_experience"},
					{data:"educational_attainment",name:"educational_attainment"},
					{data:"last_year_attended",name:"last_year_attended"},
					{data:"work_status",name:"work_status"},
				
					]
				});

				var pocTable = window.table =  $('#pocTable').DataTable({
					"order":[[1,"desc"]],
					"processing":true,
					ajax:"{{$url}}",
					dom: 'Brtip',
					orientation: 'landscape',
                pageSize: 'US LETTER',

							buttons: [
									'copy', 'csv', 'excel', 'pdf', 
									{
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }},
									
												],
					columns: [
					{defaultContent:"<button class='btn'>View</button>"},
					{data:"id",name:"id"},
					{data:"series_no",name:"series_no"},
					{data:"firstname",name:"firstname"},
					{data:"middlename",name:"middlename"},
					{data:"lastname",name:"lastname"},
					{data:"address",name:"address"},
					{data:"activity",name:"interview.activity"},
					{defaultContent:"",data:"business_partner.company_name",name:"business_partner.company_name"},
					{defaultContent:"",data:"site_endorsed.site_name",name:"site_endorsed.site_name"},
					{defaultContent:"",data:"birthday",name:"birthday"},
					{data:"email",name:"email"},
					{data:"nationality",name:"nationality"},
					{data:"gender",name:"gender"},
					{data:"marital_status",name:"marital_status"},
					{data:"course",name:"course"},
					{defaultContent:"",data:"school.school_name",name:"school.school_name"},
					{data:"year_graduated",name:"year_graduated"},
					{data:"remarks",name:"interview.remarks"}
					]
				});

				//View Buttons
				$('#receptTable tbody').on( 'click', 'button', function () {
        		var id = $(this).parent().next().text();
        		window.location.href = "/poc/details/"+id;
    } );

				$('#pocTable tbody').on( 'click', 'button', function () {
        		var id = $(this).parent().next().text();
        		window.location.href = "/poc/details/"+id;
    } );


				//Search Field
				$('#receptSearch').on('keyup change',function(){
					receptTable.search($(this).val()).draw();
				});

				$('#pocSearch').on('keyup change',function(){
					pocTable.search($(this).val()).draw();
				});
			}
						

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

          Echo.channel('applicants')
          .listen('NewApplicant', (e) => {
            //   alert("yey");
			window.table.ajax.reload();
          });
        </script>




						@endsection()