@extends('layouts.appTQ')
@extends('layouts.nav')

@section('content')
<div class="row">
	<div class="col-lg-12">
		@if(Session::has('success_msg'))
		<div class="alert alert-success">{{ Session::get('success_msg') }}
	</div>
	@endif

	@if(!empty($interns))
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
			</div>
			<div class="pull-right">
				<a class="btn btn-success" href="{{ route('intern.add') }}">Add New</a>
			</div>
		</div><br/><br/>
<div style="overflow-x:auto;">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<table class="table table-striped">
				<thead>
				    <th colspan="3" style="background-color:#9B2335;text-align: center;"><font color="white">Actions</font></th>
					<th style="background-color:#9B2335;text-align: center;"><font color="white">Series Number TQ</th></font>
					<th style="background-color:#9B2335;text-align: center;"><font color="white">Date TQ</th></font>
					<th style="background-color:#9B2335;text-align: center;"><font color="white">WIWO TQ</th></font>
					<th style="background-color:#9B2335;text-align: center;"><font color="white">Recruiter TQ</th></font>
					<th style="background-color:#9B2335;text-align: center;"><font color="white">TQ Result</font></th>
					<th style="background-color:#9B2335;text-align: center;"><font color="white">TQ Reason</font></th>
					<th style="background-color:#9B2335;text-align: center;"><font color="white">TQ Subreason</font></th>ss
				</thead>

				<tbody>
					@foreach($tqs as $tq)
					<tr>
						<td>
							<a href="{{ route('tq.details', $tq->id) }}" class="btn btn-large btn-success">DETAILS</a>
						</td>

						<td>
							<a href="{{ route('tq.edit', $tq->id) }}" class="btn btn-large btn-warning">EDIT</a>
						</td>

						<td>
							<a href="{{ route('tq.delete', $tq->id) }}" class="btn btn-large btn-danger" onclick="return confirm('Are you sure to delete?)">DELETE</a>
						</td>

						<td class="table-text">
							<div>{{ $tq->series_no_tq }}</div>
						</td>
						<td class="table-text">
							<div>{{ $tq->date_tq}}</div>
						</td>
						<td class="table-text">
							<div>{{ $tq->wiwo_tq }}</div>
						</td>
						<td class="table-text">
							<div>{{ $tq->recruiter_tq }}</div>
						</td>
						<td class="table-text">
							<div>{{ $tq->tq_result }}</div>
						</td>
						<td class="table-text">
							<div>{{ $tq->tq_reason }}</div>
						</td>
						<td class="table-text">
							<div>{{ $tq->tq_subreason }}</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	@endif
</div>
</div>
</div>
@endsection

 