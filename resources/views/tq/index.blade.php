@extends('layouts.appTQ')
@section('content')
<div class="row">
	<div class="col-lg-12">
		@if(Session::has('success_msg'))
		<div class="alert alert-success">{{ Session::get('success_msg') }}
	</div>
	@endif

	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
			</div>
		</div><br/><br/>
<div style="overflow-x:auto;">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<table class="table table-striped">
				<thead>
				    <th colspan="3" style="background-color:#9B2335;text-align: center;"><font color="white">Actions</font></th>

				    <th style="background-color:#9B2335;text-align: center;"><font color="white">Series Number</th></font>
				    <th style="background-color:#9B2335;text-align: center;"><font color="white">Fullname</th></font>
				    <th style="background-color:#9B2335;text-align: center;"><font color="white">Contact Person</th></font>
				    <th style="background-color:#9B2335;text-align: center;"><font color="white">Business Partner</th></font>

					<th style="background-color:#CFB53B;text-align: center;"><font color="white">Series Number TQ</th></font>
					<th style="background-color:#CFB53B;text-align: center;"><font color="white">Date TQ</th></font>
					<th style="background-color:#CFB53B;text-align: center;"><font color="white">WIWO TQ</th></font>
					<th style="background-color:#CFB53B;text-align: center;"><font color="white">Recruiter TQ</th></font>
					<th style="background-color:#CFB53B;text-align: center;"><font color="white">TQ Result</font></th>
					<th style="background-color:#CFB53B;text-align: center;"><font color="white">TQ Reason</font></th>
					<th style="background-color:#CFB53B;text-align: center;"><font color="white">TQ Subreason</font></th>

					<th style="background-color:#008080;text-align: center;"><font color="white">Series Number IDI</th></font>
					<th style="background-color:#008080;text-align: center;"><font color="white">Date IDI</th></font>
					<th style="background-color:#008080;text-align: center;"><font color="white">WIWO IDI</th></font>
					<th style="background-color:#008080;text-align: center;"><font color="white">Recruiter IDI</th></font>
					<th style="background-color:#008080;text-align: center;"><font color="white">IDI Result</font></th>
					<th style="background-color:#008080;text-align: center;"><font color="white">IDI Reason</font></th>
					<th style="background-color:#008080;text-align: center;"><font color="white">IDI Subreason</font></th>

					<th style="background-color:#228B22;text-align: center;"><font color="white">Series Number LINE</th></font>
					<th style="background-color:#228B22;text-align: center;"><font color="white">Date LINE</th></font>
					<th style="background-color:#228B22;text-align: center;"><font color="white">WIWO LINE</th></font>
					<th style="background-color:#228B22;text-align: center;"><font color="white">Recruiter LINE</th></font>
					<th style="background-color:#228B22;text-align: center;"><font color="white">LINE Result</font></th>
					<th style="background-color:#228B22;text-align: center;"><font color="white">LINE Reason</font></th>
					<th style="background-color:#228B22;text-align: center;"><font color="white">LINE Subreason</font></th>
				</thead>

				<tbody>
					<tr>
						<td>
							<a href="" class="btn btn-large btn-success">PROCESS</a>
						</td>

						<td>
							<a href="" class="btn btn-large btn-warning">EDIT</a>
						</td>

						<td>
							<a href="" class="btn btn-large btn-danger">DONE</a>
						</td>

						<td class="table-text">
							<div></div>
						</td>
						<td class="table-text">
							<div></div>
						</td>
						<td class="table-text">
							<div></div>
						</td>
						<td class="table-text">
							<div></div>
						</td>
						<td class="table-text">
							<div></div>
						</td>
						<td class="table-text">
							<div></div>
						</td>
						<td class="table-text">
							<div></div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</div>
@endsection

 