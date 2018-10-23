@extends('layouts.appPOC')

@section('title','Details')

@section('content')
<div class="card" id="detailsCard">
	<div class="card-content">
	<div class="col s12 m12 centered" id="controls">
		<a href="{{route('poc.dashboard')}}" id="btnBack" class="left small btn-flat"><i class="small material-icons">chevron_left</i><span>Back to Dashboard</span></a>
			</div>
			<!-- <script type="text/javascript">
					$('#btnBack').click(function(evt){
						evt.preventDefault();
						$('.mainpanel').html('');
						$('.loader').show();
						
						$('.mainpanel').load('{{route('poc.dashboard')}} #mainContent',function(){
							history.pushState(null,"","{{route('poc.dashboard')}}");
							document.title = "Dashboard | POC";
							$('.loader').hide();
						});

					});
				</script> -->
				<div class='right'>
					@if($interview->status == "Processing")
					<button href="{{route('poc.process',$showup->series_no)}}" id="btnProcess" disabled class="small btn">Processing</button>
					<button id="btnEdit" class="small btn">Edit</button>				
					@elseif($interview->status == "Done")
					<button href="{{route('poc.process',$showup->series_no)}}" id="btnProcess" disabled class="small btn">Done</button>
					<button id="btnEdit" class="small btn">Edit</button>				
					@else
					<button href="{{route('poc.process',$showup->series_no)}}" data-target="processModal" id="btnProcess" class="small btn">Process</button>
					<button id="btnEdit" class="small btn">Edit</button>
					@endif
					<script type="text/javascript">
						$(function(){
							let btnProcess = $('#btnProcess').text();
							if(btnProcess == "Process"){
								$("#btnEdit").attr('disabled',true);
							}else{
								$("#btnEdit").removeAttr('disabled');
							}	

							$('#btnProcess').click(function(){
								$('.loader').show();
								$.ajax({
									url:"{{route('poc.process',$showup->id)}}",
									method:"get",
									success:function(){
										$('.loader').hide();
										$('#btnProcess').text('Processing');
										$('#btnProcess').attr('disabled','true');
										$('#btnEdit').removeAttr('disabled');
									}
								});
							});

						});
					</script>
					<button id="btnSave" disabled class="small btn">save</button>
				</div>
				{!! Form::open(['id'=>'showupForm','url'=>route('poc.update',$showup->id),'method'=>'POST']) !!}
				{!! Form::hidden('_method','PUT')!!}
				<div class="card-title">
					<!-- Input field Start -->
					<div class="row">
						<!-- Label -->
						<div class="input-field col s12">
							<div class="col s3">
								Full Name:
							</div>
							<!-- Content -->
							<div class="col s9">
								<span class="inputs disabled">{{ $showup->firstname }} {{ $showup->middlename }} {{ $showup->lastname }}</span>
							</div>
						</div>
					</div>
					<!-- input field end -->
				</div>
				<!-- Input field Start -->
				<div class="row">
					<!-- Label -->
					<div class="input-field col s12">
						<div class="col s3">
							Series Number:
						</div>
						<!-- Content -->
						<div class="col s9">
							<span class="inputs disabled" id="series_no">{{ $showup->series_no }}</span>
						</div>
					</div>
				</div>
				<!-- input field end -->

				<!-- Input field Start -->
				<div class="row">
					<!-- Label -->
					<div class="input-field col s12">
						<div class="col s3">
							Email Address:
						</div>
						<!-- Content -->
						<div class="col s9">
							<span class="inputs" id="email" placeholder="Enter Your Email">{{ $showup->email }}</span>
						</div>
					</div>
				</div>
				<!-- input field end -->

				<!-- Input field Start -->
				<div class="row">
					<!-- Label -->
					<div class="input-field col s12">
						<div class="col s3">
							Contact Number:
						</div>
						<!-- Content -->
						<div class="col s9">
							<span class="inputs" id="contact_no">{{ $showup->contact_no }}</span>
						</div>
					</div>
				</div>
				<!-- input field end -->

				<!-- Input field Start -->
				<div class="row">
					<!-- Label -->
					<div class="input-field col s12">
						<div class="col s3">
							Address
						</div>
						<!-- Content -->
						<div class="col s9">
							<span class="inputs" id="address">{{ $showup->address }}</span>
						</div>
					</div>
				</div>
				<!-- input field end -->

				<!-- Input field Start -->
				<div class="row">
					<!-- Label -->
					<div class="input-field col s12">
						<div class="col s3">
							Nationality:
						</div>
						<!-- Content -->
						<div class="col s9">
							<span class="inputs" id="nationality">{{ $showup->nationality }}</span>
						</div>
					</div>
				</div>
				<!-- input field end -->

				<!-- Input field Start -->
				<div class="row">
					<!-- Label -->
					<div class="input-field col s12">
						<div class="col s3">
							Gender:
						</div>
						<!-- Content -->
						<div class="col s9">
							<span class="inputs gender" id="gender">{{ $showup->gender }}</span>
							
						</div>
					</div>
				</div>
				<!-- input field end -->

				<!-- Input field Start -->
				<div class="row">
					<!-- Label -->
					<div class="input-field col s12">
						<div class="col s3">
							Birthday:
						</div>
						<!-- Content -->
						<div class="col s9">
							<span class="inputs birthday" id="birthday">{{ $showup->birthdate }}</span>
							
						</div>
					</div>
				</div>
				<!-- input field end -->

				<!-- Input field Start -->
				<div class="row">
					<!-- Label -->
					<div class="input-field col s12">
						<div class="col s3">
							Marital Status:
						</div>
						<!-- Content -->
						<div class="col s9">
							<span class="inputs maritalStatus" id="marital_status">{{ $showup->marital_status }}</span>
						</div>
					</div>
				</div>
				<!-- input field end -->


				<!-- Input field Start -->
				<div class="row">
					<!-- Label -->
					<div class="input-field col s12">
						<div class="col s3">
							Date
						</div>
						<!-- Content -->
						<div class="col s9">
							<span class="inputs disabled" id="date">{{ $showup->created }}</span>
						</div>
					</div>
				</div>
				<!-- input field end -->

				

				<!-- Input field Start -->
				<div class="row">
					<!-- Label -->
					<div class="input-field col s12">
						<div class="col s3">
							Position Applying:
						</div>
						<!-- Content -->
						<div class="col s9">
							<span class="inputs disabled" id="position_applying">{{ $showup->position_applying }}</span>
						</div>
					</div>
				</div>
				<!-- input field end -->

				<!-- Input field Start -->
				<div class="row">
					<!-- Label -->
					<div class="input-field col s12">
						<div class="col s3">
							Work Status:
						</div>
						<!-- Content -->
						<div class="col s9">
							@if($showup->work_status)
							<span class="inputs work_status" id="work_status">{{ $showup->work_status }}</span>
							@else
							<span class="inputs work_status" id="work_status"></span>
							@endif
						</div>
					</div>
				</div>
				<!-- input field end -->

				<!-- Input field Start -->
				<div class="row">
					<!-- Label -->
					<div class="input-field col s12">
						<div class="col s3">
							Contact Person: 
						</div>
						<!-- Content -->
						<div class="col s9">

							@if($showup->contact_id)
							<span class="inputs disabled dd" id="contact_id">{{ $showup->contactPerson->firstname." ".$showup->contactPerson->middlename." ".$showup->contactPerson->lastname }}</span>
							@else
								<span class="inputs disabled dd" id="contact_id"></span>
							@endif

						</div>
						<input type="hidden" name="contact_person" value="{{$showup->contact_id}}">
					</div>
				</div>
				<!-- input field end -->


				<!-- Input field Start -->
				<div class="row">
					<!-- Label -->
					<div class="input-field col s12">
						<div class="col s3">
							Experience:
						</div>
						<!-- Content -->
						<div class="col s9">
							<span class="inputs" id="contact_experience">{{ $showup->contact_experience }}</span>
						</div>
					</div>
				</div>
				<!-- input field end -->

				<!-- Input field Start -->
				<div class="row">
					<!-- Label -->
					<div class="input-field col s12">
						<div class="col s3">
							Educational Attainment: 
						</div>
						<!-- Content -->
						<div class="col s9">
							<span class="inputs dd" id="educational_attainment">{{ $showup->educational_attainment }}</span>
						</div>
					</div>
				</div>
				<!-- input field end -->

				<!-- Input field Start -->
				<div class="row">
					<!-- Label -->
					<div class="input-field col s12">
						<div class="col s3">
							Last School Year Attended:
						</div>
						<!-- Content -->
						<div class="col s9">
							<span class="inputs" id="last_year_attended">{{ $showup->last_year_attended }}</span>
						</div>
					</div>
				</div>
				<!-- input field end -->

				<!-- Input field Start -->
				<div class="row">
					<!-- Label -->
					<div class="input-field col s12">
						<div class="col s3">
							Course:
						</div>
						<!-- Content -->
						<div class="col s9">
							<span class="inputs" id="course">{{ $showup->course }}</span>
						</div>
					</div>
				</div>
				<!-- input field end -->

				<!-- Input field Start -->
				<div class="row">
					<!-- Label -->
					<div class="input-field col s12">
						<div class="col s3">
							Year Graduated:
						</div>
						<!-- Content -->
						<div class="col s9">
							<span class="inputs" id="year_graduated">{{ $showup->year_graduated }}</span>
						</div>
					</div>
				</div>
				<!-- input field end -->

				<!-- Input field Start -->
				<div class="row">
					<!-- Label -->
					<div class="input-field col s12">
						<div class="col s3">
							School:
						</div>
						<!-- Content -->
						<div class="col s9">
							@if($showup->school)
							<span class="inputs school" id="school_id">{{ $showup->school->school_name }}</span>
							@else
							<span class="inputs school" id="school_id"></span>
							@endif
						</div>
						<datalist id="list-school">
							@if(count($schools)>0)
							@foreach($schools as $school)
							<option value="{{$school->school_name}}">
								@endforeach
							@endif
							</datalist>
						</div>
					</div>
					<!-- input field end -->

					<!-- Input field Start -->
				<div class="row">
					<!-- Label -->
					<div class="input-field col s12">
						<div class="col s3">
							School Address:
						</div>
						<!-- Content -->
						<div class="col s9">
							@if($showup->school)
							<span class="inputs school_address" id="school_address">{{ $showup->school->school_address }}</span>
							@else
							<span class="inputs school_address" id="school_address"></span>
							@endif
						</div>
						<datalist id="list-school-address">
							@foreach($schools as $school)
							<option value="{{$school->school_address}}">
								@endforeach
							</datalist>
						</div>
					</div>
					<!-- input field end -->

					<!-- Input field Start -->
					<div class="row">
						<!-- Label -->
						<div class="input-field col s12">
							<div class="col s3">
								Activity: 
							</div>
							<!-- Content -->
							<div class="col s9">
								@if($showup->activity)
								<span class="inputs activity" id="activity">{{ $showup->activity }}</span>
								@else
								<span class="inputs activity" id="activity"></span>
								@endif
							</div>
						</div>
					</div>
					<!-- input field end -->

						<!-- Input field Start -->
						<div class="row">
						<!-- Label -->
						<div class="input-field col s12">
							<div class="col s3">
								Choose Endorsement Status:
							</div>
							<!-- Content -->
							<div class="col s9">
								@if($showup->endorsement_status)
								<span class="inputs endorsement_status" id="endorsement_status">{{ $showup->endorsement_status }}</span>
								@else
								<span class="inputs endorsement_status" id="endorsement_status"></span>
								@endif
							</div>
						</div>
					</div>
					<!-- input field end -->

					<div class="row">
						<div class="col s12">
							<table>
								<tr>
									<th>Company Name</th>
									<th>Site</th>
									<th>Status</th>
								</tr>
								@foreach($showup)
							</table>
						</div>
					</div>

					<!-- Input field Start -->
					<div class="row">
						<!-- Label -->
						<div class="input-field col s12">
							<div class="col s3">
								Business Partner:
							</div>
							<!-- Content -->
							<div class="col s9">
								@if($showup->businessPartner)
								<span class="inputs businessPartner" id="business_partner">{{ $showup->businessPartner->company_name }}</span>
								@else
								<span class="inputs businessPartner" id="business_partner"></span>
								@endif
							</div>
						</div>
					</div>
					<!-- input field end -->

					<!-- Input field Start -->
					<div class="row">
						<!-- Label -->
						<div class="input-field col s12">
							<div class="col s3">
								Site Endorsed:
							</div>
							<!-- Content -->
							<div class="col s9">
								@if($showup->siteEndorsed)
								<span class="inputs sites" id="site_endorsed">{{ $showup->siteEndorsed->site_name }}</span>
								@else
								<span class="inputs sites" id="site_endorsed"></span>
								@endif
							</div>
						</div>
					</div>
					<!-- input field end -->

					<!-- Input field Start -->
					<div class="row">
						<!-- Label -->
						<div class="input-field col s12">
							<div class="col s3">
								Endorse To:
							</div>
							<!-- Content -->
							<div class="col s9">
								@if($showup->endorse)
								<span class="inputs endorse" id="endorse">{{ $showup->endorse }}</span>
								@else
								<span class="inputs endorse" id="endorse"></span>
								@endif
							</div>
						</div>
					</div>
					<!-- input field end -->

					<!-- Input field Start -->
					<div class="row">
						<!-- Label -->
						<div class="input-field col s12">
							<div class="col s3">
								Remarks:
							</div>
							<!-- Content -->
							<div class="col s9">
								<span class="inputs disabled" id="remarks">{{ $showup->remarks }}</span>
							</div>
						</div>
					</div>
					<!-- input field end -->

					<!-- Input field Start -->
					<div class="row">
						<!-- Label -->
						<div class="input-field col s12">
							<div class="col s3">
								Status:
							</div>
							<!-- Content -->
							<div class="col s9">
								<span class="inputs disabled" id="status">{{ $showup->interviewStatus }}</span>
							</div>
						</div>
					</div>
					<!-- input field end -->

					<!-- Input field Start -->
					<div class="row">
						<!-- Label -->
						<div class="input-field col s12">
							<div class="col s3">
								Comment:
							</div>
							<!-- Content -->
							<div class="col s9">
								@if($showup)
								<span class="inputs disabled" id="comment">{{ $showup->comment }}</span>
								@else
								<span class="inputs disabled" id="comment"></span>
								@endif
							</div>
						</div>
					</div>
					<!-- input field end -->
					{!! Form::close() !!}
					<br>
					<script type="text/javascript">

						$(document).ready(function() {
							$('select').formSelect();
						});

						$(function(){

						var email = $("#email").text();
						var contact_no = $("#contact_no").text();
						var address_street = $("#address_street").text();
						var address_municipality = $("#address_municipality").text();
						var address_province = $("#address_province").text();
						var nationality = $("#nationality").text();
						var gender = $("#gender").text();
						var marital_status = $("#marital_status").text();
						var position_applying = $("#position_applying").text();
						var work_status = $("#work_status").text();
						var birthday = $("#birthday").text();
						var contact_experience = $("#contact_experience").text();
						var educational_attainment = $("#educational_attainment").text();
						var last_year_attended = $("#last_year_attended").text();
						var course = $("#course").text();
						var year_graduated = $("#year_graduated").text();
						var school_name = $("#school_name").text();
						var school_address = $("#school_address").text();
						var activity = $("#activity").text();
						var business_partner = $("#business_partner").text();
						var endorsement_status = $("#endorsement_status").text();
						var site_endorsed = $("#site_endorsed").text();
						var remarks = $("#remarks").text();
						var status = $("#status").text();
						var comment = $("#comment").text();
						var endorse = $("#endorse").text();

							$('#btnSave').click(function(){
								$('#btnSave').attr('disabled',true);
								$('.maincard').hide();
								$('.loader').show();
								$('#btnEdit').attr('disabled',true);
								let data = $('#showupForm').serialize();
								$("#showupForm").submit();
								// if(data){
								// 	$.ajax({
								// 		url:"{{route('poc.update',$showup->id)}}",
								// 		method:'post',
								// 		data:data,
								// 		success:function(){;
								// 			$('.converted_input').each(function(){
								// 				let contents = $(this).val();
								// 				let id = $(this).attr('name');
								// 				$('#btnEdit').text('Edit');
								// 				$('#btnEdit').removeAttr('disabled');
								// 				$('.maincard').show();
								// 				$('.loader').hide();

								// 				if($(this).hasClass('disabled')){
								// 					$(this).replaceWith("<span id='"+id+"' class='inputs disabled'>" +contents+"</span>");							
								// 				}

								// 				$(this).replaceWith("<span id='"+id+"' class='inputs'>" +contents+"</span>");
								// 			});

								// 		}
								// 	});
								// }

							});

								$('#btnSave').attr('disabled',true);
									$("#btnEdit").text("Edit");

									$('.converted_input').each(function(){
										let contents = $(this).val();
										let id = $(this).attr('name');

										if($(this).hasClass('gender')){
											$(this).replaceWith("<span id='"+id+"' class='inputs gender'>" +contents+"</span>");
										}

										if($(this).hasClass("maritalStatus")){
											$(this).replaceWith("<span id='"+id+"' class='inputs maritalStatus'>" +contents+"</span>");
										}

										if($(this).hasClass("school")){
											$(this).replaceWith("<span id='"+id+"' class='inputs school'>" +contents+"</span>");
										}

										if($(this).hasClass('sites')){
											$(this).replaceWith("<span id='"+id+"' class='inputs sites'>" +contents+"</span>");							
										}

										if($(this).hasClass('work_status')){
											$(this).replaceWith("<span id='"+id+"' class='inputs work_status'>" +contents+"</span>");							
										}

										if($(this).hasClass("businessPartner")){
											$(this).replaceWith("<span id='"+id+"' class='inputs businessPartner'>" +contents+"</span>");
										}

										if($(this).hasClass("endorsement_status")){
											$(this).replaceWith("<span id='"+id+"' class='inputs endorsement_status'>" +contents+"</span>");
										}


										if($(this).hasClass("birthday")){
											$(this).replaceWith("<span id='"+id+"' class='inputs birthday'>" +contents+"</span>");
										}

										if($(this).hasClass("endorse")){
											$(this).replaceWith("<span id='"+id+"' class='inputs endorse'>" +contents+"</span>");
										}

										if($(this).hasClass('disabled')){
											$(this).replaceWith("<span id='"+id+"' class='inputs disabled'>" +contents+"</span>");							
										}


										$(this).replaceWith("<span id='"+id+"' class='inputs'>" +contents+"</span>");
									});


							$('#btnEdit').click(function(){
								let t = $(this).text();
								if(t == "Edit"){
									$(this).text("Cancel");


									$('.inputs').each(function(){
										let contents = $(this).text();
										let id = $(this).attr('id');

										if($(this).hasClass('disabled')){
											$(this).replaceWith("<input class='converted_input disabled' type='text' name='"+id+"' disabled value='" +contents+ "'>");

											//Loads gender dropdown field	
										}else if($(this).hasClass("work_status")){

											@if($showup->work_status)
											let content = "<input type='text' class='converted_input work_status' name='work_status' readonly value='{{$showup->work_status}}'>";
											@else
											let content = "<input type='text' class='converted_input work_status' readonly name='work_status'>";
											@endif

											$(this).replaceWith(content);

										//Loads school datalist
										}

										else if($(this).hasClass("gender")){

											let ddField = "<select name='gender' class='converted_input gender browser-default' id='ddGender'>"+
											@if($showup->gender == '')
											"<option value='null' selected>---- Select Gender ----</option>"+
											"<option value='Female'>Female</option>"+
											"<option value='Male'>Male</option>"+
											@elseif($showup->gender == 'Female')
											"<option value='null'>---- Select Gender ----</option>"+
											"<option value='Female' selected>Female</option>"+
											"<option value='Male'>Male</option>"+
											@elseif($showup->gender == 'Male')
											"<option value='null'>---- Select Gender ----</option>"+
											"<option value='Female'>Female</option>"+
											"<option value='Male' selected>Male</option>"+
											@else
											"<option value='null'>---- Select Gender ----</option>"+
											"<option value='Female'>Female</option>"+
											"<option value='Male'>Male</option>"+
											@endif
											"</select>";

											$(this).replaceWith(ddField);
										}
										else if($(this).hasClass("endorsement_status")){

										let ddField = "<select name='endorsement_status' class='converted_input endorsement_status browser-default' name='ddendorsement_status' id='ddendorsement_status' onchange='return myFunction(this.value);'>"+
										@if($showup->endorsement_status == '')
										"<option value='null' selected hidden>---- Select Endorsement Status ----</option>"+
										"<option value='Single Endorsement'>Single Endorsement</option>"+
										"<option value='Multiple Endorsement'>Multiple Endorsement</option>"+
										@elseif($showup->endorsement_status == 'Single Endorsement')
										"<option value='null' selected hidden>---- Select Endorsement Status ----</option>"+
										"<option value='Single Endorsement'>Single Endorsement</option>"+
										"<option value='Multiple Endorsement'>Multiple Endorsement</option>"+
										@elseif($showup->endorsement_status == 'Multiple Endorsement')
										"<option value='null' selected>---- Select Endorsement Status ----</option>"+
										"<option value='Single Endorsement'>Single Endorsement</option>"+
										"<option value='Multiple Endorsement'>Multiple Endorsement</option>"+
										@else
										"<option value='null' selected hidden>---- Select Endorsement Status ----</option>"+
										"<option value='Single Endorsement'>Single Endorsement</option>"+
										"<option value='Multiple Endorsement'>Multiple Endorsement</option>"+
										@endif
										"</select>";

										$(this).replaceWith(ddField);

										//Loads school datalist
										}else if($(this).hasClass("school")){
											@if($showup->school)
											let content = "<input type='text' class='converted_input school' list='list-school' name='school' value='{{$showup->school->school_name}}'>";
											@else
											let content = "<input type='text' class='converted_input school' list='list-school' name='school'>";
											@endif


											$(this).replaceWith(content);

										//Loads business partner dropdown field
										}else if($(this).hasClass("school_address")){
											@if($showup->school)
											let content = "<input type='text' class='converted_input school_address' list='list-school-address' name='school_address' value='{{$showup->school->school_address}}'>";
											@else
											let content = "<input type='text' class='converted_input school_address' list='list-school-address' name='school_address'>";
											@endif

											$(this).replaceWith(content);

										//Loads business partner dropdown field
										}

										else if($(this).hasClass("businessPartner")){
											let name = $(this).attr("id");
											let content = "<select name='"+name+"' class='converted_input businessPartner browser-default' id='select_business_partner' disabled>"+
												@if($showup->business_partner == 0 || $showup->partner_id == null)
													"<option value='null' selected>---- Select Business Partner ----</option>"+
												@else
													"<option value='null'>---- Select Business Partner ----</option>"+
													@foreach($businessPartners as $businessPartner)
															"<option value='{{$businessPartner->id}}'>{{$businessPartner->company_name}}</option>"+
													@endforeach
												@endif
												@foreach($businessPartners as $businessPartner)
															"<option value='{{$businessPartner->id}}'>{{$businessPartner->company_name}}</option>"+
													@endforeach
											"</select>";

											$(this).replaceWith(content);
											let business_partner = "{{$showup->business_partner}}";
											$("select[name=business_partner").val(business_partner);
										}

										else if($(this).hasClass("birthday")){
											let name = $(this).attr("id");
											let content = "<input type='date' id='bday' class='converted_input datepicker' name='"+name+"' value='"+contents+"'>";
											$(this).replaceWith(content);
										    $('.datepicker').datepicker({
										    	"format":"yyyy-mm-dd",
										    	"yearRange":50	
										    });

										}

										//Loads site endorsed dropdown field
										else if($(this).hasClass("sites")){
											let name = $(this).attr("id");
											let content = "<select name='"+name+"' class='converted_input sites browser-default' id='select_site' disabled>"+
													@if($showup->site_endorsed == null || $showup->site_endorsed == 0)
														"<option value='null' selected>---- Select Site ----</option>"+
													@else
														"<option>---- Select Site ----</option>"+
													@endif
													@foreach($sites as $site)
														@if($site->id == $showup->site_endorsed)
															"<option selected value='{{$site->id}}'>{{$site->site_name}}</option>"+
														@else
															"<option value='{{$site->id}}'>{{$site->site_name}}</option>"+
														@endif
													@endforeach
											"</select>";

											$(this).replaceWith(content);
										}

										else if($(this).hasClass("activity")){
											let name = $(this).attr("id");
											let content = "<select name='"+name+"' class='converted_input activity browser-default'>"+
													@if($showup->activity == null || $showup->activity == 0)
														"<option value='null' selected>---- Select Activity ----</option>"+
													@endif
															"<option value='NA'>N/A</option>"+
															"<option value='Onsite'>Onsite</option>"+
															"<option value='Direct Endorsement'>Direct Endorsement</option>"+
															"<option value='Remote/UDP'>Remote/UDP</option>"+
											"</select>";
										
											$(this).replaceWith(content);
											let d = "{{$showup->activity}}";
											if(d == ""){
												$("select[name=activity").val('null');
											}else{
											$("select[name=activity").val(d);
											}
										}

										else if($(this).hasClass("endorse")){
											let name = $(this).attr("id");
											let content = "<select name='"+name+"' class='converted_input endorse browser-default'>"+
													@if($showup->endorse == null || $showup->endorse == 0)
														"<option value='null' selected>---- Select Endorsement ----</option>"+
													@endif
															"<option value='Endorse to Client'>Endorse to Client</option>"+
															"<option value='Endorse to Training'>Endorse to Training</option>"+
															"<option value='Endorse to Local'>Endorse to Local</option>"+
											"</select>";
										
											$(this).replaceWith(content);
											let d = "{{$showup->endorse}}";
											if(d == ""){
												$("select[name=endorse").val('null');
											}else{
											$("select[name=endorse").val(d);
											}
										}


											

										//Loads marital status dropdown field
										else if($(this).hasClass("maritalStatus")){

											let ddField = "<select name='marital_status' class='converted_input maritalStatus browser-default'>"+
											@if($showup->marital_status == null)
											"<option value='null' selected>---- Select Marital Status ----</option>"+
											"<option value='Single'>Single</option>"+
											"<option value='Married'>Married</option>"+
											"<option value='Widowed'>Divorced</option>"+
											"<option value='Separated'>Separated</option>"+
											@elseif($showup->marital_status === "Single")
											"<option value='null'>---- Select Marital Status ----</option>"+
											"<option value='Single' selected>Single</option>"+
											"<option value='Married'>Married</option>"+
											"<option value='Widowed'>Divorced</option>"+
											"<option value='Separated'>Separated</option>"+
											@elseif($showup->marital_status === "Married")
											"<option value='null'>---- Select Marital Status ----</option>"+
											"<option value='Single'>Single</option>"+
											"<option value='Married' selected>Married</option>"+
											"<option value='Widowed'>Divorced</option>"+
											"<option value='Separated'>Separated</option>"+
											@elseif($showup->marital_status === "Divorced")
											"<option value='null'>---- Select Marital Status ----</option>"+
											"<option value='Single'>Single</option>"+
											"<option value='Married'>Married</option>"+
											"<option value='Widowed' selected>Divorced</option>"+
											"<option value='Separated'>Separated</option>"+
											@elseif($showup->marital_status === "Separated")
											"<option value='null'>---- Select Marital Status ----</option>"+
											"<option value='Single'>Single</option>"+
											"<option value='Married'>Married</option>"+
											"<option value='Widowed'>Divorced</option>"+
											"<option value='Separated' selected>Separated</option>"+

											@else
											"<option value='null' selected>---- Select Marital Status ----</option>"+
											"<option value='Single'>Single</option>"+
											"<option value='Married'>Married</option>"+
											"<option value='Widowed'>Divorced</option>"+
											"<option value='Separated'>Separated</option>"+
											@endif
											"</select>";

											$(this).replaceWith(ddField);
										}
										else{
											$(this).replaceWith("<input class='converted_input' type='text' name='"+id+"' value ='" +contents+ "'>");
										}
										$('#btnSave').removeAttr('disabled');
									});
								}else{
									$('#btnSave').attr('disabled',true);
									$(this).text("Edit");
									$('.converted_input').each(function(){
										let contents = $(this).val();
										let id = $(this).attr('name');

										if($(this).hasClass('gender')){
											$(this).replaceWith("<span id='"+id+"' class='inputs gender'></span>");
										}

										if($(this).hasClass("maritalStatus")){
											$(this).replaceWith("<span id='"+id+"' class='inputs maritalStatus'></span>");
										}

										if($(this).hasClass("school")){
											$(this).replaceWith("<span id='"+id+"' class='inputs school'></span>");
										}

										if($(this).hasClass("school_address")){
											$(this).replaceWith("<span id='"+id+"' class='inputs school_address'></span>");
										}

										if($(this).hasClass('sites')){
											$(this).replaceWith("<span id='"+id+"' class='inputs sites'></span>");							
										}

										if($(this).hasClass('work_status')){
											$(this).replaceWith("<span id='"+id+"' class='inputs work_status'></span>");							
										}

										if($(this).hasClass("businessPartner")){
											$(this).replaceWith("<span id='"+id+"' class='inputs businessPartner'></span>");
										}

										if($(this).hasClass("endorsement_status")){
											$(this).replaceWith("<span id='"+id+"' class='inputs endorsement_status'></span>");
										}

										if($(this).hasClass("birthday")){
											$(this).replaceWith("<span id='"+id+"' class='inputs birthday'></span>");
										}

										if($(this).hasClass("endorse")){
											$(this).replaceWith("<span id='"+id+"' class='inputs endorse'></span>");
										}

										if($(this).hasClass('disabled')){
											$(this).replaceWith("<span id='"+id+"' class='inputs disabled'>" +contents+"</span>");							
										}


										$(this).replaceWith("<span id='"+id+"' class='inputs'></span>");

										$("#email").text(email);
						$("#contact_no").text(contact_no);
						$("#address_street").text(address_street);
						$("#address_municipality").text(address_municipality);
						$("#address_province").text(address_province);
						$("#nationality").text(nationality);
						$("#gender").text(gender);
						$("#marital_status").text(marital_status);
						$("#position_applying").text(position_applying);
						$("#work_status").text(work_status);
						$("#birthday").text(birthday);
						$("#contact_experience").text(contact_experience);
						$("#educational_attainment").text(educational_attainment);
						$("#last_year_attended").text(last_year_attended);
						$("#course").text(course);
						$("#year_graduated").text(year_graduated);
						$("#school_name").text(school_name);
						$("#school_address").text(school_address);
						$("#activity").text(activity);
						$("#business_partner").text(business_partner);
						$("#endorsement_status").text(endorsement_status);
						$("#site_endorsed").text(site_endorsed);
						$("#remarks").text(remarks);
						$("#status").text(status);
						$("#comment").text(comment);
						$("#endorse").text(endorse);
									});


								}

							});
						});
					</script>

<div id="deleteModal" class="modal">
    <div class="modal-content" style="min-height:400px!important;">
	<center><h4 class = "orange-text ">Multiple Endorsement</h4></center>
	<div class = "input-field col s10">
	<span class = "blue-text ">Endorsement List: </span>
	<br/><br/>
	</div>
	<div class="row">
	
   
		 <div class="input-field col s12 m4 ">
			<select class="icons" name='endorsement_businessPartner_1'>
			<option value="" disabled selected>Choose Business Partner</option>
						
			</select>
			<label>Endorsement 1</label>
		</div> 

		<div class="input-field col s12 m4 ">
			<select class="icons" name='endorsement_businessPartner_2'>
			<option value="" disabled selected>Choose Business Partner</option>
			
			</select>
			<label>Endorsement 2</label>
		</div> 

		<div class="input-field col s12 m4 ">
			<select class="icons" name='endorsement_businessPartner_3'>
			<option value="" disabled selected>Choose Business Partner</option>
			
			</select>
			<label>Endorsement 3</label>
		</div> 

			 <div class="input-field col s12 m4 ">
			<select class="icons" name='endorsement_site_1'>
			<option value="" disabled selected>Choose Site Location</option>
			
			</select>
		</div> 

		<div class="input-field col s12 m4 ">
			<select class="icons" name='endorsement_site_2'>
			<option value="" disabled selected>Choose Site Location</option>
			
			</select>
		</div> 

		<div class="input-field col s12 m4 ">
			<select class="icons" name='endorsement_site_3'>
			<option value="" disabled selected>Choose Site Location</option>
			
			</select>
		</div> 
	
    
	
  </div>
  <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
      <button type="submit" class="modal-close waves-effect waves-green btn-flat"> Save </button>
	</div>
	
</div>

				<script>		
				function myFunction(ddendorsement_status) {

					if(ddendorsement_status=='Multiple Endorsement'){

						$("#deleteModal").modal();
						$("#deleteModal").modal("open");
						document.getElementById("select_business_partner").disabled = true;
						document.getElementById("select_site").disabled = true;
					}else{
						document.getElementById("select_business_partner").disabled = false;
						document.getElementById("select_site").disabled = false;
					}
					
				}
				</script>
				</div>
			</div>



			@endsection