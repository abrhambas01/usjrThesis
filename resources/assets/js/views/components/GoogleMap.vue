<template>

	<google-map :center="center" :zoom="7" style="width: 100%; height: 500px">
		<google-cluster>
			<google-marker 
			v-for="(m, index) in markers"
			:key="index"
			:position="m.position" 
			:clickable="true" :draggable="true" @click="center=m.position"></google-marker>
		</google-cluster>
	</google-map>


</template>


<script>
export default {
	data(){
		return {


		}
	}
}
</script>