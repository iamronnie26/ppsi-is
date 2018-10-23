<div>
<div class="profile-pic">
	@if(Auth::user())
	
		<!-- <br/><img src="{{Auth::user()->user_image}}" class="circle valign-wrapper responsive-image" style="width:100px;height:100px;"> -->
		<br/><img src="/storage/{{Auth::user()->user_image}}" class="circle valign-wrapper responsive-image" style="width:100px;height:100px;">		
		<span id="username">{{Auth::user()->employee->firstname}} {{Auth::user()->employee->lastname}} <span id="dropdown"><i class="material-icons">arrow_drop_down</i></span>
		</span>

		<script type="text/javascript">
			$(function(){
				$('#username').click(function(){
					$('#logout').toggle();
;
					let c = $('#username i').text()
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
											<a id="logout" href="{{ route('logout') }}"
                                           				  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
	</div>
	<ul>
		<li id="applicant-nav"><i class="small material-icons">assignment_ind</i><a href="{{ route('applicants.index') }}">Applicant Page</a></li>
		<li id="user-nav"><i class="small material-icons">person_add</i><a href="{{ route('posts.index') }}">User Page</a></li>
		<li id="designation-nav"><i class="small material-icons">account_circle</i><a href="{{ route('contactPersons.index') }}">Contact Person Page</a></li>
		<li id="department-nav"><i class="small material-icons">domain</i><a href="{{ route('department.index') }}">Department Page</a></li>
		<li id="designation-nav"><i class="small material-icons">domain</i><a href="{{ route('designation.index') }}">Designation Page</a></li>
		<li id="business-partner-nav"><i class="small material-icons">work</i><a href="{{ route('businesspartners.index') }}">Business Partner Page</a></li>
		<li id="site-endorse-nav"><i class="small material-icons">domain</i><a href="{{ route('siteEndorse.index') }}">Site Endorse Page</a></li>
	</ul>
</div>