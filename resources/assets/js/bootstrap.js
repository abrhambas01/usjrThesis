import axios from 'axios';

import Vue from 'vue';

import VueRouter from 'vue-router';


import Echo from 'laravel-echo';


/** To use vuetify*/	
import Vuetify from 'vuetify';

// import vuetifyCss from 'vuetify/dist/vuetify.min.css';


window.Vue = Vue;

window.axios = axios;

window.axios.defaults.headers.common = {
	
	'X-Requested-With': 'XMLHttpRequest'

};


window.Pusher = require('pusher-js');

Vue.use(VueRouter);





/*Switched to a simple one .--- Starts here -- assigning it to window */
Vue.use(Vuetify);


Vue.prototype.authUser = window.App.user ;


window.Echo = new Echo({
	broadcaster: 'pusher',
	key: 'fdf086cdb1883a504a94',
	cluster : 'ap1',	 
	encrypted : true
});









