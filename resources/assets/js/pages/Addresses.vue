<template>
    <v-layout row>
        <v-flex xs12 sm6 offset-sm3>
            <v-card>
                <v-card-media src="assets/img/photos/photo14.jpg" height="300px">
                    <v-layout column class="media">
                        <v-spacer></v-spacer>
                    </v-layout>
                </v-card-media>
                <v-list two-line v-for="(address,index) in addresses" :key="address.id">
                    <!--I'm not using any  external template..-->
                    <!--<delivery-address :address="address" :index="index" ></delivery-address>-->
                    <v-list-tile>
                        <v-list-tile-content>
                            <v-list-tile-title>{{ sampleAddress }}</v-list-tile-title>
                            <v-list-tile-sub-title>{{ address.address }}</v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-divider></v-divider>
                </v-list>
            </v-card>
        </v-flex>
    </v-layout>
</template>

<script>
    // import getData from '../scripts/getData.js';
    import googleMapsGeocoder from 'google-maps-geocoder';
    //    import DeliveryAddress from './Address.vue';
    import * as VueGoogleMaps from 'vue2-google-maps';

    export default {

//        components:  {  DeliveryAddress },
        data() {

            return {

                selected: [2],

                addresses: [],

                sampleAddress: 'Geocoded Address goes here.',

                formatedAddresses: [],

                items: [
                    {
                        action: '15 min',
                        headline: 'Tabunoc, Talisay City, Cebu',
                        title: 'Ali Connors',
                        subtitle: "I'll be in your neighborhood doing errands this weekend. Do you want to hang out?"
                    },
                    {
                        action: '15 min',
                        headline: 'Tabunoc, Talisay City, Cebu',
                        title: 'Ali Connors',
                        subtitle: "I'll be in your neighborhood doing errands this weekend. Do you want to hang out?"
                    },
                ]
            }
        },

        computed: {},

        methods: {

            reflect(promise) {
                return promise.then(function (v) {
                    return {'status': 'resolved', 'value': value};
                }, function (e) {
                    return {'status': 'rejected', 'error': e};
                });
            },

            geocodedAddress() {

                let addressInfo = [
                    {
                        "address": "213 Marlon Forks\nSouth Corineland, HI 81723-1044",
                        "lat": "10.30431500",
                        "lng": "123.89035500"
                    },
                    {
                        "address": "1291 Stephania Road\nLake Dorotheastad, TN 82682-76",
                        "lat": "10.30309100",
                        "lng": "123.89154500"
                    },
                    {
                        "address": "20330 Schmeler Course Apt. 210\nNorth Ari, NV 70048",
                        "lat": "10.30356400",
                        "lng": "123.89964100"
                    }
                ] ;

                var promises = addressInfo.map(coords => {
                    // map response to an array of Promises.

                    return new Promise(function (resolve, reject) {

                        var geocoder = new google.maps.Geocoder();

                        var latLng = {
                            'lat': parseFloat(coords.lat),
                            'lng': parseFloat(coords.lng)
                        };

                        geocoder.geocode({'location': latLng}, function (results, status) {
                            if (status === 'OK') {
                                if (results[0]) {
                                    resolve(results[0]);
                                } else {
                                    reject(new Error('No results found'));
                                }
                            } else {
                                reject(new Error('Geocoder failed due to: ' + status));
                            }
                        });
                    });
                });


                // map `promises` to an array of "refelected" promises before passing to Promise.all()

                return Promise.all(promises.map(this.reflect)).then(function (results) {
                        return results.filter(function (res) {
                            // filter the reflected results to exclude errors
                            return res.status === 'resolved';
                        }).map(function (res) { // map the remaining reflected results to the value of interest
                            return res.value;
                        });
                    });

                // console.log(this.addresses);

                // _.map(this.addresses, coords => {

                //     console.log(arr, index);

                //     var geocoder = new google.maps.Geocoder;

                //     var latLng = {
                //         lat: parseFloat(coords.lat),
                //         lng: parseFloat(coords.lng)
                //     } ;

                //     geocoder.geocode({'location': latLng},function (results,status){
                //         if (status === 'OK') {
                //             if (results[0]) {
                //                 console.log(results[0].formatted_address);
                //             } else {
                //                 window.alert('No results found');
                //             }
                //         } else {
                //             window.alert('Geocoder failed due to: ' + status);
                //         }
                //     });
                // });

            },

//                var self = this;
//
//                let geocoder = new google.maps.Geocoder();
//
//                let theLocations = this.addresses;
//
//                return Promise.all(_.map(theLocations, addr => {
//
//                    var geocoder = new google.maps.Geocoder();
//
//                    var locationss = {
//                        lat: parseFloat(addr.lat),
//                        lng: parseFloat(addr.lng)
//                    };
//
//                    return new Promise(function (resolve, reject) {
//                        geocoder.geocode({'location': locationss}, function (results, status) {
//                            if (status === 'OK') {
//                                if (results[0]) {
//                                    return results[0].formatted_address;
//                                } else {
//                                    console.log(status);
//                                    window.alert('No results found');
//                                    return null;
//                                }
//                            }
//                        })
//                    });
//                })).then(data => {
//                    console.log(data);
//                    this.formatedAddresses = data;
//                })


            showData() {
                console.log(addressNames);
            },

            toggle(index) {
                const i = this.selected.indexOf(index)

                if (i > -1) {
                    this.selected.splice(i, 1);
                } else {
                    this.selected.push(index);
                }
            },

            getLocations() {
                axios.get("api/v1/delivery-addresses")
                    .then(response => this.addresses = response.data)
                    .catch(error => console.log(error.response.data));
            }

        },

        created() {
            this.getLocations();
            this.geocodedAddress();
        },
    }
</script>