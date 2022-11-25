<template>
    <div>
        <header v-html="forLogin" />
        <main v-if="!loading" class="container">
            <div class="mt-2">
                <button class="btn btn-secondary px-1" @click="$router.go(-1)">←</button>
                <router-link class="btn btn-primary px-1" :to="{ name: 'Home' }">Ristoranti</router-link>
            </div>

            <h1>Cart</h1>
            <div v-if="plates">
                <ul class="list-style-none grid-12 gap-5">
                    <li class="g-col-3 card p-2 relative" v-for="(v, i) in plates" :key="i">
                        <div v-if="v.plate_image">
                            <img height="200" :src="'./storage/' + v.plate_image" alt="" />
                        </div>
                        <div>
                            <p>{{ v.plate_name }}</p>
                            <div class="absolute badge badge-primary p-1 badge-n" v-if="quantity(v.plate_name) > 1">
                                &Cross;
                                {{ quantity(v.plate_name) }}
                            </div>
                        </div>
                        <p>Prezzo: {{ v.plate_price }}€</p>
                        <div v-if="quantity(v.plate_name) > 1">
                            <p>Quantità: {{ quantity(v.plate_name) }}</p>
                            <p>Totale del Piatto: {{ parseFloat(v.plate_price * quantity(v.plate_name)).toFixed(2) }}€

                            </p>
                        </div>
                    </li>
                </ul>
                <div class="flex between">
                    <h2>Totale di tutto: {{ total().toFixed(2) }} €</h2>
                    <button class="btn btn-danger" @click="pulisciStorage()">Svuota il Carello</button>
                </div>

            </div>
            <div v-else>
                <p>carrello vuoto</p>

            </div>

        </main>
        <div v-else>
            <LoaderC />
        </div>
    </div>
</template>


<script>
// @ts-nocheck
import store from "../store/store";
import LoaderC from "../components/Loader.vue";


export default {
    name: "CartVue",

    components: { LoaderC },

    data () {
        return {
            forLogin,


        };
    },

    computed: {
        plates () {
            if ( store.plates )
                return store.plates.filter( ( e ) => sessionStorage[ e.plate_name ] );
            else return null;
        },
        loading () {
            return store.loading;
        },
    },

    methods: {
        fetchPlates () {
            if ( !sessionStorage.resId ) {
                return
            }

            store.loading = true;
            axios
                .get( `/api/restaurants/${ sessionStorage.getItem( "resId" ) }` )
                .then( ( r ) => {
                    store.plates = r.data.plates;
                    store.loading = false;
                } );
        },
        pulisciStorage () {
            sessionStorage.clear();
            location.reload();
        },
        quantity ( v ) {

            return sessionStorage.getItem( v + '-counter' );
        },
        total () {
            if ( !sessionStorage.resId ) {
                return
            }
            let s = 0
            this.plates.forEach( e => {
                let q = ( sessionStorage.getItem( e.plate_name + '-counter' ) )
                s += ( e.plate_price * q )
                sessionStorage.setItem( "spesaTotale", s );
            } )
            return s
        }


    },

    created () {
        this.fetchPlates();
    },

};
</script>


<style lang="scss">

</style>
