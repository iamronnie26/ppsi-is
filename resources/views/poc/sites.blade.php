<!DOCTYPE html>
<html>
<head>
	<title>Sites</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
<h1>Sites</h1>
@include('components.messages')

{!!Form::open(["url"=>url('/saveSites'),"method"=>"POST"])!!}
@if(count($businesspartners) > 0)
<select name="company">
						<option value="null" selected>-- Select Business Partner --</option>
						@foreach($businesspartners as $businesspartner)
							<option value="{{$businesspartner->id}}">{{$businesspartner->company_name}}</option>
						@endforeach
					</select><br>
@endif
		<input type="text" name="siteName" placeholder="Enter Site Name">
		<input type="submit" name="submit" value="Add">
{!!Form::close()!!}
<ul>
@foreach($sites as $site)
	<li><a href="/partner/{{$site->id}}">{{$site->site_name}}</a></li>
@endforeach
</ul>
<br>
<a href="{{url('/tests')}}" class="btn btn-primary">List of Business Partners</a>

</div>
</body>
</html>