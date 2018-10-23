<div class="sidenav">
	<div class="profile-pic">
		<img src="{{asset('images/Ylona.jpg')}}" class="circle valign-wrapper responsive-image" style="width:100px;height:100px;">
		<span id="username">Marielle Agnir <span id="dropdown"><i class="material-icons">arrow_drop_down</i></span></span>

		<script type="text/javascript">
			
			$(function(){
				$('#username').click(function(){
					$('#logout').toggle();

					let c = $('#username i').text();
					if(c === "arrow_drop_down"){
						 $('#username i').text("arrow_drop_up");
					}else{
						 $('#username i').text("arrow_drop_down");
					}

				});
			});
		</script>

		<div class="row">
			<div class="col s12 centered">
				<span id="position">Logistics Coordinator</span>
			</div>
		</div>
<a id="logout" href="#!">Logout</a>
	</div>
	<ul>
		<li id="showup-nav"><i class="small material-icons">people</i><a href="{{route('logistic.index')}}">Applicants</a></li>
		<li id="interview-nav"><i class="small material-icons">work</i><a href="{{route('logistic.production')}}">Production</a></li>
		<li id="interview-nav"><i class="small material-icons">dashboard</i><a href="{{route('logistic.dashboard')}}">Dashboard</a></li>
	</ul>
</div>
