<template>
    <div>
        <header v-html="forLogin" />
        <main v-if="store.loading" class="container">
            <div>
                <router-link :to="{ name: 'Home' }">Ristoranti</router-link>
            </div>

            <h1>Cart</h1>
            <ul v-if="plates">
                <li v-for="(v, i) in plates" :key="i">
                    <p>{{ v.plate_name }}</p>
                    <p>{{ v.plate_price }}</p>
                </li>
            </ul>
            <div v-else>
                <p>carello vuoto</p>
            </div>
        </main>
        <div v-else>
            <LoaderC />
        </div>
    </div>
</template>


<script>
// @ts-nocheck
import store from '../store/store';
import LoaderC from '../components/Loader.vue';

export default {
    name: 'CartVue',

    components: { LoaderC },

    data () {
        return {
            forLogin,
        }
    },

    computed: {
        plates () {
            if ( store.plates )
                return store.plates.filter( e => localStorage[ e.plate_name ] );
            else
                return null
        }
    },

    methods: {
        fetchPlates () {
            store.loading = true;
            axios.get( `/api/restaurants/${ localStorage.getItem( 'resId' ) }` ).then( r => {
                store.plates = r.data.plates;
                store.loading = false;
            } );
        },
    },

    created () {
        this.fetchPlates();
    }
}
</script>


<style lang="scss">

</style>
