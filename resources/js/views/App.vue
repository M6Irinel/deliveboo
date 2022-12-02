<template>
    <div class="min-h-100vh flex f-column" :class="tema ? 'bg-body-light' : 'bg-body-dark'">
        <NavBar />
        <div class="grow-1">
            <router-view />
        </div>
        <FooterVue />
    </div>
</template>


<script>
// @ts-nocheck
import store from '../store/store';
import NavBar from '../components/NavBar.vue';
import FooterVue from '../components/Footer.vue';

export default {
    name: 'AppVue',

    components: { NavBar, FooterVue },

    computed: {
        tema () {
            return store.coloreTema;
        },
    },

    methods: {
        fetchRestaurants ( page = 1 ) {
            if ( store.typolo.length ) {
                axios.get( `/api/restaurants/index/${ store.typolo[ 0 ] }`, { params: { page: page } } ).then( r => {
                    const { data, last_page, current_page } = r.data.restaurants;
                    store.restaurants = data;
                    store.lastPage = last_page;
                    store.currentPage = current_page;
                    store.hasPlates = true;
                } );
                return;
            }
            axios.get( '/api/restaurants/index/all', { params: { page: page } } ).then( r => {
                const { data, last_page, current_page } = r.data.restaurants;
                store.restaurants = data;
                store.lastPage = last_page;
                store.currentPage = current_page;
                store.hasPlates = true;
            } );
        },

        fetchTypologies () {
            axios.get( '/api/typologies' ).then( r => {
                store.typologies = r.data.typologies;
                store.loadingRestaurant = false;
            } );
        },
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
