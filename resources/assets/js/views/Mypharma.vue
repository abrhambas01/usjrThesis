<template>
    <v-app id="inspire">
        <v-navigation-drawer fixed :clipped="true" app v-model="drawer">
            <template v-for="item in items">
                <v-layout
                        row
                        v-if="item.heading"
                        align-center
                        :key="item.heading"
                >
                    <v-flex xs6>
                        <v-subheader v-if="item.heading">
                            {{ item.heading }}
                        </v-subheader>
                    </v-flex>
                    <v-flex xs6 class="text-xs-center">
                        <a href="#!" class="body-2 black--text">EDIT</a>
                    </v-flex>
                </v-layout>
                <v-list-group
                        v-else-if="item.children"
                        v-model="item.model"
                        :key="item.text"
                        :prepend-icon="item.model ? item.icon : item['icon-alt']"
                        append-icon=""
                >
                    <v-list-tile slot="activator">
                        <v-list-tile-content>
                            <v-list-tile-title>
                                {{ item.text }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile
                            v-for="(child, i) in item.children"
                            :key="i"
                            @click=""
                    >
                        <v-list-tile-action v-if="child.icon">
                            <v-icon>{{ child.icon }}</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                {{ child.text }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list-group>
                <v-list-tile v-else router :to="item.link" :key="item.text">
                    <v-list-tile-action>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>
                            {{ item.text }}
                        </v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </template>
        </v-navigation-drawer>

        <v-toolbar
                color="blue-grey darken-3"
                dark
                app
                   :clipped-left="$vuetify.breakpoint.lgAndUp"
                   fixed
        >

            <v-toolbar-title style="width: 300px" class="ml-0 pl-3">

                <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
                <span class="hidden-xs-and-down">Mypharma</span>
            </v-toolbar-title>

            <v-spacer></v-spacer>

            <v-menu offset-y v-model="logoutTile">
                <v-icon slot="activator">more_vert</v-icon>
                <v-list>
                    <!-- <v-list-tile @click.native.stop="showLogoutModal">  -->
                    <v-list-tile @click="showLogoutModal">
                        <v-list-tile-title>Logout</v-list-tile-title>
                    </v-list-tile>
                </v-list>
            </v-menu>

            <v-dialog v-model="logoutDialog" max-width="290">
                <v-card>
                    <v-card-title class="headline">Logout from this session?</v-card-title>
                    <v-card-text>Or maybe you just want to lock the session</v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="green darken-1" flat="flat" @click.native="logoutDialog = false">Lock</v-btn>
                        <v-btn color="green darken-1" flat="flat" @click.native="logout()">Yes Please, Log me out
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>

        </v-toolbar>
        <v-content>
            <!-- <v-container xs7 offset-xs2 offset-md2 offset-lg5> -->
            <!-- <v-layout> -->
            <!-- content goes here  -->
            <!-- <router-view class="mt-0.3"></router-view> -->
            <!-- end content  -->
            <!-- </v-layout>
            </v-container> -->
            <!-- <v-container grid-list-xl text-xs-center> -->
            <v-layout row wrap>
                <v-flex xs12 sm12 md12>
                    <transition name="custom-classes-transition" enter-active-class="animated zoomInDown">
                        <router-view></router-view>
                    </transition>
                </v-flex>
            </v-layout>
            <!-- </v-container> -->
        </v-content>


        <!-- <v-btn
          fab
          bottom
          right
          color="pink"
          dark
          fixed
          @click.stop="dialog = !dialog"
        >
          <v-icon>add</v-icon>
      </v-btn> -->
    </v-app>
</template>

<script>
    export default {
        data: () => ({
            // userId : authUser.id ,
            logoutDialog: false,
            logoutTile: false,
            drawer: null,

            isLoading: true,

            items: [
                { icon: 'home', text: 'Home', link: '/'},
                {icon: 'motorcycle', text: 'Start Delivery', link: '/addresses'},
                {icon: 'people', text: 'Account Settings', link: '/account'},
                {icon: 'map', text: 'Delivery Map', link: '/startDeliveryMap'},
            ],

            tabItems: [

                {text: 'Parcels to Pack', routeName: 'showParcelsToPack'},

                {text: 'Show Delivery Map', routeName: 'deliveryMap'},

            ],
            // speed dial
            direction: 'top',

            fab: false,

            fling: false,

            hover: false,

            tabs: null,

            top: false,

            right: true,

            bottom: true,

            left: false,

            transition: 'slide-y-reverse-transition'

        }),
        props: {
            source: String
        },
        methods: {
            showLogoutModal() {
                this.logoutTile = true;
                this.logoutDialog = true;

            },
            logout() {

                window.location.href = '/logout'
            }
        }
    };
</script>