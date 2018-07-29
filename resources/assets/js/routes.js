import VueRouter from 'vue-router';

import Home from './pages/Home.vue';

import Account from './pages/Account.vue' ;

import ToPack from './pages/ToPack.vue';

import Delivery from './pages/Delivery.vue';

import Dashboard from './pages/Dashboard.vue';

import PageNotFound from './pages/PageNotFound.vue';

import StartDelivery from './pages/StartDelivering.vue';

import DeliveryMap from './pages/DeliveryMap.vue';

import Address from './pages/Addresses.vue';

const routes = [
    /**
     Homepage for Courier
     */
    {
        path: '/delivery',
        name: 'startDelivery',
        component: Delivery,
        children:
            [
                {
                    path: '/addresses',
                    name: 'Addresses',
                    component: Address,
                },
                {
                    path: '/to-pack',
                    name: 'ToPack',
                    component: ToPack
                },
                {
                    path: '/deliveryMap',
                    name: 'deliveryMap',
                    // component: DeliveryMap
                    component: StartDelivery

                },
            ]
    },
    {
        path: '/courier/:id/delivery/google-map',
        name: 'googleMap',
        components: {
            default: Delivery,
            main: DeliveryMap
        }
    },

    {
        path: '/startDeliveryMap',
        name: 'startDeliveryMap',
        // component: DeliveryMap
        component: StartDelivery

    },


    {
        path: '/account',
        name: 'Account',
        component: Account
    },
    {
        path: '/',
        name: 'home',
        component: Dashboard
    },
    {
        path: '/addresses',
        name: 'addresses',
        component: Address

    },
    {
        path: '/to-pack',
        name: 'toPack',
        component: ToPack

    },
    {
        path: '* ',
        name: 'pageNotFound',
        component: PageNotFound,
    },
];

export default new VueRouter({
    routes,
    // mode : 'history',
    linkActiveClass: 'is-active'
});


/**    Extra routes **/


// {path: '/user',name: 'User', component: userPage,
// children: [
// {path: '/profile',name: 'Profile', component: profile},
// {path: '/activity',name: 'Activity', component: activity},
// ],
// },
