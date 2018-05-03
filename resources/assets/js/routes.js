import VueRouter from 'vue-router';

import Home from './pages/Home.vue';

import Account from './pages/Account.vue' ; 

import ToPack from './pages/ToPack.vue';

import StartDelivering from './pages/StartDelivering.vue';

import Dashboard from './pages/Dashboard.vue'; 

import PageNotFound from './pages/PageNotFound.vue';

const routes = [ 	
{
	/**	
	Homepage for Courier
	*/
	path: '/courier/:id' ,
	name : 'courierHome',
	component : Home,
	children : [ 
	{	
		path : 'delivery/parcels-to-pack',
		name: 'toPack', 
		component : ToPack,
	}, 
	{
		path : 'delivery/google-map', 
		name : 'startDelivery' , 
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
	mode : 'history',
	linkActiveClass: 'is-active'
});