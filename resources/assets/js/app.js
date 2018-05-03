import './bootstrap';

import './components';



import router   from './routes';

import App from './views/App.vue';


/*When Using vuetify
import Layout from './views/Layout.vue';
*/


/* When rendering the admin in vue.

// import Admin from './views/Admin.vue' ; 
*/

// import VueGeolocation from 'vue-browser-geolocation';

// Vue.use(VueGeolocation);

const app = new Vue({
	el :'#app',
	render: h => h(App),
	router 
});	


