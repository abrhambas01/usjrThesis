<template>
	<div class="page animated fadeinright">

		<div class="hero-header bg-5 animated fadeinright">
			<div class="hero-title">Parcel Deliveries Today</div>
		</div>

		<div class="todo animated fadeinright delay-1" id="test1">
			<p v-if="parcels.length === 0 ? noParcelAlert() : welcomeAlert()"></p>

			<p class="todo-element" v-for="(parcel,index) in parcels" :key="parcel.index">
				<delivery-parcel :parcel="parcel" :index="index" :packed="packedStatus"></delivery-parcel>
			</p>

		</div>
	</div>
</template>

<script>

import swal from 'sweetalert' ;

import DeliveryParcel from './components/DeliveryParcels.vue' ; 

export default { 

	components :  { DeliveryParcel },

	name: 'Parcels',

	data () {
		return {
			parcels : [], 	
		}
	} , 


	computed  : { 

		packStatus() {
			return this.packed !== 0 
   				  //this should return true if it's not 0, else return false
				  // https://stackoverflow.com/questions/50853079/how-to-map-through-lodash-and-return-false-in-the-prop-value/50869166#50869166
				}

				endpoint(){
					return 'api/v1/parcels/to-pack' ; 
				},

				packageQuantity(){
					return this.parcels.length ; 
				}	

			},

			methods : {

				noParcelAlert() {
					swal ( "Alert" ,  "No Deliveries for Today!" ,  "success" )
				},

				welcomeAlert() {
					swal ( "Alert" ,  "You have deliveries for today"  ,  "success" )
				},

				defaultAlert() {
					swal ( "Alert" ,  "Retrieving your deliveries."  ,  "info" )
				},


				fetch(){
					axios.get(this.endpoint)
					.then(response => this.parcels = response.data)
					.catch(error => console.log(error.response.data));
				} , 

			},


			mounted(){

				this.fetch() ; 

				this.defaultAlert();

			},


			components: { DeliveryParcel }

		};

		</script>

		<style lang="css" scoped>

		.hero-header { margin-top : -10px ; } 

		</style>