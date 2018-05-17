<template>
	<v-app id="inspire">
		<v-navigation-drawer
		fixed
		:clipped="true"
		app
		v-model="drawer"
		>
		<v-list dense>
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
</v-list>
</v-navigation-drawer>
<v-toolbar
color="grey lighten-3"
light
app
:clipped-left="$vuetify.breakpoint.lgAndUp"
fixed
>
<v-toolbar-title style="width: 300px" class="ml-0 pl-3">
	<v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
	<span class="hidden-xs-and-down">Mypharma</span>
</v-toolbar-title>
<v-spacer></v-spacer>
<v-menu offset-y>
	<v-icon slot="activator">more_vert</v-icon>
	<v-list>
		<v-list-tile @click="logout"> 
			<v-list-tile-title>Logout</v-list-tile-title>
		</v-list-tile>
	</v-list>
</v-menu>
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
					<router-view></router-view>
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

		dialog: false,

		drawer: null,

		items: [
		{ icon: 'home', text: 'Home', link: '/' },
		{ icon: 'motorcycle', text: 'Start Delivery', link: '/start-delivery' },
		{ icon: 'people', text: 'Account Settings', link: '/account' },
		{ icon: 'exit_to_app', text: 'Logout', link: '/logout' }
		],

		tabItems : [

		{  text : 'Parcels to Pack', routeName : 'showParcelsToPack' }, 
		
		{  text : 'Show Delivery Map', routeName : 'deliveryMap'}
		
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
		logout () {
			window.location.href = '/auth/logout'
		}
	}
}
</script>