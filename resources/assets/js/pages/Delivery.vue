<template>

	<v-tabs icons-and-text centered dark color="light-blue darken-3">
		<v-tabs-slider color="white"></v-tabs-slider>

		<v-tab to="/start-delivery">
			Delivery
			<v-icon>shopping_cart</v-icon>
		</v-tab>

		<v-tab :to="{ name : 'parcelsToPack', params : { id : 3 }}">
			Parcels To Pack
			<v-icon>list</v-icon>
		</v-tab>

		<v-tab :to="{ name : 'googleMap', params : { id : 3 } }">
			 Map
			<v-icon>map</v-icon>
		</v-tab>

		<router-view name="main"></router-view>	

	</v-tabs>







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
export default {

	// props : ['authUser.id'] ;

	data () {
		return {
			text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
			e3: 1,
			e31: true

		}
	}
}
</script>

<style scoped>
</style>