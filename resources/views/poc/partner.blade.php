<!DOCTYPE html>
<html>
<head>
	<title>{{$partner->company_name}} | Sites</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		@include('components.messages')
				<h1>{{$partner->company_name}}</h1>

				@if(count($sites) > 0)
					<?php $url = "/saveLocation/".$partner->id; ?>
				{!!Form::open(["url"=>url($url),"method"=>"post"])!!}
					<select name="siteSelected">
						<option value="null" selected>-- Select Site Location --</option>
						@foreach($locations as $location)
							<option value="{{$location->id}}">{{$location->site_name}}</option>
						@endforeach
					</select>
					<input type="submit" value="Add">
				{!!Form::close()!!}
				
				<ul>
				@foreach($sites as $site)
					<li>{{$site->site->site_name}}</li>
				@endforeach
				</ul>
				@else
					<h2>No Sites</h2>
					<?php $url = "/saveLocation/".$partner->id; ?>
					{!!Form::open(["url"=>url($url),"method"=>"post"])!!}
					<select name="siteSelected">
						<option value="null" selected>-- Select Site Location --</option>
						@foreach($locations as $location)
							<option value="{{$location->id}}">{{$location->site_name}}</option>
						@endforeach
					</select>
					<input type="submit" value="Add">
				{!!Form::close()!!}
				@endif

				<br>
<a href="{{url('/tests')}}" class="btn btn-primary">List of Business Partners</a>

		</div>
</body>
</html>