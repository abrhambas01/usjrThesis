<template>
	<div>
		<div class="demo-card-wide mdl-card mdl-shadow--2dp"  id="weather-card">
			<div class="mdl-card__title">
				<h2 class="mdl-card__title-text">Welcome {{ authUser.name }}</h2>
			</div>
			<div class="mdl-card__supporting-text">
				<weather 
				api-key="930c613a5c44c05a5e0d5c3052630b60"
				title="Weather for Cebu City"
				latitude="10.3157"
				longitude="123.8854"
				language="en"
				units="uk">
			</weather>
		</div>
		<div class="mdl-card__actions mdl-card--border">
			<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
				See weather 
			</a>
		</div>
		<div class="mdl-card__menu">
			<button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
				<i class="material-icons">share</i>
			</button>
		</div>
	</div>

	<div class="demo-card-wide mdl-card mdl-shadow--2dp"  id="commit-chart">
		<div class="mdl-card__title">
			<h2 class="mdl-card__title-text">Delivery Charts</h2>
		</div>
		<div class="mdl-card__supporting-text">
			<commit-chart></commit-chart>
		</div>
		<div class="mdl-card__actions mdl-card--border">
			<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
				Get Started
			</a>
		</div>
		<div class="mdl-card__menu">
			<button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
				<i class="material-icons">share</i>
			</button>
		</div>
	</div>
</div>


</template>
<script>
import VueWeatherWidget from 'vue-weather-widget';

import 'vue-weather-widget/dist/css/vue-weather-widget.css';
import VueCharts from 'vue-chartjs'
import { Bar, Line } from 'vue-chartjs'
import CommitChart from '../CommitCharts.js'

export default {
	components :  {
		'weather': VueWeatherWidget,
		'commit-chart' : CommitChart
	}
}	
</script>

<style>
#weather-card {
	width : 100% ;
	margin-top: 0px;
	background-color : #FAFAFA;
}
#commit-chart {
	margin-top : 4.7%;
	width : 100% ;
	background-color : #FAFAFA;


}

.mdl-button.mdl-button--colored {
    color: #3b52ff;
}
</style>