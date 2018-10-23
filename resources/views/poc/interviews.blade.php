@extends('layouts.appPOC')
@section('title','POC | Interviews')
@section('content')
<script type="text/javascript">
	$(function(){
		$('#showup-nav').removeClass('active');
		$('#dashboard-nav').removeClass('active');
		$('#interview-nav').addClass('active');
	});
</script>
<script type="text/javascript">
								$(function(){
									$('.modal').modal();
								})
							</script>
<div class="row">
	<div class="col s12">
		<div class="card" style="margin-left:10px!important;">
			<div class="card-content">
				<div class="card-title">Interviews</div>			
				<div style="overflow-y:auto;">
							<table id="interviews" class="highlight centered">
								<thead>
									<tr>
										<th colspan="3">Actions</th>
										<th colspan="3">Applicant's Name</th>
										<th colspan="2">Contact Person</th>
										<th colspan="3">Details</th>
										<th colspan="2">Interviewer</th>
									</tr>
									<tr>
										<th>ID</th>
										<th>View</th>
										<th>Pass Interview</th>
										<th>First Name</th>
										<th>Middle Name</th>
										<th>Last Name</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Contact Number</th>
										<th>Position Applying</th>
										<th>First Name</th>
										<th>Last Name</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>

							<!-- Modal Structure -->
  <div id="passInterviewModal" class="modal">
    <div class="modal-content" style="min-height:300px!important;">
      <h4>Pass Interview</h4>
      <div>
      	<form action="{{route('poc.passInterview')}}" method="post">
		  {{csrf_field()}}
      		<div class="row">
      		<div class="input-field col s12">
      			<select name="contact_person">
				      <option value="" disabled selected>Choose Interviewer</option>
				      @forelse($contacts as $contact)
						<option value="{{$contact->contact_id}}">{{$contact->firstname}} {{$contact->lastname}}</option>
					  @empty
						<option value="">No Contact Person Exists</option>
					  @endforelse
    				</select>
    			<label>Contact Person</label>
				<input type="hidden" name="applicant_id" value="" id="applicant_id">
    		</div>
			<div class="input-field col s12">
          <input placeholder="Interviewer" id="current_interviewer" type="text" readonly class="validate">
          <label for="current_interviewer">Current Interviewer</label>
        </div>
      		</div>
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
      <button type="submit" class="modal-close waves-effect waves-green btn-flat"> Save </button>
	  </form>
    </div>
  </div>
          

							<script type="text/javascript">
								$(function(){
									var interviewsTable = window.table = $('#interviews').DataTable({
										"order":[[0,"desc"]],
										"processing":true,
										ajax:"{{route('poc.interviewsAll')}}",
										columns: [
										{data:"id",name:"id",class:"id"},
										{defaultContent:"<button class='waves-effect waves-light btn view'>View</button>"},
										{defaultContent:"<button class='waves-effect waves-light btn pass'>Pass Interview</button>"},
										{data:"firstname",name:"firstname"},
										{data:"middlename",name:"middlename"},
										{data:"lastname",name:"lastname"},
										{data:"contactperson.firstname",name:"contactperson.firstname"},
										{data:"contactperson.lastname",name:"contactperson.lastname"},
										{data:"contact_no",name:"contact_no"},
										{data:"position_applying",name:"position_applying"},
										{defaultContent:"",data:"interviewer.firstname",name:"interviewer.firstname"},
										{defaultContent:"",data:"interviewer.lastname",name:"interviewer.lastname"}
										]
									});

								//View Buttons
								$('#interviews tbody').on( 'click', '.view', function () {
        							var id = $(this).parent().prev().text();
        							window.location.href = "/poc/details/"+id;
        						});

        						$('#interviews tbody').on( 'click', '.pass', function () {
        							var id = $(this).parent().siblings(".id").text();
									$('#applicant_id').val(id);
									
									let url = "/poc/interviewer/"+id;

									$.ajax({
										url:url,
										dataType:"text",
										success:function(data){
											$("#current_interviewer").val(data);
										}
									});

        							$('.modal').modal('open');
        						});
        						$('select').formSelect();
    } );
							</script>
				</div>	
			</div>
		</div>
	</div>
</div>



<script src="{{asset('js/echo.js')}}"></script>
<script src="https://js.pusher.com/4.3/pusher.min.js"></script>

<script> 
          window.Echo = new Echo({
            broadcaster: 'pusher',
            key: '44c02c9ee7d5ae97cb3d',
            cluster: 'ap1',
            encrypted: true,
            logToConsole: true
          });

          Echo.channel('applicants')
          .listen('NewApplicant', (e) => {
            //   alert("yey");
			window.table.ajax.reload();
          });
        </script>
@endsection