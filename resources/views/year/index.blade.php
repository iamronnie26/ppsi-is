@extends('layouts.appYear')
@extends('layouts.nav')
@section('content')
<div class="row">
	<div class="col-lg-12">
		@if(Session::has('success_msg'))
		<div class="alert alert-success">{{ Session::get('success_msg') }}
	</div>
	@endif

	@if(!empty($years))
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
			</div>
			<div class="pull-right">
				<a class="btn btn-success" href="{{ route('year.add') }}">Add New</a>
			</div>
		</div><br/><br/>
<div style="overflow-x:auto;">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<table class="table table-striped" style="width:1100px">
				<thead>
				    <th colspan="3" style="background-color:#9B2335;text-align: center;"><font color="white">Actions</font></th>
					<th style="background-color:#9B2335;text-align: center;"><font color="white">Year</font></th>
				</thead>

				<tbody>
					@foreach($years as $year)
					<tr>
						<td>
							<a href="{{ route('year.details', $year->id) }}" class="btn btn-large btn-success">DETAILS</a>
						</td>

						<td>
							<a href="{{ route('year.edit', $year->id) }}" class="btn btn-large btn-warning">EDIT</a>
						</td>

						<td>
							<a href="{{ route('year.delete', $year->id) }}" class="btn btn-large btn-danger" onclick="return confirm('Are you sure to delete?)">DELETE</a>
						</td>
						<td class="table-text" style="text-align: center;">
							<div>{{ $year->year }}</div>
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