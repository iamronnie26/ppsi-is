@extends('layouts.appEncoder')
@section('title','Dashboard | Encoder')
@section('content')

<script type="text/javascript">
	$(function(){
		$('#interns-nav').removeClass('active');
		$('#summary-nav').removeClass('active');
		$('#applicants-nav').addClass('active');
	});
</script>

<div class="row" id="mainContent">
	<div class="col s12">

			<div class="card">
				<div class="card-content">
					<span class="card-title"> Applicant's Informations </span>
					<div class="row">
						<div class="col s12">
							<div class="input-field inline col s12 m12 l12">
								<label for="searchField">Search</label>
								<input type="text" id="searchField">
							</div> 	
						</div>
					</div>
					<div class="row">
						<div class="col s12 m12 centered" id="controls">
							<a href="#" class="btn"><i class="small material-icons">print</i></a>
							@if($url == route('encoder.dt_appIndex'))
							<a href="{{route('encoder.indexAll')}}"><button class="btn"><i class="small material-icons">view_module</i><span> All</span></button></a>
							<a href="javascript:void(0);"><button class="btn disabled" disabled><i class="small material-icons">view_module</i><span> Today</span></button></a>
							@elseif($url == route('encoder.dt_appIndexAll'))
							<a href="javascript:void(0);"><button class="btn disabled" disabled><i class="small material-icons">view_module</i><span> All</span></button></a>
							<a href="{{route('encoder.index')}}"><button class="btn"><i class="small material-icons">view_module</i><span> Today</span></button></a>
							@endif

						</div>
					</div>

					<div class="row">
						<div class="col s12">
							<div style="height:auto!important;margin-bottom:3%!important;">
								<table id="applicantsTable" style="position:relative!important;" class="highlight centered">
									<thead>
										<tr>
											<th>Actions</th>
											<th>ID</th>
											<th>Series Number</th>
											<th>Fullname</th>
											<th>Position Applying</th>
										</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>					
						</div>
					</div>

				</div>
			</div>
			</div>
	</div>




	<script>
										$(function(){
											window.applicantsTable = $('#applicantsTable').DataTable({
												"order":[[1,"desc"]],
												"processing":true,
												ajax:"{{$url}}",
												"dom": 'lrtp<"clear">',
												columns: [
												{defaultContent:"<button class='btn'>Edit</button>"},
												{data:"id",name:"id"},
												{data:"series_no",name:"series_no"},
												{data:"full_name"},
												{data:"position_applying",name:"position_applying"},
												
											]
										});
									
										$('#searchField').on('keyup change',function(){
												applicantsTable.search($(this).val()).draw();
											});
										});

										$('#applicantsTable tbody').on( 'click', 'button', function () {
												var id = $(this).parent().next().text();
												window.location.href = "/encoder/"+id+"/details";
										});

	</script>

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
			window.applicantsTable.ajax.reload();
          });
        </script>

		
	@endsection