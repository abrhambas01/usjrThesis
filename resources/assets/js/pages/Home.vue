<template>

	<section class="mdl-layout__tab-panel is-active" id="scroll-tab-1">
		<div class="page-content">
			<h3>Ok</h3>
		</div>
	</section>


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
	margin-top:30px;
	background-color : #FAFAFA;
}
#commit-chart {
	margin-top : 4.7%;
	width : 100% ;
	background-color : #FAFAFA;


}
</style>