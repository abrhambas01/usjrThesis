<template>
    <!--This will not be included I'm not using any of this since there is no
    user interaction, pure display.-->


    <!--<div>-->
    <!--<v-list-tile :key="id">-->
    <!--<v-list-tile-content>-->
    <!--<div v-for="address in formatedAddresses" :key="address">{{ sampleAddress }}</div> -->
    <!--<v-list-tile-title v-for="item in formattedAddress">{{ sampleAddress }}</v-list-tile-title>-->
    <!--<v-list-tile-sub-title>{{ address.address }}</v-list-tile-sub-title>-->
    <!--</v-list-tile-content>-->
    <!--</v-list-tile>-->
    <!--<v-divider></v-divider>-->
    <!--</div>-->
</template>


<script>
    export default {
        props: ['address', 'index'],

        data() {
            return {
                isPacked: false,
                id: this.index,
                locations: this.address,

                sampleAddress: 'A good location address',

                formatedAddresses: []

            }

        },


        computed: {},

        methods: {}
    };
</script>