<template>
	<!-- Simple Textfield -->
	<div class="mdl-grid">
		<form action="#">
			<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">

				<div class="mdl-textfield mdl-js-textfield">
					<input class="mdl-textfield__input" type="text" id="sample1">
					<label class="mdl-textfield__label" for="sample1">Text...</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield">
					<input class="mdl-textfield__input" type="text" id="sample1">
					<label class="mdl-textfield__label" for="sample1">Text...</label>
				</div>

				<div class="mdl-textfield mdl-js-textfield">
					<input class="mdl-textfield__input" type="text" id="sample1">
					<label class="mdl-textfield__label" for="sample1">Text...</label>
				</div>
			</div>
		</form>
	</div>

	
</template>

<script>
	export default {

		name: 'Profile',

		data () {
			return {
				form :  {

					email : '',

					password : '' , 

					first_name : '' ,

					last_name:  '' , 

					complete_address : ' '

				}, 
			};
		} ,


		methods : { 

			getFormInformation(){
				axios.get('/api/v1/getFormInformation')
			}

		}
	};
</script>

<style lang="css" scoped>
</style>