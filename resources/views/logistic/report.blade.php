@extends('layouts.appLogistic')
@section('title','Dashboard | Logistic')
@section('content')
<div class="card">
	<div class="card-content">
	<span class="card-title">Today's Summary</span>
				<div class="row">
					<div class="col s6">
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
							</tr>
							@foreach($applicants as $applicant)
								<tr>
									<td>{{$applicant["name"]}}</td>
									<td>{{$applicant["showups"]}}</td>
								</tr>
							@endforeach
						</table>
						@else
							<span>No Showups Today</span>
							<br>
						@endif

						<br>

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
								Today's Showups:{{$todaysTotalShowups}}
							</div>
						</div>
						<br>
						<div class="card">
							<div class="card-content">
							<span class="card-title" style="font-size:12pt!important;">Total Showups<br> (Month of {{date("F")}} / as of {{date('M j, Y')}}): {{$partialMonthlyTotal}}  </span>
							</div>
						</div>
					</div>
					
				</div>
				<footer style="position:absolute;bottom:10px;">Pierre and Paul Solutions, Inc. - {{date('Y')}}</footer>
				</div>
				
			</div>
		</div>
	</div>
	</div>
</div>
@endsection