import VueRouter from 'vue-router';

import Home from './pages/Home.vue';

import Account from './pages/Account.vue' ; 

import ToPack from './pages/ToPack.vue';

import Delivery from './pages/Delivery.vue';

import Dashboard from './pages/Dashboard.vue';

import PageNotFound from './pages/PageNotFound.vue';

import StartDelivery from './pages/StartDelivering.vue';

import DeliveryMap from './pages/DeliveryMap.vue';

const routes = [ 		
/**		
Homepage for Courier
*/
{	
	path : '/courier/:id/delivery/parcels-to-pack',
	name: 'parcelsToPack', 
	components :  { 
		default : Delivery,
		main : ToPack
	}
}, 

{	
	path : '/start-delivery',
	name: 'startDelivery', 
	components :  { 
		default : Delivery,
		main : StartDelivery
	}

	/**

	 When redirecting to the route'
	 **/


	// redirect : { name : 'parcelsToPack'}
},

{
	path : '/courier/:id/delivery/google-map', 
	name : 'googleMap' , 
	components :  { 
		default : Delivery,
		main : DeliveryMap
	}
},
{
	path : '/account', 	
	name : 'Account',
	component: Account
}, 

{ 
	path : '/', 
	name : 'home',
	component : Dashboard
},



{
	path : '* ',
	name : 'pageNotFound',
	component : PageNotFound , 
},

];

export default new VueRouter({
	routes,
	mode : 'history',
	linkActiveClass: 'is-active'
});