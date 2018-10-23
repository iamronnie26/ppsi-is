@extends('layouts.appRecept')
@section('title','Dashboard | Reception')
@section('content')

<div class="row">
	<div class="col s12">

		<div class="card">
			<div class="card-content" style="min-height: 600px!important;" id="weeklyreport">
			<style>
				@media print{

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
				<span class="card-title">Weekly Summary</span>
				<div class="row">
				<div class="col s8">
						<a href="javascript:void(0);" class="btn waves-effect waves-light" id="btnPrint">Print</a>
						<a href="{{route('recept.summary')}}" class="btn waves-effect waves-light">Today</a>
						<a href="{{route('recept.weekly')}}" class="btn waves-effect waves-light">Weekly</a>
						<a href="{{route('recept.monthly')}}" class="btn waves-effect waves-light">Monthly</a><br>

					</div>
				</div>
				<br><br>
				<div class="row" style="margin-bottom:10px!important;" >
					<div class="col s12">
                    @if(count($reports) >0)
						<table class="striped">
							<tr>
								<th>Name</th>
								@foreach($reports[0]['weekly'] as $date)
									<th style="text-align:center;">{{$date['date']}}</th>
								@endforeach
							</tr>

							@foreach($reports as $report)
							<tr>
							<td >{{$report['name']}}</td>
								@foreach($report['weekly'] as $showup)
								<td style="text-align:center;">{{$showup['showups']}}</td>
								@endforeach
							</tr>
							@endforeach
						
						</table>
						<br>
						<div id="cards">
							<div class="row">
								<div class="col s12">
								<div class="card z-depth-1" style="box-shadow:none!important;">
									<div class="card-content">
										<span class="card-title" style="font-size:12pt!important;">Weekly Showups: </span>
										{{$totalShowups}}
									</div>
								</div>							</div>
							</div>
						<br>

							<div class="row">
								<div class="col s12">
								<div class="card z-depth-1" style="box-shadow:none!important;">
									<div class="card-content">
										<span class="card-title" style="font-size:12pt!important;">Total Showups (Month of {{date("F")}} / as of {{date('M j, Y')}}): {{$partialMonthlyTotal}}  </span>
									</div>
								</div>							</div>
							</div>
								<br>
								</div>	
						@else
							<span>No Showups Today</span>
						@endif
					</div>
				</div>

				<footer>Pierre and Paul Solutions, Inc. - {{date('Y')}}</footer>
				
			</div>
		</div>

	</div>
</div>


<script>
	var btn = document.getElementById('btnPrint');
	btn.onclick = function(){
		let content = $("#weeklyreport").html();
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