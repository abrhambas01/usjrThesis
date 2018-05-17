@extends('layouts.courier2')

@section('page-title', 'Deliveries For Today')

@section('title', 'Deliveries For Today')

@section('content')
{{-- <dialog class="mdl-dialog">
	<h4 class="mdl-dialog__title">What Route?</h4>
	<div class="mdl-dialog__content">
		<form name="travelOpts">
			<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
				<input type="radio" id="option-1" class="mdl-radio__button" name="options" value="1" >
				<span class="mdl-radio__label">Fastest Time</span>
			</label>

			<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
				<input type="radio" id="option-2" class="mdl-radio__button" name="options" value="2">
				<span class="mdl-radio__label">Shortest Route</span>
			</label>

			<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="avoidHighways">
				<input type="checkbox" id="avoidHighways" class="mdl-checkbox__input" >
				<span class="mdl-checkbox__label">Avoid Highways</span>
			</label>
		</form>
	</div>
	<div class="mdl-dialog__actions">
		<button type="button" class="mdl-button route" onClick="directions(1, document.forms['travelOpts'].avoidHighways.checked)">Start Routing</button>
		<button type="button" class="mdl-button close">Close</button>
	</div>
	<div id="p2" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"></div>
</dialog> --}}

<div id="map"></div>

{{-- 
<div id="control-buttons" >
	<div class="fixed-action-btn horizontal click-to-toggle">
		<!-- Colored FAB button with ripple -->
		<button type="button" id="changeMapType" class=" mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
			<i class="material-icons">map</i>
		</button>


		<ul>
			<li>
				<!-- Colored FAB button with ripple -->
				<button id="show-dialog" class="show-modal mdl-button orange mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
					<i class="material-icons">directions</i>

					<div class="mdl-tooltip mdl-tooltip--left mdl-tooltip--large" for="tt2">
						Show Route
					</div>
				</button>
			</li>
			<li>
				<button id="tt3" class="showMyLocation mdl-button teal
				mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
				<i class="material-icons">my_location</i>

				<div class="mdl-tooltip mdl-tooltip--left mdl-tooltip--large" for="tt3">
					Show My Location
				</div>
			</button>
		</li>
	</ul>
</div>
</div>
--}}
@endsection


@section('scripts')

<script>


	var dialog = document.querySelector('dialog');
	var showDialogButton = document.querySelector('#show-dialog');
	if (! dialog.showModal) {
		dialogPolyfill.registerDialog(dialog);
	}
	showDialogButton.addEventListener('click', function() {
		dialog.showModal();
	});
	dialog.querySelector('.close').addEventListener('click', function() {
		dialog.close();
	});


	// var apiGetDeliveriesUrl = '/api/v1/parcels'; 

	$(function(){

		
		new GMaps({
			div: '#map',
			lat: -12.043333,
			lng: -77.028333
		});

		var url = '/api/v1/parcels/';

		// $.get('/api/v1/parcels/to-pack',function(data){
		// 	console.log(data);

		// 	// append the content to the dom..


		// });


	});

</script>

{{-- <script src="{{ asset('js/app.js') }}"></script> --}}

@endsection