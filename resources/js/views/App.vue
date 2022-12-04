<template>
    <div class="min-h-100vh flex f-column" :class="tema ? 'bg-body-light' : 'bg-body-dark'">
        <NavBar />
        <div class="grow-1 padding-height-navbar">
            <router-view />
        </div>
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
        tema () { return store.coloreTema; },

        mobile () { return store.mobile; },
    },

    methods: {
        fetchRestaurants ( page = 1 ) {
            if ( store.typolo.length ) {
                this.forRestaurants( store.typolo[0], page );
                return;
            }
            this.forRestaurants( 'all', page );
        },

        forRestaurants ( v, p ) {
            axios.get( `/api/restaurants/index/${ v }`, { params: { page: p } } ).then( r => {
                const { data, last_page, current_page } = r.data.restaurants;
                store.restaurants = data;
                store.lastPage = last_page;
                store.currentPage = current_page;
            } );
        },

        fetchTypologies () {
            axios.get( '/api/typologies' ).then( r => {
                store.typologies = r.data.typologies;
            } );
        },

        clearStorage () {
            if ( localStorage.coloreTema ) {
                const c = localStorage.getItem( 'coloreTema' );
                localStorage.clear();
                localStorage.setItem( 'coloreTema', c );
                return;
            }
            localStorage.clear();
        }
    },

    created () {
        this.fetchRestaurants();
        this.fetchTypologies();

        if ( localStorage.coloreTema ) store.coloreTema = parseInt(localStorage.getItem( 'coloreTema' ));
        else localStorage.setItem( 'coloreTema', store.coloreTema );
    },
}
</script>


<style lang="scss">
@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
@import '../../sass/variabili.scss';
*{
    font-family: 'Montserrat', sans-serif !important;
}
.grow-0 {
    flex-grow: 0;
}

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

.padding-height-navbar {
    padding-top: $headerHeight;
}
</style>
