@extends('layouts.appLogistic')
@section('title','Dashboard | Logistic')
@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>

<div class="row" id="mainContent">
	<div class="col s12">
		<div class="col s12 m12 l9">
			<div class="card maincard">
			<div class="card-content">
				<span class="card-title"> Applicant Classification </span>
			<div class="row">
				<div class="col s12">

						<div class="input-field inline col s9 m9 l10">

						</div>
						<div class="input-field inline col s3 m3 l2">
						</div>
					{!! Form::close()!!}
				</div>
			</div>

                                            <div class="row">
                                                <div class="col s12 m12 25">
                                                  <ul class="tabs">
                                                    <li  class="tab col s2 m2 2"><a class="active" href="#hire"><span class = "purple-text "><b> New Hired</b></span></a></li>
                                                    <li  class="tab col s2 m2 2"><a href="#failed"><span class = "red-text "><b>Failed</b></span></a></li>
                                                    <li  class="tab col s2 m2 2"><a href="#ho"><span class = "red-text text-darken-3"><b>H. O.</b></span></a></li>
                                                    <li  class="tab col s2 m2 2"><a href="#dngy"><span class = "blue-text text-darken-2"><b>D.N.G.Y.</b></span></a></li>
                                                    <li  class="tab col s2 m2 2"><a href="#na"><span class = "yellow-text"><b>NA</b></span></a></li>
                                                    <li  class="tab col s2 m2 2"><a href="#cbr"><span class = "orange-text"><b>C.B.R.</b></span></a></li>
                                                  </ul>
                                                </div>
                                            </div>
                                         <br/>

                                         <div style="overflow-x:auto;">


                                          <!-- HO -->

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div id="ho" class="col s12">
                                                <div class = "divider"></div>
                                                <h5>Hired Others</h5>
                                                    <table class="highlight centered" style="white-space:nowrap;" id="usersHO-table">
                                                        <thead>
                                                            <tr>
                                                            <th>ID</th>
                                                            <th>Series Number</th>
                                                            <th>Fullname</th>
                                                            <th>Date and Time</th>
                                                            <th>Interviewer</th>
                                                            <th>Call Center Experience</th>
                                                            <th>Company Endorse</th>
                                                            <th>Contact Number</th>
                                                            <th>Email Address</th>
                                                            <th>Source</th>
                                                            <th>Remarks</th>
                                                            <th>Comments</th>  
                                                            </tr>
                                                        </thead>
                                                             <tbody>
                                                             </tbody>
                                                    </table>
                                                  
                                                        <script>
                                                        $(function() {
                                                            window.table = $('#usersHO-table').DataTable({

                                                                processing: true,
                                                                // serverSide: true,
                                                                ajax: "{{route('logistic.dataHO')}}",
                                                                columns: [
                                                                    { data: 'id', name: 'id' },
                                                                    { data: 'series_no', name: 'series_no' },
                                                                    { data: 'firstname',
                                                                        "render":function(data, type, full, meta){
                                                                            return full.firstname +" "+ full.middlename +" "+ full.lastname;
                                                                    }},
                                                                    { data: 'created', name: 'created'},
                                                                    { data:'interview.interview_id',
                                                                        "render":function(data, type, full, meta){
                                                                            return full.firstname +" "+ full.middlename +" "+ full.lastname;
                                                                    }},
                                                                    { data: 'contact_experience', name: 'contact_experience'},
                                                                    { data: 'business_partner', name: 'business_partner'},
                                                                    { data: 'contact_no', name: 'contact_no'},
                                                                    { data: 'email', name: 'email'},
                                                                    { data: 'source', name: 'source'},
                                                                    { data: 'remarks', name: 'remarks'},
                                                                    { data: 'comment', name: 'comment'}
                                                                
                                                                ],

                                                            dom: 'Bfrtip',
                                                                buttons: [
                                                                        'copy',
                                                                        'excel',
                                                                        'pdf',
                                                                        {
                                                                            extend: 'print',
                                                                            text: 'Print all',
                                                                            exportOptions: {
                                                                                modifier: {
                                                                                    selected: null
                                                                                }
                                                                            }
                                                                        },
                                                                        {
                                                                            extend: 'print',
                                                                            text: 'Print selected'
                                                                        }
                                                                    ],
                                                                    select: true
                                                            });
                                                        });

                                                                </script>
                                                             </div>
                                                            </div>

                                          <!-- DNGY -->

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div id="dngy" class="col s12">
                                                <div class = "divider"></div>
                                                <h5>Pending</h5>
                                                    <table class="highlight centered" style="white-space:nowrap;" id="usersDNGY-table">
                                                        <thead>
                                                            <tr>
                                                            <th>ID</th>
                                                            <th>Series Number</th>
                                                            <th>Fullname</th>
                                                            <th>Date and Time</th>
                                                            <th>Interviewer</th>
                                                            <th>Call Center Experience</th>
                                                            <th>Company Endorse</th>
                                                            <th>Contact Number</th>
                                                            <th>Email Address</th>
                                                            <th>Source</th>
                                                            <th>Remarks</th>
                                                            <th>Comments</th>  
                                                            </tr>
                                                        </thead>
                                                             <tbody>
                                                             </tbody>
                                                    </table>
                                                  
                                                        <script>
                                                        $(function() {
                                                            window.table = $('#usersDNGY-table').DataTable({

                                                                processing: true,
                                                                // serverSide: true,
                                                                ajax: "{{route('logistic.dataDNGY')}}",
                                                                columns: [
                                                                    { data: 'id', name: 'id' },
                                                                    { data: 'series_no', name: 'series_no' },
                                                                    { data: 'firstname',
                                                                        "render":function(data, type, full, meta){
                                                                            return full.firstname +" "+ full.middlename +" "+ full.lastname;
                                                                    }},
                                                                    { data: 'created', name: 'created'},
                                                                    { data:'interview.interview_id',
                                                                        "render":function(data, type, full, meta){
                                                                            return full.firstname +" "+ full.middlename +" "+ full.lastname;
                                                                    }},
                                                                    { data: 'contact_experience', name: 'contact_experience'},
                                                                    { data: 'business_partner', name: 'business_partner'},
                                                                    { data: 'contact_no', name: 'contact_no'},
                                                                    { data: 'email', name: 'email'},
                                                                    { data: 'source', name: 'source'},
                                                                    { data: 'remarks', name: 'remarks'},
                                                                    { data: 'comment', name: 'comment'}
                                                                
                                                                ],

                                                            dom: 'Bfrtip',
                                                                buttons: [
                                                                        'copy',
                                                                        'excel',
                                                                        'pdf',
                                                                        {
                                                                            extend: 'print',
                                                                            text: 'Print all',
                                                                            exportOptions: {
                                                                                modifier: {
                                                                                    selected: null
                                                                                }
                                                                            }
                                                                        },
                                                                        {
                                                                            extend: 'print',
                                                                            text: 'Print selected'
                                                                        }
                                                                    ],
                                                                    select: true
                                                            });
                                                        });

                                                                </script>
                                                             </div>
                                                            </div>

                                             <!-- NA -->

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div id="na" class="col s12">
                                                <div class = "divider"></div>
                                                <h5>NO ANSWER</h5>
                                                    <table class="highlight centered" style="white-space:nowrap;" id="usersNA-table">
                                                        <thead>
                                                            <tr>
                                                            <th>ID</th>
                                                            <th>Series Number</th>
                                                            <th>Fullname</th>
                                                            <th>Date and Time</th>
                                                            <th>Interviewer</th>
                                                            <th>Call Center Experience</th>
                                                            <th>Company Endorse</th>
                                                            <th>Contact Number</th>
                                                            <th>Email Address</th>
                                                            <th>Source</th>
                                                            <th>Remarks</th>
                                                            <th>Comments</th>  
                                                            </tr>
                                                        </thead>
                                                             <tbody>
                                                             </tbody>
                                                    </table>
                                                  
                                                        <script>
                                                        $(function() {
                                                            window.table = $('#usersNA-table').DataTable({

                                                                processing: true,
                                                                // serverSide: true,
                                                                ajax: "{{route('logistic.dataNA')}}",
                                                                columns: [
                                                                    { data: 'id', name: 'id' },
                                                                    { data: 'series_no', name: 'series_no' },
                                                                    { data: 'firstname',
                                                                        "render":function(data, type, full, meta){
                                                                            return full.firstname +" "+ full.middlename +" "+ full.lastname;
                                                                    }},
                                                                    { data: 'created', name: 'created'},
                                                                    { data:'interview.interview_id',
                                                                        "render":function(data, type, full, meta){
                                                                            return full.firstname +" "+ full.middlename +" "+ full.lastname;
                                                                    }},
                                                                    { data: 'contact_experience', name: 'contact_experience'},
                                                                    { data: 'business_partner', name: 'business_partner'},
                                                                    { data: 'contact_no', name: 'contact_no'},
                                                                    { data: 'email', name: 'email'},
                                                                    { data: 'source', name: 'source'},
                                                                    { data: 'remarks', name: 'remarks'},
                                                                    { data: 'comment', name: 'comment'}
                                                                
                                                                ],

                                                            dom: 'Bfrtip',
                                                                buttons: [
                                                                        'copy',
                                                                        'excel',
                                                                        'pdf',
                                                                        {
                                                                            extend: 'print',
                                                                            text: 'Print all',
                                                                            exportOptions: {
                                                                                modifier: {
                                                                                    selected: null
                                                                                }
                                                                            }
                                                                        },
                                                                        {
                                                                            extend: 'print',
                                                                            text: 'Print selected'
                                                                        }
                                                                    ],
                                                                    select: true
                                                            });
                                                        });

                                                                </script>
                                                             </div>
                                                            </div>
                                            
                                               <!-- HIRE -->

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div id="hire" class="col s12">
                                                <div class = "divider"></div>
                                                <h5>NEW HIRED</h5>
                                                    <table class="highlight centered" style="white-space:nowrap;" id="usersHired-table">
                                                        <thead>
                                                            <tr>
                                                            <th>ID</th>
                                                            <th>Series Number</th>
                                                            <th>Fullname</th>
                                                            <th>Date and Time</th>
                                                            <th>Interviewer</th>
                                                            <th>Call Center Experience</th>
                                                            <th>Company Endorse</th>
                                                            <th>Contact Number</th>
                                                            <th>Email Address</th>
                                                            <th>Source</th>
                                                            <th>Remarks</th>
                                                            <th>Comments</th>  
                                                            </tr>
                                                        </thead>
                                                             <tbody>
                                                             </tbody>
                                                    </table>
                                                  
                                                        <script>
                                                        $(function() {
                                                            window.table = $('#usersHired-table').DataTable({

                                                                processing: true,
                                                                // serverSide: true,
                                                                ajax: "{{route('logistic.dataPassed')}}",
                                                                columns: [
                                                                    { data: 'id', name: 'id' },
                                                                    { data: 'series_no', name: 'series_no' },
                                                                    { data: 'firstname',
                                                                        "render":function(data, type, full, meta){
                                                                            return full.firstname +" "+ full.middlename +" "+ full.lastname;
                                                                    }},
                                                                    { data: 'created', name: 'created'},
                                                                    { data:'interview.interview_id',
                                                                        "render":function(data, type, full, meta){
                                                                            return full.firstname +" "+ full.middlename +" "+ full.lastname;
                                                                    }},
                                                                    { data: 'contact_experience', name: 'contact_experience'},
                                                                    { data: 'business_partner', name: 'business_partner'},
                                                                    { data: 'contact_no', name: 'contact_no'},
                                                                    { data: 'email', name: 'email'},
                                                                    { data: 'source', name: 'source'},
                                                                    { data: 'remarks', name: 'remarks'},
                                                                    { data: 'comment', name: 'comment'}
                                                                
                                                                ],

                                                            dom: 'Bfrtip',
                                                                buttons: [
                                                                        'copy',
                                                                        'excel',
                                                                        'pdf',
                                                                        {
                                                                            extend: 'print',
                                                                            text: 'Print all',
                                                                            exportOptions: {
                                                                                modifier: {
                                                                                    selected: null
                                                                                }
                                                                            }
                                                                        },
                                                                        {
                                                                            extend: 'print',
                                                                            text: 'Print selected'
                                                                        }
                                                                    ],
                                                                    select: true
                                                            });
                                                        });

                                                                </script>
                                                             </div>
                                                            </div>


                                            <!-- FAILED -->

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div id="failed" class="col s12">
                                                <div class = "divider"></div>
                                                <h5>FAILED</h5>
                                                    <table class="highlight centered" style="white-space:nowrap;" id="usersFailed-table">
                                                        <thead>
                                                            <tr>
                                                            <th>ID</th>
                                                            <th>Series Number</th>
                                                            <th>Fullname</th>
                                                            <th>Date and Time</th>
                                                            <th>Interviewer</th>
                                                            <th>Call Center Experience</th>
                                                            <th>Company Endorse</th>
                                                            <th>Contact Number</th>
                                                            <th>Email Address</th>
                                                            <th>Source</th>
                                                            <th>Remarks</th>
                                                            <th>Comments</th>  
                                                            </tr>
                                                        </thead>
                                                             <tbody>
                                                             </tbody>
                                                    </table>
                                                  
                                                        <script>
                                                        $(function() {
                                                            window.table = $('#usersFailed-table').DataTable({

                                                                processing: true,
                                                                // serverSide: true,
                                                                ajax: "{{route('logistic.dataFailed')}}",
                                                                columns: [
                                                                    { data: 'id', name: 'id' },
                                                                    { data: 'series_no', name: 'series_no' },
                                                                    { data: 'firstname',
                                                                        "render":function(data, type, full, meta){
                                                                            return full.firstname +" "+ full.middlename +" "+ full.lastname;
                                                                    }},
                                                                    { data: 'created', name: 'created'},
                                                                    { data:'interview.interview_id',
                                                                        "render":function(data, type, full, meta){
                                                                            return full.firstname +" "+ full.middlename +" "+ full.lastname;
                                                                    }},
                                                                    { data: 'contact_experience', name: 'contact_experience'},
                                                                    { data: 'business_partner', name: 'business_partner'},
                                                                    { data: 'contact_no', name: 'contact_no'},
                                                                    { data: 'email', name: 'email'},
                                                                    { data: 'source', name: 'source'},
                                                                    { data: 'remarks', name: 'remarks'},
                                                                    { data: 'comment', name: 'comment'}
                                                                
                                                                ],

                                                            dom: 'Bfrtip',
                                                                buttons: [
                                                                        'copy',
                                                                        'excel',
                                                                        'pdf',
                                                                        {
                                                                            extend: 'print',
                                                                            text: 'Print all',
                                                                            exportOptions: {
                                                                                modifier: {
                                                                                    selected: null
                                                                                }
                                                                            }
                                                                        },
                                                                        {
                                                                            extend: 'print',
                                                                            text: 'Print selected'
                                                                        }
                                                                    ],
                                                                    select: true
                                                            });
                                                        });

                                                                </script>
                                                             </div>
                                                            </div>

                                            <!-- CBR -->

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div id="cbr" class="col s12">
                                                <div class = "divider"></div>
                                                <h5>CBR</h5>
                                                    <table class="highlight centered" style="white-space:nowrap;" id="usersCBR-table">
                                                        <thead>
                                                            <tr>
                                                            <th>ID</th>
                                                            <th>Series Number</th>
                                                            <th>Fullname</th>
                                                            <th>Date and Time</th>
                                                            <th>Interviewer</th>
                                                            <th>Call Center Experience</th>
                                                            <th>Company Endorse</th>
                                                            <th>Contact Number</th>
                                                            <th>Email Address</th>
                                                            <th>Source</th>
                                                            <th>Remarks</th>
                                                            <th>Comments</th>  
                                                            </tr>
                                                        </thead>
                                                             <tbody>
                                                             </tbody>
                                                    </table>
                                                  
                                                        <script>
                                                        $(function() {
                                                            window.table = $('#usersCBR-table').DataTable({

                                                                processing: true,
                                                                // serverSide: true,
                                                                ajax: "{{route('logistic.dataCBR')}}",
                                                                columns: [
                                                                    { data: 'id', name: 'id' },
                                                                    { data: 'series_no', name: 'series_no' },
                                                                    { data: 'firstname',
                                                                        "render":function(data, type, full, meta){
                                                                            return full.firstname +" "+ full.middlename +" "+ full.lastname;
                                                                    }},
                                                                    { data: 'created', name: 'created'},
                                                                    { data:'interview.interview_id',
                                                                        "render":function(data, type, full, meta){
                                                                            return full.firstname +" "+ full.middlename +" "+ full.lastname;
                                                                    }},
                                                                    { data: 'contact_experience', name: 'contact_experience'},
                                                                    { data: 'business_partner', name: 'business_partner'},
                                                                    { data: 'contact_no', name: 'contact_no'},
                                                                    { data: 'email', name: 'email'},
                                                                    { data: 'source', name: 'source'},
                                                                    { data: 'remarks', name: 'remarks'},
                                                                    { data: 'comment', name: 'comment'}
                                                                
                                                                ],

                                                            dom: 'Bfrtip',
                                                                buttons: [
                                                                        'copy',
                                                                        'excel',
                                                                        'pdf',
                                                                        {
                                                                            extend: 'print',
                                                                            text: 'Print all',
                                                                            exportOptions: {
                                                                                modifier: {
                                                                                    selected: null
                                                                                }
                                                                            }
                                                                        },
                                                                        {
                                                                            extend: 'print',
                                                                            text: 'Print selected'
                                                                        }
                                                                    ],
                                                                    select: true
                                                            });
                                                        });

                                                                </script>
                                                             </div>
                                                            </div>


                                                        
                                              
                                                </div>
                                               </div>
                                              </div>
                                             </div>
                                        

                                              
            		
                <div class = "col s11 m3">               
                   <div class="card">
                        <div class="card-content">
                            <div class = "card-title "> <h5 class="center-align">SUMMARY</h5></div>
                            <div class = "divider"></div>
                            <div class="card-body">
                                <ul>
                                	<li>1. New Hired: ({{$countHired}}) </li>
                                	<li>2. Failed: ({{ $countFailed }})</li>
                                	<li>3. Hired Others: ({{ $countHO }})</li>
                                	<li>4. D.N.G.Y.: ({{ $countDNGY }})</li>
                                	<li>5. No Answer: ({{$countNA}})</li>
                                	<li>6. C.B.R.: ({{ $countCBR }})</li>	
                                </ul>
                             </div>

                             <div class = "card-title "> <h5 class="center-align">Intern</h5></div>
                             <div class = "divider"></div>
                                <ul>
                                	<li>1. Total Interns: ({{$countIntern}}) </li>
                                </ul>

                            <div class = "card-title "> <h5 class="center-align">Trainee</h5></div>
                             <div class = "divider"></div>
                                <ul>
                                	<li>1. Total Trainees: ({{$countTraining}}) </li>
                                </ul>
                         </div>
                     </div>




<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.2/js/materialize.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>

@endsection
