<template>
	
	<v-app>
		<v-navigation-drawer
		temporary
		v-model="drawer"
		absolute
		>
		<v-list class="pa-1" dark>
			<v-list-tile avatar>
				<v-list-tile-avatar>
					<img src="https://randomuser.me/api/portraits/men/85.jpg" >
				</v-list-tile-avatar>
				<v-list-tile-content>
					<v-list-tile-title>John Leider</v-list-tile-title>
				</v-list-tile-content>
			</v-list-tile>
		</v-list>
		<v-list class="pt-0" dense>
			<v-divider></v-divider>
			<v-list-tile v-for="item in items" :key="item.title" @click="">
				<v-list-tile-action>
					<v-icon>{{ item.icon }}</v-icon>
				</v-list-tile-action>
				<v-list-tile-content>
					<v-list-tile-title>{{ item.title }}</v-list-tile-title>
				</v-list-tile-content>
			</v-list-tile>
		</v-list>
	</v-navigation-drawer>

	<v-toolbar>
		<v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
		<v-toolbar-title>Page Title</v-toolbar-title>
		<v-spacer></v-spacer>
		<v-menu bottom left>
			<v-btn icon slot="activator" light>
				<v-icon>more_vert</v-icon>
			</v-btn>
			<v-list>
				<v-list-tile v-for="(item, i) in items" :key="i" @click="">
					<v-list-tile-title>{{ item.title }}</v-list-tile-title>
				</v-list-tile>
			</v-list>
		</v-menu>
	</v-toolbar>


	<v-content>
		<v-container fluid>
			<router-view></router-view>
		</v-container>
	</v-content>
	<v-footer app></v-footer>
</v-app>


</template>

<script>
	export default {
		data () {
			return {
				drawer: null,
				items: [
				{ title: 'Home', icon: 'dashboard', link : '/' },
				{ title: 'About', icon: 'question_answer', link :  }
				]
			}
		},

		props: {
			source: String
		}
	}
</script>