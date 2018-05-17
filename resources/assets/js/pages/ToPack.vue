<template>
	<v-layout>
		<v-flex xs12 sm6 offset-sm3>
			<v-card>
				<v-card-media
				class="white--text"
				height="200px"
				src="/static/doc-images/cards/docks.jpg"
				>
				<v-container fill-height fluid>
					<v-layout fill-height>
						<v-flex xs12 align-end flexbox>
							<span class="headline">Top 10 Australian beaches</span>
						</v-flex>
					</v-layout>
				</v-container>
			</v-card-media>
			<v-card-title>
				<div>
					<span class="grey--text">Number 10</span><br>
					<span>Whitehaven Beach</span><br>
					<span>Whitsunday Island, Whitsunday Islands</span>
				</div>
			</v-card-title>
			<v-card-actions>
				<v-btn flat color="orange">Share</v-btn>
				<v-btn flat color="orange">Explore</v-btn>
			</v-card-actions>
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