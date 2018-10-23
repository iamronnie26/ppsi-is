<!DOCTYPE html>
<html>
<head>
<meta name="csrf-token" content="{{csrf_token()}}">
	<title>Business Partners</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
<h1>Business Partners</h1>
@include('components.messages')
{!!Form::open(["url"=>url("/partners"),"method"=>"POST"])!!}
		<input type="text" name="companyName" placeholder="Enter Company Name">
		<input type="submit" name="submit" value="Add" placeholder="">
{!!Form::close()!!}
<ul>
@foreach($partners as $partner)
	<li><a href="/partner/{{$partner->id}}">{{$partner->company_name}}</a></li>
@endforeach
</ul>

<br>
<a href="{{url('/sites')}}" class="btn btn-primary">List of Sites</a>

</div>
</body>
</html>