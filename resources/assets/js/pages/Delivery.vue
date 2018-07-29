<template>
<v-tabs
    centered
    color="green darken-2"
    dark
    icons-and-text
    >
	<v-tabs-slider color="yellow"></v-tabs-slider>

	<v-tab to="addresses">
		Addresses
		<v-icon>home</v-icon>
	</v-tab>

	<v-tab to="to-pack">
		To Pack
		<v-icon>list</v-icon>
	</v-tab>

	<v-tab to="deliveryMap">
		Delivery Map
		<v-icon>map</v-icon>
	</v-tab>	

	<v-tabs-items v-model="activeTab">
		<v-tab-item id="addresses">
			<router-view></router-view>
		</v-tab-item>
		<v-tab-item id="to-pack">
			<router-view></router-view>
		</v-tab-item>
		<v-tab-item id="deliveryMap">
			<router-view></router-view>
		</v-tab-item>
	</v-tabs-items>

</v-tabs>


	<!-- <div>
		<v-tabs v-model="activeTab">
			<v-tab to="profile">Profile</v-tab>
			<v-tab to="activity">Activity</v-tab>
		</v-tabs>

		<v-tabs-items v-model="activeTab">
			<v-tab-item id="profile">
				<router-view></router-view>
			</v-tab-item>
			<v-tab-item id="activity">
				<router-view></router-view>
			</v-tab-item>
		</v-tabs-items> -->

		<!-- <router-view name="main"></router-view> -->




		<!-- </div> -->


<!-- <v-card height="200px" style="overflow: hidden;">
	<v-card-text class="text-xs-center">
		<v-btn flat color="primary" @click.native="e31 = !e31">Toggle Nav</v-btn>
	</v-card-text>
	<v-bottom-nav :value="e31" :active.sync="e3" absolute color="transparent">
		<v-btn flat color="teal">
			<span>Recents</span>
			<v-icon>history</v-icon>
		</v-btn>
		<v-btn flat color="teal">
			<span>Favorites</span>
			<v-icon>favorite</v-icon>
		</v-btn>
		<v-btn flat color="teal">
			<span>Nearby</span>
			<v-icon>place</v-icon>
		</v-btn>
	</v-bottom-nav>
</v-card> -->
</template>

<script>

import Address from './Address.vue';

import ToPack from './ToPack.vue';

import DeliveryMap from './DeliveryMap.vue';


export default {

	components : { Address, ToPack },

	// props : ['authUser.id'] ;

	data () {
		return {
			activeTab : "",

			card_text: 'Lorem ipsum dolor sit amet, brute iriure accusata ne mea. Eos suavitate referrentur ad, te duo agam libris qualisque, utroque quaestio accommodare no qui. Et percipit laboramus usu, no invidunt verterem nominati mel. Dolorem ancillae an mei, ut putant invenire splendide mel, ea nec propriae adipisci. Ignota salutandi accusamus in sed, et per malis fuisset, qui id ludus appareat.',
			text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
			e3: 1,
			e31: true

		}
	}
} ;
</script>

<style scoped>
    #map-canvas {
        margin: 0;
        padding: 0;
        height: 400px;
        max-width: none;
    }
    #map-canvas img {
        max-width: none !important;
    }
    .gm-style-iw {
        width: 350px !important;
        top: 15px !important;
        left: 0px !important;
        background-color: #fff;
        box-shadow: 0 1px 6px rgba(178, 178, 178, 0.6);
        border: 1px solid rgba(72, 181, 233, 0.6);
        border-radius: 2px 2px 10px 10px;
    }
    #iw-container {
        margin-bottom: 10px;
    }
    #iw-container .iw-title {
        font-family: 'Open Sans Condensed', sans-serif;
        font-size: 22px;
        font-weight: 400;
        padding: 10px;
        background-color: #48b5e9;
        color: white;
        margin: 0;
        border-radius: 2px 2px 0 0;
    }
    #iw-container .iw-content {
        font-size: 13px;
        line-height: 18px;
        font-weight: 400;
        margin-right: 1px;
        padding: 15px 5px 20px 15px;
        max-height: 140px;
        overflow-y: auto;
        overflow-x: hidden;
    }
    .iw-content img {
        float: right;
        margin: 0 5px 5px 10px;
    }

    .iw-subTitle {
        font-size: 16px;
        font-weight: 700;
        padding: 5px 0;
    }

    .iw-bottom-gradient {
        position: absolute;
        width: 326px;
        height: 25px;
        bottom: 10px;
        right: 18px;
        background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
        background: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
        background: -moz-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
        background: -ms-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
    }
</style>