<link rel="stylesheet" type="text/css" href="css/table.css">
<div class="container">


	

	<table>
		<tr>
			<th>Series Number</th>
			<th>Fullname</th>
			<th>Contact Number</th>
			<th>Email</th>
			<th>Nationality</th>
			<th>Gender</th>
			<th>Marital Status</th>
			<th>Position Applying</th>
			<!-- <th>Work Stauts</th>
			<th>Contact Person</th>
			<th>Address</th>
			<th>Educational Attainment</th>
			<th>Course</th>
			<th>Year Graduated</th> -->
		</tr>
		@foreach ($items as $key => $item)
		<tr>
			<!-- <td>{{ ++$key }}</td> -->
			<td>{{ $item->series_no }}</td>
			<td>{{ $item->firstname }} {{ $item->middlename }} {{ $item->lastname }}</td>
			<td>{{ $item->contact_no }}</td>
			<td>{{ $item->email}}</td>
			<td>{{ $item->nationality }}</td>
			<td>{{ $item->gender }}</td>
			<td>{{ $item->marital_status }}</td>
			<td>{{ $item->position_applying }}</td>
			<!-- <td>{{ $item->work_status }}</td>
			<td>{{ $item->contact_id}}</td>
			<td>{{ $item->educational_attainment }}</td>
			<td>{{ $item->course }}</td>
			<td>{{ $item->year_graduated }}</td> -->
		</tr>
		@endforeach
	</table>
</div>