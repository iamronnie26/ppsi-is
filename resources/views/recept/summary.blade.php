@extends('layouts.appRecept')
@section('title','Dashboard | Reception')
@section('content')

<div class="row">
	<div class="col s12">

		<div class="card">
			<div class="card-content" style="min-height: 600px!important;" id="weekly">

<style>
					@media print{

body {
-webkit-print-color-adjust: exact !important;

font-family:"Calibri",sans-serif;
	font-size:13pt;

 -ms-filter: "progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#fffada', endColorstr='#fffada')"; /* IE8 */
}

table{
	position:relative;
	top:15%;
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

tr td{
	padding:10px;
	border:1px solid #333;
}

#cards{
	box-sizing:border-box;
	position:absolute;
	top:15%;
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

#table-title-applicants{
  position:relative;
  top:10%;
  font-size:15pt;
}

.intern,.applicant{
	position:relative;
	top:20px;
}


footer{
  display:block;
  position:fixed;
  bottom:0;
}
}
				</style>
				<span class="card-title">Today's Summary</span>
				<div class="row">
					<div class="col s8">
						<a href="javascript:void(0);" class="btn waves-effect waves-light" id="btnPrint">Print</a>
						<a href="{{route('recept.summary')}}" class="btn waves-effect waves-light">Today</a>
						<a href="{{route('recept.weekly')}}" class="btn waves-effect waves-light">Weekly</a>
						<a href="{{route('recept.monthly')}}" class="btn waves-effect waves-light">Monthly</a><br>

					</div>
				</div>
				<br><br>
				<div class="row">
					<div class="col s8" style="margin-bottom:10px!important;">

					@if(count($applicants) >0)
					<span style="font-weight:bolder;" id="table-title-applicants">Applicants</span>
						<table class="striped">
							<tr>
								<th>Name</th>
								<th>Showups</th>
								<th>Trainings</th>
								<th>Internal</th>
								<th>Active File</th>
								<th>Re:endorse</th>
								<th>OJT</th>
							</tr>	
							
							@foreach($applicants as $applicant)
							
								<tr>
									<td>{{$applicant["name"]}}</td>
									<td style="text-align:center;" >{{$applicant["showups"]}}</td>
									<td style="text-align:center;" >{{$applicant['trainings']}}</td>
									<td style="text-align:center;" >{{$applicant['internals']}}</td>
									<td style="text-align:center;" >{{$applicant['activeFiles']}}</td>
									<td style="text-align:center;" >{{$applicant['reEndorses']}}</td>
									<td style="text-align:center;" >{{$applicant['interns']}}</td>
								</tr>
							@endforeach
							
							
						</table>
						@else
							<span>No Showups Today</span>
							<br>
						@endif

						<br>

							<br/>

						@if(count($interns) >0)
						<span style="font-weight:bolder">Interns</span>
						<table class="striped">
							<tr>
								<th>Name</th>
								<th>Showups</th>
							</tr>
							@foreach($interns as $intern)
								<tr>
									<td>{{$intern["name"]}}</td>
									<td>{{$intern["showups"]}}</td>
								</tr>
							@endforeach
						</table>
						@else
							<span class="intern">No Intern Showups Today</span>
						@endif

					</div>

					<div class="col s4" id="cards">
					<div class="card">
							<div class="card-content">
							<table>
							<th><h4>Summary</h4></th>
							<tr>
								<th><h5><span class = "purple-text">Endorse</span></h5></th>
								<td><b>{{$todaysTotalShowups}}</b></td>
							</tr>
							<tr>
								<th>&nbsp;&nbsp;&nbsp;&nbsp;<font color="red">*</font> Single Endorsement:</th>
								<td>{{$todaysSingleEndorse}}</tD>
							</tr>
							@if($todaysSingleEndorse > 0)
								@foreach($businessPartnerSingle as $company_name => $total)
									<tr>
										<th class="center-align">{{$company_name}}</th>
										<td>{{$total}}</td>
									</td>
								@endforeach
							@endif
							<tr>
								<th>&nbsp;&nbsp;&nbsp;&nbsp;<font color="red">*</font> Multiple Endorsement:</th>
								<td>{{$totalMultipleEndorse}}</tD>
							</tr>
							@if($totalMultipleEndorse > 0)
								@foreach($businessPartnerMultiple as $company_name => $total)
									<tr>
										<th class="center-align">{{$company_name}}</th>
										<td>{{$total}}</td>
									</td>
								@endforeach
							@endif
							<tr>
								<th><span class = "blue-text ">Active File</span></th>
								<td><b>{{$todaysActiveFile}}</b></td>
							</tr>
							<tr>
								<th><span class = "green-text ">OJT</span></th>
								<td><b>{{$totalInterns}}</b></td>
							</tr>
							<tr>
								<th><span class = "purple-text ">Internal</span></th>
								<td><b>{{$todaysInternal}}</b></td>
							</tr>
							<tr>
								<th><span class = "orange-text ">Re Endorsed</span></th>
								<td><b>{{$todaysReEndorse}}</b></td>
							</tr>
							<tr>
								<th><span class = "pink-text ">Training</span></th>
								<td><b>{{$todaysTraining}}</b></td>
							</tr>
							<tr>
								<th><span class = "indigo-text ">GRAND TOTAL</span></th>
								<td><b>{{$grandTotal}}</b></td>
							</tr>
							</table>
							</div>
						</div>
						<br>
						<div class="card">
							<div class="card-content">
						
							<table>
							<tr>
								<center><th><span class = "red-text ">Total Showups</span></th></center>
							</tr>
							<tr>
								<th>(Month of {{date("F")}} / as of {{date('M j, Y')}}):</th>
							</tr>
							<tr>
								<td><b><font size="5"> = {{$partialMonthlyTotal}}</font></b></td>
							</tr>
							</table>
							</div>
						</div>
					</div>
					
				</div>
				<footer style="position:absolute;bottom:10px;">Pierre and Paul Solutions, Inc. - {{date('Y')}}</footer>
				</div>
				
			</div>
		</div>
	</div>
	<script>
	var btn = document.getElementById('btnPrint');
	btn.onclick = function(){
		let content = $("#weekly").html();
		let header = "<link rel='stylesheet' type='text/css' href='"+"{{asset('css/print.css')}}"+"' />";
		let w = window.open();
		$(w.document.body).html(content);
		$(w.document.head).html(header);
		w.print();
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


@endsection