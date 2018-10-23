<div>
	<div class="profile-pic">
	@if(Auth::user())
	<!-- <br/><img src="/storage/images/users/{{Auth::user()->user_image}}" class="circle valign-wrapper responsive-image" style="width:100px;height:100px;"> -->

	<!-- <br/><img src="/storage/images/users/Joseph_Aniciete.JPG" class="circle valign-wrapper responsive-image" style="width:100px;height:100px;"> -->

	<br/><img src="/storage/{{Auth::user()->user_image}}" class="circle valign-wrapper responsive-image" style="width:100px;height:100px;">
	<span id="username">{{Auth::user()->employee->firstname}} {{Auth::user()->employee->lastname}}<span id="dropdown"><i class="material-icons">arrow_drop_down</i></span>
		</span>

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
				<span id="position">{{Auth::user()->designation_user->designation}}</span>
			</div>
		</div>
	@endif
<a id="logout" href
="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
	</div>
	<ul>
		<li id="applicants-nav"><i class="small material-icons">dashboard</i><a href="{{route('encoder.index')}}">Applicants</a></li>
		<li id="interns-nav"><i class="small material-icons">assignment_ind</i><a href="{{route('encoder.internsToday')}}">Interns</a></li>
	</ul>
</div>