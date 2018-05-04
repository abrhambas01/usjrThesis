<template>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout-title" v-text="this.$route.name"></span>
            </div>
            <!-- Show the tabs when on Homepage -->
            <!-- v-if="$route.name ==='toPack' || $route.name ==='startDelivery' ? true : false" -->

            <div class="mdl-layout__tab-bar mdl-js-ripple-effect">


                <router-link :to="{ name : 'toPack', params : { id : authUser.id } }" class="mdl-layout__tab">Parcels To Pack</router-link>
                <router-link :to="{ name : 'startDelivery', params : { id : authUser.id } }" class="mdl-layout__tab">Delivery Map</router-link>
                <router-link :to="{ name : 'account', params : { id : authUser.id } }" class="mdl-layout__tab">Account</router-link>

            </div>
        </header>
        <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
            <header class="demo-drawer-header">
                <img src="images/user.jpg" class="demo-avatar">

                <div class="demo-avatar-dropdown">
                    <span>{{ authUser.email }}</span>
                    <div class="mdl-layout-spacer"></div>
                    <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">

                        <i class="material-icons" role="presentation">arrow_drop_down</i>
                        <span class="visuallyhidden">Accounts</span>
                    </button>
                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                        <li class="mdl-menu__item">Sign out</li>
                    </ul>
                </div>
            </header>

            <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">

      <!--           <router-link :to="{ name : 'courierHome', params : { id : authUser.id }}" class="mdl-navigation__link">Home</router-link>
                <router-link :to="{ name : 'courierHome', params : { id : authUser.id }}" class="mdl-navigation__link">Home</router-link>
                <router-link :to="{ name : 'courierHome', params : { id : authUser.id }}" class="mdl-navigation__link">Home</router-link>
            -->

<!-- 
                <router-link :to="{ name : 'dashboard'} " class="mdl-navigation__link">
                    <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Home
                </router-link>


                <router-link :to="{ name : 'toPack', params : { id : authUser.id }} " class="mdl-navigation__link">
                    <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">shopping_cart</i>Start
                    Delivery
                </router-link>

                <router-link to="/account" class="mdl-navigation__link">
                    <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">settings</i>Account
                </router-link>
            -->

        </nav>
    </div>

    <main class="mdl-layout__content">
        <router-view></router-view>

    
  </main>

</div>
</template>

<script>
export default {

    data() {
        return {
            pageTitle: 'Mypharma',
            

        };
    },

};

</script>


<style>
span.username {
    font-size: 15px;
}

/*.mdl-layout__header {
    background-color: #2779b3;
    }*/
    .mdl-layout__header{
        background-color :#505050;

    }

    .mdl-layout__tab-bar {
        height: 46px;

    }


    </style>