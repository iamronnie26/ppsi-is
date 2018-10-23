@extends('layouts.appRecept')
@section('title','Dashboard | Reception')
@section('content')

<div class="row">
	<div class="col s12">

		<div class="card">
			<div class="card-content" style="min-height: 600px!important;" id="weeklyreport">
			<style>
				@media print{
    #header{
		visibility:visible!important;
		font-size:2.5em;
		
	}

    body {
  -webkit-print-color-adjust: exact !important;

  font-family:"Calibri",sans-serif;
        font-size:13pt;

     -ms-filter: "progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#fffada', endColorstr='#fffada')"; /* IE8 */
    }

    .hidden{
       display:none;
    }
    

    button{
	display:none;
}
    
    table{
		
        position:relative;
        top:-40px!important;
        border:1px solid #333;
        width:100%;
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
        position:relative;,
        top:20px;
    }


    footer{
      display:block;
      position:absolute;
      bottom:-10px;
    }
}
			</style>
				<span class="card-title">Monthly Summary</span>
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
                                
								@foreach($reports[0]['weekly'] as $week)
                                    @foreach($week  as $key => $value)
                                        <th style="text-align:center;">{{$key}}</th>
                                    @endforeach
								@endforeach
                              
								<th>Total</th>
							</tr>
							<?php $i=0; ?>
							@while($i<count($reports))
							<tr>
								<td >{!! $reports[$i]['name'] !!}</td>
									@foreach($reports[$i]['weekly'] as $week)
										@foreach($week  as $key => $value)
											<td style="text-align:center;">{{$value}}</td>
										@endforeach
									@endforeach
								<td style="text-align:center;" >{{$reports[$i]['total']}}</td>		
							</tr>
							<?php $i++;?>
							@endwhile
							<tr>
									<td style="text-align:right;">Total Monthly Showups</td>
									@foreach($weeklyRep as $rep)
									<td>{{$rep}}</td>
									@endforeach
									<td><b>{{$monthlyTotal}}</b></td>
								</tr>
						</table>
						<br>

						@if(count($business_partners) > 0)
							@foreach($business_partners as $bpvalue)
							<table class="striped">
								<tr>
									<th colspan="2">{{$bpvalue['company_name']}}</th>
								</tr>
								@foreach($bpvalue['showups'] as $cp_showup)
								<tr>
									<td>{{$cp_showup['name']}}</td>
									<td>{{$cp_showup['total_showups']}}</td>
								</tr>
								@endforeach
							</table>
							<br>
							@endforeach
						@endif
						<br>
								</div>	
						@else
							<span>No Showups Today</span>
						@endif
					</div>
					<footer>Pierre and Paul Solutions, Inc. - {{date('Y')}}</footer>
				</div>
				
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