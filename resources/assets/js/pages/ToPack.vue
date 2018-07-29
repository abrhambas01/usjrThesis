<template>
	<!-- <div
	id="e3"
	style="max-width: 400px; margin: auto;"
	class="grey lighten-3"
	>	
	<v-toolbar color="green darken-3">
		<v-toolbar-title class="white--text">Parcels to Pack</v-toolbar-title>
	</v-toolbar>
	<v-card>
		<v-container
		fluid
		style="min-height: 0;"
		grid-list-lg
		>
		<v-layout row wrap>
			<v-flex xs12>
				<v-list three-line subheader v-for="(parcel,index) in parcels" :key="parcel.index">
					<p v-if="parcels.length === 0 ? noParcelAlert() : welcomeAlert()"></p>
					<delivery-parcel :parcel="parcel" :index="index"></delivery-parcel>
				</v-list>
			</v-flex>
		</v-layout>
	</v-container>
	</v-card>
</div> -->

<!-- <v-layout row>
	<v-flex xs12 sm6 offset-sm3>
		<v-card>
			<v-toolbar color="cyan" dark>
				<v-toolbar-side-icon></v-toolbar-side-icon>
				<v-toolbar-title>Parcels to pack</v-toolbar-title>
				<v-spacer></v-spacer>
				<v-btn icon>
					<v-icon>search</v-icon>
				</v-btn>
			</v-toolbar>
			<v-list two-line v-for="(parcel,index) in parcels" :key="parcel.index">
				<delivery-parcel :parcel="parcel" :index="index"> </delivery-parcel>
			</v-list>
		</v-card>
	</v-flex>
</v-layout> -->


<v-layout row>
	<v-flex xs12 sm6 offset-sm3>
		<v-card>
			<v-card-media src="dist/img/5.png" height="300px">
				<v-layout column class="media">
					<v-spacer></v-spacer>
				</v-layout>
			</v-card-media>
			<v-progress-linear style="margin : 0 auto ;" :indeterminate="isLoading" v-show="isLoading"></v-progress-linear>
			<v-list two-line v-for="(parcel,index) in parcels" :key="index">
				<!-- :packed="canToggle" this prop returns true or false -->
				<delivery-parcel :parcel="parcel" :index="index" ></delivery-parcel>
			</v-list>
		</v-card>
	</v-flex>
</v-layout>

</template>

<style>
.demo-card-wide.mdl-card {
	width: 512px;
}
.demo-card-wide > .mdl-card__title {
	color: #fff;
	height: 176px;
	/*background: url('../assets/demos/welcome_card.jpg') center / cover;*/
}

.demo-card-wide > .mdl-card__menu {
	color: #fff;
}	

</style>

<script>

import swal from 'sweetalert' ;

import DeliveryParcel from './DeliveryPackage.vue';


// import moment from 'moment';
// import DeliveryParcel from './components/DeliveryParcels.vue' ; 

export default {

	components : {
		DeliveryParcel 
	},

	data(){
		return {	

			isLoading : true,
			parcels : [], 	
			notifications: false,
			items: [
			{ header: 'Today' },
			{ avatar: '/static/doc-images/lists/1.jpg', title: 'Brunch this weekend?', subtitle: "<span class='text--primary'>Ali Connors</span> &mdash; I'll be in your neighborhood doing errands this weekend. Do you want to hang out?" 
		},
		{ divider: true, inset: true },
		{ avatar: '/static/doc-images/lists/2.jpg', title: 'Summer BBQ <span class="grey--text text--lighten-1">4</span>', subtitle: "<span class='text--primary'>to Alex, Scott, Jennifer</span> &mdash; Wish I could come, but I'm out of town this weekend." },
		{ divider: true, inset: true },
		{ avatar: '/static/doc-images/lists/3.jpg', title: 'Oui oui', subtitle: "<span class='text--primary'>Sandra Adams</span> &mdash; Do you have Paris recommendations? Have you ever been?" }
		],
		sound: true,
		widgets: false,

	}
},

computed  : {

	parcelStatus(){

		// return this.parcels.packed  !== 0 ; 
		_.map(this.parcels,function(parcel){
			return parcel.packed ; 
		});

		
	},	

	endpoint(){
		return 'api/v1/parcels/to-pack' ; 
	},

	packageQuantity(){
		return this.parcels.length ; 
	}	

},

methods : {


	allParcelsPacked(){
		swal ( "Alert" ,  "No Parcels to pack for today" ,  "success" )
	},

	welcomeAlert(){
		if ( this.packageQuantity.length > 0) { 
			swal ( "Alert" ,  "You have deliveries for today"  ,  "success" )
		}
		else { 
			swal ( "Alert" ,  "No parcels to pack"  ,  "info" )
		}
	},

	defaultAlert(){
		swal ( "Alert" ,  "Retrieving your deliveries."  ,  "info" );
		// this.parcels.length != 0 ? this.welcomeAlert() : this.allParcelsPacked() ; 
	},

	fetch(){
		// axios.get(this.endpoint)
		// .then(setTimeout(() => { response => this.parcels = response.data, this.isLoading = false}, 5000);
		// 	).catch(error => console.log(error.response.data));

		axios.get(this.endpoint)
		.then(response => { setTimeout(()=> { this.isLoading = false;  this.parcels = response.data;  this.welcomeAlert() ; },1500); })
		.catch(error => console.log(error.response.data));
	}
},


mounted() { 
	this.fetch(); 
	// this.defaultAlert(); 
	// this.isLoading = false ;
	// if ( this.parcels.length === 0 ){ 
	// 	swal("Alert","No Deliveries for Today" ,  "success" )
	// }
}

}; 
</script>