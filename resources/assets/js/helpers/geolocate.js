import VueGeolocation from 'vue-browser-geolocation';


Vue.use(VueGeolocation);




export default function giveLocation(coordinates){ 	


	this.$getLocation().then(coordinates => {
		console.log(coordinates);
	});


}




