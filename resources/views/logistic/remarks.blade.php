@extends('layouts.appLogistic')
@section('title','Edit | Logistic')
@section('content')

<div class = "col s12 m12">
	<div class = "row">

		<div class = "card">

			<div class = "row">
				<br>
				<h5 class = "center-align"> EDIT RECORD </h5>
			</div>
			<br><br>

			<div class = "row">
				<form class="col s12">
				      <div class="row">
				        
				        <div class="input-field col s6">
				          <i class="material-icons prefix">fingerprint</i>
				          <input id="icon_prefix" type="text" class="validate">
				          <label for="icon_prefix">ID</label>
				        </div>

				      </div>
			    </form>
			</div>
			<br><br>
			<div class = "row">
				<form class="col s12">
				      <div class="row">
				        <div class="input-field col s6">
				            <i class="material-icons prefix">date_range</i>
				            <label class = "active" for="series_no">Endorsement Date</label>
							<input type="date" placeholder = "  " class="datepicker">
				        </div>
				        <div class="input-field col s6">
							<i class="material-icons prefix">person</i>
							<input type="number" name="series_no" placeholder="Source" id="icon_prefix">
							<label for="series_no">Source</label>
						</div>
				      </div>
			    </form>
			</div>
			<br><br>
			<div class = "row">
				<form class="col s12">
				      <div class="row">
				        <div class="input-field col s6">
				          <i class="material-icons prefix">person</i>
				          <input id="icon_prefix" type="text" placeholder="Interviewer" class="validate">
				          <label for="icon_prefix">Interviewer</label>
				        </div>
				        <div class="input-field col s6">
				          <i class="material-icons prefix">person</i>
				          <input id="icon_telephone" type="tel" placeholder="Last Name" class="validate">
				          <label for="icon_telephone">Last Name</label>
				        </div>
				      </div>
			    </form>
			</div>
			<br><br>
			<div class = "row">
				<form class="col s12">
				      <div class="row">
				        <div class="input-field col s6">
				          <i class="material-icons prefix">person</i>
				          <input id="icon_prefix" type="text" placeholder="First Name" class="validate">
				          <label for="icon_prefix">First Name</label>
				        </div>
				        <div class="input-field col s6">
				          <i class="material-icons prefix">person</i>
				          <input id="icon_telephone" type="tel" placeholder="Middle Initial" class="validate">
				          <label for="icon_telephone">Middle Initial</label>
				        </div>
				      </div>
			    </form>
			</div>
			<br><br>
			<div class = "row">
				<form class="col s12">
				      <div class="row">
				        <div class="input-field col s6">
				          <i class="material-icons prefix">local_phone</i>
				          <input id="icon_prefix" type="text" placeholder="Contact Number" class="validate">
				          <label for="icon_prefix">Contact Number</label>
				        </div>
				        <div class="input-field col s6">
				          <i class="material-icons prefix">network_cell</i>
				          <input id="icon_telephone" type="tel" placeholder="Network" class="validate">
				          <label for="icon_telephone">Network</label>
				        </div>
				      </div>
			    </form>
			</div>
			<br><br>
			<div class = "row">
				<form class="col s12">
				      <div class="row">
				        <div class="input-field col s6">
				          <i class="material-icons prefix">email</i>
				          <input id="icon_prefix" type="text" class="validate" placeholder="Email">
				          <label for="icon_prefix">Email</label>
				        </div>
				        <div class="input-field col s6">
				          <i class="material-icons prefix">school</i>
				          <input id="icon_telephone" type="tel" class="validate" placeholder="Educational Attainment">
				          <label for="icon_telephone">Educational Attainment</label>
				        </div>
				      </div>
			    </form>
			</div>
			<br><br>
			<div class = "row">
				<form class="col s12">
				      <div class="row">
				        <div class="input-field col s6">
				          <i class="material-icons prefix">date_range</i>
				          <input id="icon_prefix" type="text" placeholder="CC Experience" class="validate">
				          <label for="icon_prefix">Call Center Experience</label>
				        </div>
				        <div class="input-field col s6">
				          <i class="material-icons prefix">people_outline</i>
				          <input id="icon_telephone" type="tel" placeholder="Company" class="validate">
				          <label for="icon_telephone">Company</label>
				        </div>
				      </div>
			    </form>
			</div>
			<br><br>
			<div class = "row">
				<form class="col s12">
				      <div class="row">
				        <div class="input-field col s6">
				          <i class="material-icons prefix">comment</i>
				          <input id="icon_prefix" type="text" placeholder="Remarks" class="validate">
				          <label for="icon_prefix">Remarks</label>
				        </div>
				        <div class="input-field col s6">
				          <i class="material-icons prefix">priority_high</i>
				          <input id="icon_telephone" type="tel" class="validate" placeholder="Status">
				          <label for="icon_telephone">Status</label>
				        </div>
				      </div>
			    </form>
			</div>

			<br><br>
			<div class = "row">
				<form class="col s12  push-s9">
				      <div class="row">
				       
				          	<a class="waves-effect waves-light btn"><i class="material-icons right">send</i>Submit</a>
				       
				      </div>
			    </form>
			</div>

			

			<br><br><br>
		</div>

	</div>
</div>

@endsection