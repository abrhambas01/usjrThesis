<template>
    <div>
        <v-list-tile>
            <v-list-tile-action>
                <!-- checkbox is checked  if packedStatus === 0  " -->
                <v-checkbox @click="togglePacked" v-model="isPacked"></v-checkbox>
            </v-list-tile-action>

            <v-list-tile-content>
                <v-list-tile-title :key="p.owner.id" v-for="p in ownersUniqueNames"> #{{ id }} - {{ p.owner.first_name
                    }} {{ p.owner.last_name }}
                </v-list-tile-title>
                <v-list-tile-sub-title :key="p.medicine_id" v-for="p in parcel">Medicine ID : {{ p.medicine_id }} - {{
                    p.qty }} pcs
                </v-list-tile-sub-title>
            </v-list-tile-content>

            <v-list-tile-action>
                <v-icon>shopping_basket</v-icon>
            </v-list-tile-action>

        </v-list-tile>
        <v-divider inset></v-divider>
    </div>

    <!-- 	<v-list-tile v-else :key="id">
            <v-list-tile-action>
                <v-checkbox @click="togglePacked(id)" v-model="isPacked"></v-checkbox>
            </v-list-tile-action>
            <v-list-tile-content>
                <v-list-tile-title>{{ id }}</v-list-tile-title>
                <v-list-tile-sub-title v-html="item.subtitle"></v-list-tile-sub-title>
            </v-list-tile-content>
        </v-list-tile>



    <!-- 	<v-layout row>
            <v-flex xs12 sm6 offset-sm3>
                <v-card>
                    <v-toolbar color="cyan" dark>
                        <v-toolbar-side-icon></v-toolbar-side-icon>
                        <v-toolbar-title>Inbox</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-btn icon>
                            <v-icon>search</v-icon>
                        </v-btn>
                    </v-toolbar>
                    <v-list two-line>
                        <template v-for="(item, index) in items">
                            <v-subheader v-if="item.header" :key="item.header">{{ item.header }}</v-subheader>
                            <v-divider v-else-if="item.divider" :inset="item.inset" :key="index"></v-divider>
                            <v-list-tile v-else :key="item.title" avatar @click="">
                                <v-list-tile-avatar>
                                     <img :src="item.avatar">
                                </v-list-tile-avatar>
                                <v-list-tile-content>
                                    <v-list-tile-title v-html="item.title"></v-list-tile-title>
                                    <v-list-tile-sub-title v-html="item.subtitle"></v-list-tile-sub-title>
                                </v-list-tile-content>
                            </v-list-tile>
                        </template>
                    </v-list>
                </v-card>
            </v-flex>
        </v-layout>


    -->
</template>

<script>
    export default {

        props: ['parcel', 'index'],

        data() {
            return {
                checked: true,
                isPacked: false,
                // parcelStatus : this.parcel,
                id: this.index,
            }
        },

        computed: {

            parcelStatus() {
                // console.log(this.parcel.packed);
                // this.parcel.packed === 0 ? this.isPacked === false : true ;
                // return this.parcel.packed  === 1  ? return true : return false;
                return parcelStatus;
            },


            endpoint() {
                return `api/v1/parcel/` + this.index + `/toggle`;
            },

            packageQuantity() {
                return this.parcels.length;
            },

            ownersUniqueNames() {
                return _.uniqBy(this.parcel, function (p) {
                    return p.owner.first_name + p.owner.last_name;
                });
            }

        },


        methods: {

            /**    first try.. */
            toggle() {
                this.isPacked ?
                    this.untoggle() :
                    this.togglePacked();
            },

            togglePacked() {

                console.log(this.index);
                axios.post(this.endpoint)

                // this. = 1 ;

                // this.isPacked = true;

            },


        },


    };
</script>

<style>
    .city-location {
    }
</style>