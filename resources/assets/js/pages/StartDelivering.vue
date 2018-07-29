<!-- <template src="../views/Homepage/DeliveryMap.html"></template> -->
<template>

    <!-- 		<h1>this is google map</h1>
            <gmap-autocomplete :value="description"
            @place_changed="setPlace"
            class="input-item"
            >
        </gmap-autocomplete> -->
        <gmap-map
        id="map"
        :center="{lat:1.340270, lng:103.851959}"
        :zoom="12"
        map-type-id="terrain"
        style="width: 100%; height: 100vh"
        ></gmap-map>

    </template>
    <script>
    export default {
        /**/
        data() {
            return {
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
                }]
            }

        },
        methods: {
            setDescription(description) {
                this.description = description;
            },
            setPlace(place) {
                this.place = place;
            },
            usePlace(place) {
                if (this.place) {
                    this.markers.push({
                        position: {
                            lat: this.place.geometry.location.lat(),
                            lng: this.place.geometry.location.lng(),
                        }
                    })
                    this.place = null;
                }
            }

        }


    };
    </script>

    <style>
    #map {
        width: 100%;
        height: 100vh;
        position: relative;
    }


    </style>