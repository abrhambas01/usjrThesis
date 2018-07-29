import './bootstrap'; 	

// import './components';


/** 
'SPA Routes 
**/
import router from './routes';


//Native MDL
// import App from './views/App.vue';


// When Using vuetify
import Mypharma from './views/Mypharma.vue';



/*
 When rendering the admin in vue.

// import Admin from './views/Admin.vue' ; 
*/

// import VueGeolocation from 'vue-browser-geolocation';

// Vue.use(VueGeolocation);

const app = new Vue({
	el :'#app',
	render: h => h(Mypharma),
	router,
	// store
});	


