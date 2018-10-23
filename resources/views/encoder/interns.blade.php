@extends('layouts.appEncoder')
@section('title','Dashboard | Encoder')
@section('content')
<script type="text/javascript">
	$(function(){
		$('#applicants-nav').removeClass('active');
		$('#summary-nav').removeClass('active');
		$('#interns-nav').addClass('active');
	});
</script>

<div class="row" id="mainContent">
	<div class="col s12">
		<div class="col s12">
			<div class="card maincard">
				<div class="card-content">
					<span class="card-title"> Interns' Informations </span>
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
							@if($url == route('encoder.dt_interns_today'))
							<a href="{{route('encoder.internsAll')}}"><button class="btn"><i class="small material-icons">view_module</i><span> All</span></button></a>
							<a href="javascript:void(0);"><button class="btn disabled" disabled><i class="small material-icons">view_module</i><span> Today</span></button></a>
							@elseif($url == route('encoder.dt_interns_all'))
							<a href="javascript:void(0);"><button class="btn disabled" disabled><i class="small material-icons">view_module</i><span> All</span></button></a>
							<a href="{{route('encoder.internsToday')}}"><button class="btn"><i class="small material-icons">view_module</i><span> Today</span></button></a>
							@endif
						</div>
					</div>
					<div class="row">
						<div class="col s12">
							<div class="table-container" style="height:400px!important;margin-bottom:10px!important;">
								<table id="applicantsTable" class="highlight centered">
									<thead>
										<tr>
											<th>Actions</th>
											<th>ID</th>
											<th>Fullname</th>
											<th>Course</th>
											<th>OJT Hours</th>
										</tr>
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
											window.internsTable = $('#applicantsTable').DataTable({
												"order":[[1,"desc"]],
												"processing":true,
												ajax:"{{$url}}",
												"dom": 'lrtp<"clear">',
												columns: [
												{defaultContent:"<button class='btn'>Edit</button>"},
												{data:"id",name:"id"},
												{data:"full_name",name:"full_name"},
												{data:"course"},
												{data:"ojt_hours",name:"ojt_hours"},
											]
										});

										$('#searchField').on('keyup change',function(){
												applicantsTable.search($(this).val()).draw();
											});
										});

										$('#applicantsTable tbody').on( 'click', 'button', function () {
												var id = $(this).parent().next().text();
												window.location.href = "/encoder/intern/"+id+"/details";
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

          Echo.channel('interns')
          .listen('NewIntern', (e) => {
            //   alert("yey");
			window.internsTable.ajax.reload();
          });
        </script>

@endsection