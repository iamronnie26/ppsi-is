@extends('layouts.appPOC')
@section('title','Dashboard | POC')
@section('content')

<script type="text/javascript">
	$(function(){
		$('#showup-nav').removeClass('active');
		$('#interview-nav').removeClass('active');
		$('#dashboard-nav').addClass('active');
	});
</script>

<div class="row" id="mainContent">
	<div class="col s12">
		<div class="col s12 m12 l9">
			<div class="card maincard">
			<div class="card-content" >
					<span class="card-title"> Applicant's Informations </span>
					<div class="row">
						<div class="col s12">
							<div class="input-field inline col s12 m12 l12">
								<label for="searchField">Search</label>
								<input type="text" id="searchField">
							</div> 	
						</div>
					</div>
					<div class="row">
						<div class="col s12 m12 centered" id="controls">
							<!-- <a href="#" class="btn"><i class="small material-icons">print</i></a> -->
							<a href="javascript:void(0);" class="btn" id="btnPrint"><i class="small material-icons">print</i></a>
							@if($url == route("poc.index.today"))
							<a href="{{route('poc.all')}}"><button class="btn"><i class="small material-icons">view_module</i><span> All</span></button></a>
							<a href="{{route('poc.dashboard')}}"><button class="btn disabled" disabled><i class="small material-icons">view_module</i><span> Today</span></button></a>
							@else
							<a href="{{route('poc.all')}}"><button class="btn disabled" disabled><i class="small material-icons">view_module</i><span> All</span></button></a>
							<a href="{{route('poc.dashboard')}}"><button class="btn"><i class="small material-icons">view_module</i><span> Today</span></button></a>
							@endif

						</div>
					</div>
					<div class="row">
						<div class="col s12">
							<div class="table-container" id="dailyreport" style="min-height:400px!important;margin-bottom:10px!important;" id="dailyreport">
							<p id="header">Applicants</p>
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

								<table id="applicantsTable" class="highlight centered">
									<thead>
										<tr>
											<th>Actions</th>
											<th>ID</th>
											<th>Series Number</th>
											<th>Fullname</th>
											<th>Position Applying</th>
											<th>Status</th>
											<th>Endorsement Status</th>
										</tr>
										<tbody>
										</tbody>
									</table>
									<footer style="position:absolute;bottom:10px;">Pierre and Paul Solutions, Inc. - {{date('Y')}}</footer>
									<script>
										$(function(){
											
											var applicantsTable = window.table = $('#applicantsTable').DataTable({
												"order":[[1,"desc"]],
												"processing":true,
												ajax:"{{$url}}",
												"dom":"tp",
												columns: [
												{defaultContent:"<button class='btn'>View</button>"},
												{data:"id",name:"id"},
												{data:"series_no",name:"series_no"},
												{data:"middlename",
												"render":function(data, type, full, meta){
													return full.firstname +" "+ full.middlename +" "+ full.lastname;
												}},
												{data:"position_applying",name:"position_applying"},
												{defaultContent:"",data:"interview_status.status",name:"interview_status"}
											]
										});

										$(this.document).on('click', '#btnPrint', function(){
												$(".buttons-print")[0].click(); //trigger the click event
											});
										
										// Name of the filename when exported (except for extension)
										var export_filename = '{{Auth::user()->employee->firstname}}_POC-' + Date.now();


											$('#searchField').on('keyup change',function(){
												applicantsTable.search($(this).val()).draw();
											});

											$('#applicantsTable tbody').on( 'click', 'button', function () {
												var id = $(this).parent().next().text();
												window.location.href = "/poc/details/"+id;
											});

										});
									</script>
								</div>
							</div>					
						</div>
					</div>
				</div>
			</div>

			<div class="col s12 m12 l3 right-panel">
				<!-- Showups Summary Dashboard  -->

				<div class="card">
					<div class="card-content" style="background-color:#735AF2">
						<span class="card-title"><font color="white">Showups</font></span>
						<ul>
							<li><font color="white">Today's: <span class="new badge"><b>{{$todaysShowups}}</b></span></font></li>
							<li><font color="white">Training: <span class="new badge"><b>{{$training}}</b></span></font></li>
							<li><font color="white">Endorsed: <span class="new badge"><b>{{$endorsed}}</b></span></font></li>
						</ul>
					</div>
				</div>	
				<br>

				<!-- Interviews Summary Dashboard -->

				<div class="card" style="background-color:#4FD05D">
					<div class="card-content">
						<span class="card-title"><font color="white">Interviews</font></span>
						<ul>
							<li><font color="white">Today's: <span class="new badge">{{$totalInterviews}}</span></font></li>
							<li><font color="white">On Progress: <span class="new badge">{{$processingInterviews}}</span></font></li>
							<li><font color="white">Done: <span class="new badge">{{$doneInterviews}}</span></font></li>
						</ul>
					</div>
				</div>
				<br>
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
			window.table.ajax.reload();
          });
        </script>




<script>
	$('#applicantsTable tbody').on( 'click', '.btn-history', function () {
			var id = $(this).parent().next().text();
			$("#deleteModal").modal("open");
            $("#btnYes").click(function(){
					window.location.href = "/admin/department/delete/"+id;
	});
		});


	var btn = document.getElementById('btnPrint');
	btn.onclick = function(){
		let content = $("#dailyreport").html();
		let header = "<link rel='stylesheet' type='text/css' href='"+"{{asset('css/print.css')}}"+"' />";
		let w = window.open();
		$(w.document.body).html(content);
		$(w.document.head).html(header);
		w.print();
	}
</script>

			
	@endsection