<div>
<div class="profile-pic">
@if(Auth::user())
<!-- <br/><img src="{{Auth::user()->user_image}}" class="circle valign-wrapper responsive-image" style="width:100px;height:100px;"> -->
<br/><img src="/storage/{{Auth::user()->user_image}}" class="circle valign-wrapper responsive-image" style="width:100px;height:100px;">	
		<span id="username" >{{Auth::user()->employee->firstname}} {{Auth::user()->employee->lastname}} <span id="dropdown"><i class="material-icons">arrow_drop_down</i></span>
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
				<span id="position">{{Auth::user()->employee->designation_contact_person->designation}}</span>
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
		<li id="applicant-nav"><i class="small material-icons">person_add</i><a href="{{ route('recept.index') }}">Applicant Page</a></li>
		<li id="intern-nav"><i class="small material-icons">person_add</i><a href="{{ route('intern.index') }}">Intern Page</a></li>
		<li id="summary-nav"><i class="small material-icons">dashboard</i><a href="{{ route('recept.summary') }}">Summary Page</a></li>
	</ul>
</div>