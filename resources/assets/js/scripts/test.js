import axios from 'axios';

import Vue from 'vue';
// import Vuetify from 'vuetify';


/** 
SPA Routes 
**/
import router from '../routes';


import * as VueGoogleMaps from 'vue2-google-maps';

window.Vue = Vue;

window.axios = axios;

window.axios.defaults.headers.common = {
	'X-Requested-With': 'XMLHttpRequest'
};

Vue.use(VueGoogleMaps, {
	load: {
		key: 'AIzaSyCZWTTkguiQpNFtckZZ5lpJLvVvMc0hsmI',
	}
});

// Vue.use(Vuetify);


/** 
global components
**/
Vue.component("google-map", VueGoogleMaps.Map);
Vue.component("google-marker", VueGoogleMaps.Marker);
Vue.component('pulse-loader', require('vue-spinner/src/PulseLoader.vue'));
Vue.component("delivery-map", require('../pages/DeliveryMap.vue'));

// import Test from './pages/Test.vue

const app = new Vue({
	el : '.map'
});	


