<template>
    <div class="min-h-100vh flex f-column" :class="tema ? 'bg-body-light' : 'bg-body-dark'">
        <NavBar />
        <router-view />
    </div>
</template>


<script>
// @ts-nocheck
import store from '../store/store';
import NavBar from '../components/NavBar.vue';

export default {
    name: 'AppVue',

    components: { NavBar },

    computed: {
        tema () {
            return store.coloreTema;
        }
    },

    methods: {
        fetchRestaurants () {
            axios.get( '/api/restaurants' ).then( r => {
                store.restaurants = r.data.restaurants.data;
                console.log(r.data);
                store.hasPlates = true;
            } );
        },

        fetchTypologies () {
            axios.get( '/api/typologies' ).then( r => {
                store.typologies = r.data.typologies;
                store.loadingRestaurant = false;
            } );
        }
    },

    created () {
        store.loadingRestaurant = true;
        this.fetchRestaurants();
        this.fetchTypologies();
    }
}
</script>


<style lang="scss">
@import '../../sass/variabili.scss';

.grow-1 {
    flex-grow: 1;
}

.grow-2 {
    flex-grow: 2;
}

.bg-body-light {
    background-color: $bgBodyLight;
}

.bg-body-dark {
    background-color: $bgBodyDark;
}
</style>
