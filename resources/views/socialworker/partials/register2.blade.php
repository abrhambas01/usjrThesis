<div class="preloader-it">
	<div class="la-anim-1"></div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Elderly Register Form</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					{!!Form::open(array('route'=>'storeSeniorInfo', 'id' => 'example-advanced-form', 'method' => 'post'))!!}
					<h3><span class="number"><i class="icon-note txt-black"></i></span><span class="head-font capitalize-font">profile</span></h3>
					<fieldset>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-wrap">
									<div class="row">
										<div class="col-md-6 col-sm-12 col-xs-12 form-group">
											<label class="control-label mb-10" for="exampleCountry">barangay:</label>
											<input id="barangay" type="text" name="barangay" class="form-control required" disabled="true" value="{{Auth::user()->barangay}}" />
											<input id="barangay_id" type="hidden" name="barangay_id" value="{{Auth::user()->barangay_id}}">
										</div>
										<div class="col-md-6 col-xs-12 form-group">
											<label class="control-label mb-10" for="exampleCountry">Address:</label>
											<div id="pac-container">
												<input id="address" type="text" name="address" class="form-control required" 
												placeholder="Enter a location">
												<input type="hidden" id="lat" name="lat">
												<input type="hidden" id="lng" name="lng">
											</div>
										</div>
										<div id="map"></div>
										<div id="infowindow-content">
											<span id="place-name"  class="title"></span><br>
											<span id="place-address"></span>
										</div>
										<div class="col-md-6 col-sm-12 col-xs-12 form-group">
											<label class="control-label mb-10" for="lastName">SCN:</label>
											<input id="scn" type="number" name="scn" class="form-control required" value="" />
											<input type="hidden" id="budget" name="budget" value="1000">
										</div>
										<div class="col-md-6 col-sm-12 col-xs-12 form-group">
											<label class="control-label mb-10" for="lastName">last name:</label>
											<input id="last_name" type="text" name="last_name" class="form-control required" value="" />
										</div>
										<div class="col-md-6 col-sm-12 col-xs-12 form-group">
											<label class="control-label mb-10" for="firstName">first name:</label>
											<input id="first_name" type="text" name="first_name" class="form-control required" value="" />
										</div>
										<div class="col-md-6 col-sm-12 col-xs-12 form-group">
											<label class="control-label mb-10" for="middleName">middle name:</label>
											<input id="middle_name" type="text" name="middle_name" class="form-control required" value="" />
										</div>																		
										<div class="col-md-6 col-sm-12 col-xs-12 form-group">
											<label class="control-label mb-10" for="gender">gender:</label>
											<select id="gender" class="form-control required" name="gender">
												<option value="Male">Male</option>
												<option value="Female">Female</option>	
											</select>
										</div>
										<div class="col-md-6 col-sm-12 col-xs-12 form-group">
											<label class="control-label mb-10" for="dob">date of birth:</label>
											<input id="dob" type="text" name="dob" data-mask="9999-99-99" class="form-control required" value="" />
										</div>
										<div class="col-md-6 col-sm-12 col-xs-12 form-group">
											<label class="control-label mb-10" for="phoneNumber">phone number:</label>
											<input type="text" id="telephone"  data-mask="(999) 999-9999" name="telephone" class="form-control required" value="" />
										</div>
										<div class="col-md-6 col-sm-12 col-xs-12 form-group">
											<label class="control-label mb-10" for="mobile">mobile number:</label>
											<input type="text" id="mobile"  data-mask="(999) 999-9999" name="mobile" class="form-control required" value="" />
										</div>
									</div>
								</div>
							</div>
						</div>	
					</fieldset>
					<h3><span class="number"><i class="icon-user txt-black"></i></span><span class="head-font capitalize-font">Caretaker's Information</span></h3>
					<fieldset>
						<div class="row">
							<div class="col-sm-12 col-xs-12">
								<hr>
								<div class="row">
									<div class="col-md-6 col-sm-12 col-xs-12 form-group">
										<label class="control-label mb-10" for="lastName">Caretaker's Name:</label>
										<input id="last_name" type="text" name="caretakers_name" class="form-control required" value="" />
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-12 col-xs-12 form-group">
									<label class="control-label mb-10" for="lastName">Caretaker's Contact Number:</label>
										<input id="last_name" type="number" name="caretakers_number" class="form-control required" value="" />
									</div>
								</div>							
								@include('errors.list')
							</div>
						</div>
					</fieldset>
					<h3><span class="number"><i class="icon-credit-card txt-black"></i></span><span class="head-font capitalize-font">Available Medicines</span></h3>
					<fieldset>
						<div class="row">
							<div class="col-sm-12 col-xs-12">
								<table class="table table-bordered">
									<thead>
										<th>Medicine Name</th>
										<th>Dosage</th>
										<th>qty</th>
										<th>Frequency (intake per day)</th>
										<!-- <th>Frequency (intake per month)</th> -->
									</thead>
									<tbody>
										<tr>
											<input type="hidden" id="status" name="status" value="pending">
											<td>
												<select name="medicine1" class="form-control select2" id ="medicine1">
													<option value="0" selected="true" disabled="true">Select Medicine</option>
													@foreach($medicines as $key => $m)
													<option value="{!!$key!!}">{!!$m!!}</option>
													@endforeach
												</select>
											</td>
											<td>
												<select name="dosage1" class="form-control" id="dosage1">
												</select>		
											</td>
											<td>
												<input id="qty1" type="text" name="qty1" class="form-control required" value="" />
											</td>
											<td>
												<input id="dailyfrequency1" type="text" name="dailyfrequency1" class="form-control required" value="" />
											</td>
											<!-- <td>
												<input id="mfrequency1" type="text" name="mfrequency1" class="form-control required" value="" />
											</td> -->
										</tr>
										<tr>
											<td>
												<select name="medicine2" class="form-control select2" id ="medicine2">
													<option value="0" selected="true" disabled="true">Select Medicine</option>
													@foreach($medicines as $key => $m)
													<option value="{!!$key!!}">{!!$m!!}</option>
													@endforeach
												</select>
											</td>
											<td>
												<select name="dosage2" class="form-control" id="dosage2">
												</select>	
											</td>
											<td>
												<input id="qty2" type="text" name="qty2" class="form-control" value="" />
											</td>
											<td>
												<input id="dailyfrequency2" type="text" name="dailyfrequency2" class="form-control" value="" />
											</td>
											<!-- <td>
												<input id="mfrequency2" type="text" name="mfrequency2" class="form-control" value="" />
											</td> -->
										</tr>
										<tr>
											<td>
												<select name="medicine3" class="form-control select2" id ="medicine3">
													<option value="0" selected="true" disabled="true">Select Medicine</option>
													@foreach($medicines as $key => $m)
													<option value="{!!$key!!}">{!!$m!!}</option>
													@endforeach
												</select>
											</td>
											<td>
												<select name="dosage3" class="form-control" id="dosage3">
												</select>
											</td>
											<td>
												<input id="qty3" type="text" name="qty3" class="form-control" value="" />
											</td>
											<td>
												<input id="dailyfrequency3" type="text" name="dailyfrequency3" class="form-control" value="" />
											</td>
											<!-- <td>
												<input id="mfrequency3" type="text" name="mfrequency3" class="form-control" value="" />
											</td> -->
										</tr>
										<tr>
											<td>
												<select name="medicine4" class="form-control select2" id ="medicine4">
													<option value="0" selected="true" disabled="true">Select Medicine</option>
													@foreach($medicines as $key => $m)
													<option value="{!!$key!!}">{!!$m!!}</option>
													@endforeach
												</select>
											</td>
											<td>
												<select name="dosage4" class="form-control" id="dosage4">
												</select>
											</td>
											<td>
												<input id="qty4" type="text" name="qty4" class="form-control" value="" />
											</td>
											<td>
												<input id="dailyfrequency4" type="text" name="dailyfrequency4" class="form-control" value="" />
											</td>
											<!-- <td>
												<input id="mfrequency4" type="text" name="mfrequency4" class="form-control" value="" />
											</td> -->
										</tr>
										<tr>
											<td>
												<select name="medicine5" class="form-control select2" id ="medicine5">
													<option value="0" selected="true" disabled="true">Select Medicine</option>
													@foreach($medicines as $key => $m)
													<option value="{!!$key!!}">{!!$m!!}</option>
													@endforeach
												</select>
											</td>
											<td>
												<select name="dosage5" class="form-control" id="dosage5">
												</select>
											</td>
											<td>
												<input id="qty5" type="text" name="qty5" class="form-control" value="" />
											</td>
											<td>
												<input id="dailyfrequency5" type="text" name="dailyfrequency5" class="form-control" value="" />
											</td>
											<!-- <td>
												<input id="mfrequency5" type="text" name="mfrequency5" class="form-control" value="" />
											</td> -->
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</fieldset>
					<h3><span class="number"><i class="icon-list txt-black"></i></span><span class="head-font capitalize-font">Confirm</span></h3>
					<fieldset>
						<div class="row">
							<center>{!!Form::submit('Save', array('class' => 'btn btn-primary'))!!}</center>
						</div>	
					</fieldset>
					<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h5 class="modal-title">Modal Content is Responsive</h5>
								</div>
								<div class="modal-body">

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-danger">Save changes</button>
								</div>
							</div>
						</div>
					</div>
					{!!Form::hidden('_token', csrf_token())!!}
					{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>
</div>
<script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
      	var map = new google.maps.Map(document.getElementById('map'), {
      		center: {lat: -33.8688, lng: 151.2195},
      		zoom: 13
      	});
      	var card = document.getElementById('pac-card');
      	var input = document.getElementById('address');
      	var types = document.getElementById('type-selector');
      	var strictBounds = document.getElementById('strict-bounds-selector');
      	

      	map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

      	var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
        	map: map,
        	anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
        	infowindow.close();
        	marker.setVisible(false);
        	var place = autocomplete.getPlace();
        	
        	document.getElementById('lat').value = place.geometry.location.lat();
        	document.getElementById('lng').value = place.geometry.location.lng();
        	console.log(lat);
        	console.log(lng);
        	if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
        }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
          	map.fitBounds(place.geometry.viewport);
          } else {
          	map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
        }
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        var address = '';
        if (place.address_components) {	
        	address = [
        	(place.address_components[0] && place.address_components[0].short_name || ''),
        	(place.address_components[1] && place.address_components[1].short_name || ''),
        	(place.address_components[2] && place.address_components[2].short_name || '')
        	].join(' ');
        }

        
        infowindowContent.children['place-name'].textContent = place.name;
        infowindowContent.children['place-address'].textContent = address;
        infowindow.open(map, marker);
    });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        
    }
</script>

<script type="text/javascript">
	var storeSeniorInfo = '{{ route('storeSeniorInfo') }}';
	var storeElderlyMedicalInfo = '{{ route('storeElderlyMedicalInfo') }}';
	var test = '{{ route('test') }}';
	var addMedicineInfo = '{{ route('addMedicineInfo') }}';
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVmWEQicKxuXHmXzrT27D8L0KuIPlyjAs&libraries=places&callback=initMap" async defer></script>

</body>
</html>