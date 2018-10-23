<!DOCTYPE html>
<html>
<head>
	  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Sample Backend</title>
	<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
	<script type="text/javascript">
		var pusher = new Pusher('"cc37d8b9eb4f01dcf85e"', {
  			cluster: 'ap1'
	});

		var channel = pusher.subscribe('queueing');

		channel.bind('ApplicantQueued', function(data) {
  alert('An event was triggered with message: ' + data.message);
});
	</script>
	</head>
	<body>
		<h1 id="details"></h1>
</body>
</html>

