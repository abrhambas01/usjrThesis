<template>

	<menu-tiles></menu-tiles>
	<news-articles></news-articles>
	<stats></stats>

</template>
<script>

// components are .. menu-tiles
// articles from internet // news articles..
// stats .
// social media


import MenuTiles from '../components/MenuTiles.vue';
import NewsArticles from '../components/NewsArticles.vue' ; 
import Stats from '../components/Stats.vue';
import BottomTiles from '../components/SocialMediaStats.vue';

export default {

	name: 'Dashboard',

	data () {
		return {


		}
	}
}
</script>

<style lang="css" scoped>
</style>