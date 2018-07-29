<template>
    <h3>Delivery Map</h3>
    <!--<div id="wrapper">-->

    <!--<google-map :center="startLocation" :zoom="15" style="width: 100%; height: 500px">-->

        <!--<gmap-info-window :options="infoOptions" :position="infoWindowPos" :opened="infoWinOpen"-->
                          <!--@closeclick="infoWinOpen=false">{{ infoContent }}-->
        <!--</gmap-info-window>-->

        <!--<google-marker :key="i" v-for="(m,i) in markers" :position="m.position" :clickable="true"-->
                       <!--@click="toggleInfoWindow(m,i)">-->
        <!--</google-marker>-->

    <!--</google-map>-->

    <!--    <google-map
               v-show="coordinates.length != 0"
               ref="map"
               :center="startLocation"
               id="map"
               :options="mapOptions">

           <gmap-info-window :options="infoOptions" :position="infoWindowPos" :opened="infoWinOpen"
                             @closeclick="infoWinOpen=false">
               <div v-html="contentString"></div>
           </gmap-info-window> -->
    <!-- <DirectionsRenderer/> -->

    <!-- <google-marker :icon="pin" :position="startLocation" :clickable="true"></google-marker> -->

    <!--    <google-marker v-for="(item, key) in coordinates"
                      :key="key"
                      :icon="house"
                      :draggable="false"
                      :position="getPosition(item.position)"
                      :clickable="true"
                      @click="toggleInfoWindow(item,key)">
       </google-marker>
   </google-map> -->
    <!--
        <div id="control-buttons" v-show="coordinates.length != 0">
            <pulse-loader :size="loaderSize" :color="loaderColor" :loading="startLoading"></pulse-loader>
            <div class="fixed-action-btn horizontal click-to-toggle">
                <button @click="getDirections()" class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
                    <i class="material-icons">directions</i>
                </button>
                <br>
                <br>
                <button @click="panToMyLocation()" class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
                    <i class="material-icons">my_location</i>
                </button>
            </div>
        </div> -->
    <!--</div>-->
</template>


<script>
    // import locate from '../helpers/geolocate';
import VueGeolocation from 'vue-browser-geolocation';

import swal from 'sweetalert';

import maps from '../scripts/maps';
// import Dir
// import DirectionsRenderer from './DirectionsRenderer.js';
Vue.use(VueGeolocation);

export default {

    name: 'DeliveryMap',
// components : { DirectionsRenderer },

    data() {
        return {
            /**
             * the starting point
             *
             */

            center: {
                lat: 47.376332,
                lng: 8.547511
            },
            infoContent: '',
            infoWindowPos: {
                lat: 0,
                lng: 0
            },
            infoWinOpen: false,
            currentMidx: null,
            //optional: offset infowindow so it visually sits nicely on top of our marker
            infoOptions: {
                pixelOffset: {
                    width: 0,
                    height: -35
                }
            },
            markers: [{
                position: {
                    lat: 47.376332,
                    lng: 8.547511
                },
                infoText: 'Marker 1'
            }, {
                position: {
                    lat: 47.374592,
                    lng: 8.548867
                },
                infoText: 'Marker 2'
            }, {
                position: {
                    lat: 47.379592,
                    lng: 8.549867
                },
                infoText: 'Marker 3'
            }],


            /**
             Pulse loader properties
             */
            loaderColor: '#62d05c',
            startLoading: false,

            loaderSize: "30px",

            contentString: '<div id="content">' +
            '<div id="siteNotice">' +
            '</div>' +
            '<h1 id="firstHeading" class="firstHeading">Uluru</h1>' +
            '<div id="bodyContent">' +
            '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
            'sandstone rock formation in the southern part of the ' +
            'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) ' +
            'south west of the nearest large town, Alice Springs; 450&#160;km ' +
            '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major ' +
            'features of the Uluru - Kata Tjuta National Park. Uluru is ' +
            'sacred to the Pitjantjatjara and Yankunytjatjara, the ' +
            'Aboriginal people of the area. It has many springs, waterholes, ' +
            'rock caves and ancient paintings. Uluru is listed as a World ' +
            'Heritage Site.</p>' +
            '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
            'https://en.wikipedia.org/w/index.php?title=Uluru</a> ' +
            '(last visited June 22, 2009).</p>' +
            '</div>' +
            '</div>',


            // pulsingIcon : LpIcon.pulse({iconSize:[20,20],color:'red'}),
            // baseMarker : LpIcon.marker([50,15],{icon: pulsingIcon}).addTo(this.$refs.map),


            //STORE DIRECTIONS ON THIS ARRAY.
            routeResults: [],

            pin: 'dist/img/map-marker.png',

            house: 'dist/img/pin.png',

            maptype: 'satellite',

            mapLoaded: false,

            origin: null,

            directionsVisible: false,


            // This is how the data loooks like from the API call
            // markers:
            // [
            // {
            //     position: {
            //         full_name: 'Erich  Kunze',
            //         lat: 10.30356400,
            //         lng: 123.89964100
            //     }
            // },
            // {
            //     position:
            //     {
            //         full_name: 'Delmer Olson',
            //         lat: 10.32,
            //         lng: 123.89
            //     }
            // },
            // {
            //     position:
            //     {
            //         full_name: 'Delmer Olson',
            //         lat: 10.30431500,
            //         lng: 123.89035500
            //     }
            // }
            // ],


            //Store all the locations of the houses here..
            coordinates: [],


            //Info window Options..
            infoContent: '',
            infoWindowPos: {
                lat: 0,
                lng: 0
            },
            infoWinOpen: false,
            currentMidx: null,
            //optional: offset infowindow so it visually sits nicely on top of our marker
            infoOptions: {
                pixelOffset: {
                    width: 0,
                    height: -35
                }
            },

            // mixins : [ maps ],

            mapOptions: {
                zoom: 19,
                disableDefaultUI: true,
                mapTypeId: 'terrain',
                styles: [{
                    "featureType": "landscape.man_made",
                    "elementType": "geometry",
                    "stylers": [{"color": "#f7f1df"}]
                }, {
                    "featureType": "landscape.natural",
                    "elementType": "geometry",
                    "stylers": [{"color": "#d0e3b4"}]
                }, {
                    "featureType": "landscape.natural.terrain",
                    "elementType": "geometry",
                    "stylers": [{"visibility": "off"}]
                }, {
                    "featureType": "poi",
                    "elementType": "labels",
                    "stylers": [{"visibility": "off"}]
                }, {
                    "featureType": "poi.business",
                    "elementType": "all",
                    "stylers": [{"visibility": "off"}]
                }, {
                    "featureType": "poi.medical",
                    "elementType": "geometry",
                    "stylers": [{"color": "#fbd3da"}]
                }, {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [{"color": "#bde6ab"}]
                }, {
                    "featureType": "road",
                    "elementType": "geometry.stroke",
                    "stylers": [{"visibility": "off"}]
                }, {
                    "featureType": "road",
                    "elementType": "labels",
                    "stylers": [{"visibility": "off"}]
                }, {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#ffe15f"}]
                }, {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [{"color": "#efd151"}]
                }, {
                    "featureType": "road.arterial",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#ffffff"}]
                }, {
                    "featureType": "road.local",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "black"}]
                }, {
                    "featureType": "transit.station.airport",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#cfb2db"}]
                }, {"featureType": "water", "elementType": "geometry", "stylers": [{"color": "#a2daf2"}]}]
            },

            dataUpdate: {
                address: '',
                latitude: null,
                longitude: null,
            },
            locationFound: false,

            size: '40px',

            //Center of cebu
            startLocation: {
                lat: 10.3157,
                lng: 123.8854
            },

            cityHallLocation: {
                lat: 10.2929,
                lng: 123.9016
            },
        }
    },

    computed: {
        pulsedMarker() {
            return LPulse.marker([50, 15], {icon: pulsingIcon}).addTo(map);
        }
    },

    methods: {
        toggleSatelliteMode() {
            if (this.mapOptions.mapTypeId = 'terrain') {
                this.$refs.map.setMapTypeId('satellite');
            }
            else if (this.mapOptions.mapTypeId = 'satellite') {
                this.$refs.map.setMapTypeId('terrain');
            }
        },

        toggleInfoWindow(marker, key) {
            // this.infoPosition = this.getPosition(marker);
            // this.infoContent = marker.full_name;
            // if (this.infoCurrentKey == key) {
            // 	this.infoOpened = !this.infoOpened;
            // } else {
            // 	this.infoOpened = true;
            // 	this.infoCurrentKey = key;
            // }

            this.infoWindowPos = this.getPosition(marker.position);
            this.infoContent = contentString;

            //check if its the same marker that was selected if yes toggle
            if (this.currentMidx == key) {
                this.infoWinOpen = !this.infoWinOpen;
            }
            //if different marker set infowindow to open and reset current marker index
            else {
                this.infoWinOpen = true;
                this.currentMidx = key;
            }


            // console.log(marker);

        },

        addWaypoint(latLng) {

        },

        panToMyLocation() {
            /**
             https://stackoverflow.com/questions/10656743/how-to-offset-the-center-point-in-google-maps-api-v3
             **/
            // map.setCenter(this.startLocation);

            this.$refs.map.panTo({
                lat: this.startLocation.lat,
                lng: this.startLocation.lng
            });


            this.$refs.map.panBy(5, -100);
        },


        calculate() {

        },

        setPlace(place) {
            this.startLocation = {
                lat: place.geometry.location.lat(),
                lng: place.geometry.location.lng(),
            };
        },

        locateMe() {
            this.$getLocation().then(coordinates => {
                this.startLocation = coordinates;
            });
        },

        getPosition(marker) {
            return {
                lat: parseFloat(marker.lat),
                lng: parseFloat(marker.lng)
            }
        },

        updatePosition(event) {

            const latLng = event.latLng.toJSON()

            this.setGeocoder(this.newEvent, latLng)

        },

        getDirections() {

            var coordinatesSize = this.coordinates.length;

            var locations = this.coordinates;

            console.log(this.coordinates);

            locations.forEach(function (item) {

                // parse the variables..

                var locations = {

                    lat: parseFloat(item.position.lat),

                    lng: parseFloat(item.position.lng)

                };


                console.log(respx);

                // we'll add every item to the waypoints array.

                addWaypoint(item);

                console.log(item.position.lat + item.position.lng);
                // console.log();

            });

            // console.log(coordinatesSize);

            // Show the loading loader. if the route isn't finished loading..
            // this.startLoading  = true ;

            // // Extract the data -> coordinates from the listings..
            // for ( var i = 0; i < coordinatesSize.length; i++){
            // 	// parsedData = JSON.parse(this.coordinates);
            // 	alert("OK");

            // }
        },
        showRoute() {
//	 Use the directions service in calculating the route
//	 	this.directionsService = new google.maps.DirectionsService()
//	 	this.directionsDisplay = new google.maps.DirectionsRenderer()
//	 	this.directionsDisplay.setMap(this.$refs.map.$mapObject)
//	 	var vm = this
//	 	vm.directionsService.route({
//	 		origin: this.startLocation,
//	 		// Can be coord or also a search query
//	 		destination: this.destination,
//	 		travelMode: 'DRIVING'
//	 	}, function (response, status){
//	 		if (status === 'OK') {
//	 	  vm.directionsDisplay.setDirections(response) // draws the polygon to the map
//	 	}
//	 	else {
//	 		console.log('Directions request failed due to ' + status)
//	 	}
//
//	 });

            // console.log(this.directionsDisplay);

            // this.directionsDisplay.setMap(this.$refs.map.$mapObject);
            // var vm = this
            // vm.directionsService.route({
            //         origin: { lat : this.startLocation.lat , lng : this.startLocation.lng } , // Can be coord or also a search query
            //         destination: this.coordinates,
            //         travelMode: 'DRIVING'
            //     }, function (response, status) {
            //     	if (status === 'OK') {
            //           vm.directionsDisplay.setDirections(response) // draws the polygon to the map
            //       } else {
            //       	console.log('Directions request failed due to ' + status)
            //       }
            //   })
            // var currentPosition = new google.maps.LatLng(this.startLocation.lat, this.startLocation.lng);

            // var i = this.coordinates.length;

            // while (i--) {

            // 	this.coordinates[i].marker = new google.maps.Marker({
            // 		position: this.coordinates[i].latLng,
            // 		map: map,
            // 		title: this.coordinates[i].title,
            // 		icon: 'https://maps.google.com/mapfiles/ms/icons/green.png'
            // 	});
            // }

            // this.findNearestPlace();

            // vm.directionsService.route({
            // 	origin: this.coords,
            // 	destination: this.destination,
            // 	travelMode: 'DRIVING'
            // }, function (response, status) {
            // 	if (status === 'OK') {
            // 		vm.directionsDisplay.setDirections(response)
            // 	} else {
            // 		console.log('Directions request failed due to ' + status)
            // 	}
            // })]
        },

        fetchDeliveries() {
            axios.get('api/v1/deliveries/information')
                .then(response => this.coordinates = response.data)
                .catch(error => console.log(error.response.data));

        },


        initializeMap() {
            this.locateMe();
        }


    },

    mounted() {
        this.fetchDeliveries();
        this.initializeMap();
    }
};
</script>

<style lang="css" scoped>
    /* Always set the map height explicitly to de	e the size of the div
    * element that contains the map. */
    #control-buttons {
        position: absolute;
        left: 30px;
        bottom: 80px;
        z-index: 3;
    }

    #map {
        width: 100%;
        height: 100vh;
        position: relative;
    }

    #load-screen {
        position: absolute;

    }

    #wrapper {
        position: relative;
    }

    .form-inputs {
        position: absolute;
        top: 0.7%;
        left: 10px;
        z-index: 5;
        background-color: #fff;
        width: 85%;
    }

    .loader {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        min-height: 100vh;
    }

    .mobile-fab-tip {
        position: fixed;
        right: 85px;
        padding: 0px 0.5rem;
        text-align: right;
        background-color: #323232;
        border-radius: 2px;
        color: #FFF;
        width: auto;
    }

    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
</style>