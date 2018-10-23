<link rel="stylesheet" type="text/css" href="css/table.css">
<div class="container">

	<table>
		<tr>
			<th>Series Number</th>
			<th>Endorsement Date</th>
			<th>Source</th>
			<th>Interviewer</th>
			<th>Fullname</th>
			<th>Contact Number</th>
			<th>Network</th>
			<th>Email</th>
			<th>Educational Attainment</th>
			<th>Call Center Experience</th>
			<th>Company</th>
			<th>Remarks</th>
			<th>Status</th>
		</tr>

		@foreach ($items as $key => $item)
		<tr>
			<td>{{ $item->series_no }}</td>
			<td>{{ $item->created}}</td>
			
			<td>{{ $item->contact_id }}</td>
			<td>{{ $item->firstname }} {{ $item->middlename }} {{ $item->lastname }} </td>
			<td>{{ $item->contact_no }}</td>
			<td>{{ $item->email }}</td>
		</tr>
		@endforeach
	</table>
</div>