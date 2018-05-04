import VueRouter from 'vue-router';

import Home from './pages/Home.vue';

import Account from './pages/Account.vue' ; 

import ToPack from './pages/ToPack.vue';

import StartDelivering from './pages/StartDelivering.vue';

import Delivery from './pages/Delivery.vue';

import Dashboard from './pages/Dashboard.vue';

import PageNotFound from './pages/PageNotFound.vue';

const routes = [ 		
{
/**	
Homepage for Courier
*/
path: '/courier/:id' ,
component : Home, 
children : 
[ 
{	
	path : 'delivery/parcels-to-pack',
	name: 'Parcels To Pack', 
	component : ToPack,
}, 
{
	path : 'delivery/google-map', 
	name : 'Start Delivery' , 
	component : StartDelivering
}	
]

},

{
	path : '/account', 	
	name : 'account',
	component: Account
}, 

{ 
	path : '/', 
	name : 'dashboard',
	component : Dashboard
},
{
	path : '* ',
	name : 'pageNotFound',
	component : PageNotFound , 
}

];

export default new VueRouter({
	routes,
	// mode : 'history',
	linkActiveClass: 'is-active'
});