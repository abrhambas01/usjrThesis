import axios from 'axios';
import Vue from 'vue';
import VueRouter from 'vue-router';

import Echo from 'laravel-echo';


import * as VueGoogleMaps from 'vue2-google-maps'

import _ from 'lodash';

/** To use vuetify*/
import Vuetify from 'vuetify';

import vuetifyCss from 'vuetify/dist/vuetify.min.css';

window.Vue = Vue;

window.axios = axios;

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};


window.Pusher = require('pusher-js');

Vue.use(VueRouter);

Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyA6vKL6Q4u5ZhGAJlYOMkQZ13pxCUXOe9k',
        libraries: ['geocode, places']
    }
});

Vue.prototype.authUser = window.App.user;
// Vue.prototype.userInfo = window.App.user.info ;

/*
Switched to a simple one  -- Starts here -- assigning it to window */
Vue.use(Vuetify);


import colors from 'vuetify/es5/util/colors';

Vue.use(Vuetify, {
    theme: {
        primary: colors.cyan.darken - 1, // #E53935
    }
});


Vue.component('pulse-loader', require('vue-spinner/src/PulseLoader.vue'));
// Vue.component('google-map', VueGoogleMaps.Map);
// Vue.component('google-marker', VueGoogleMaps.Marker);


window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'fdf086cdb1883a504a94',
    cluster: 'ap1',
    encrypted: true
});









