<template>

	<google-map :center="center" :zoom="7" style="width: 100%; height: 100vh;">
		<google-marker 
		v-for="(m, index) in markers"
		:key="index" 
		:position="m.position" 
		:clickable="true" :draggable="true" @click="center=m.position">
		
	</google-marker>

	<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
		<i class="material-icons">add</i>
	</button>

	</google-map>

</template>


<script>
import locate from '../helpers/geolocate';

export default {
	data(){
		return {
			coordinates : [],
			center: {
				lat: 10.0,
				lng: 10.0
			},
			markers: [{
				position: {
					lat: 10.0,
					lng: 10.0
				}
			}, {
				position: {
					lat: 11.0,
					lng: 11.0
				}
			}]
		}
		
	}, 

	mounted(){
		this.fetchDeliveries();
		this.initializeMap() ; 
	},


	methods : {

//Get the location of the user.. F


intializeMap(){


	getLocation () ;


},

fetchDeliveries(){
	axios.get('api/v1/deliveries/information')
	.then(response => this.coordinates = response.data)
	.catch(error => console.log(error.response.data));

}
}
};
</script>