<template>
    <div>
        <div v-html="forLogin" />
        <div class="container">
            <router-link :to="{ name: 'Home' }">Ristoranti</router-link>

            <h1>Piatti</h1>

            <div v-if="!loading">
                <div v-if="hasPlates">
                    <button v-for="(plate, i) in plates" :key="i" @click="addPlateLocalstorage(plate.plate_name)">
                        {{ plate.plate_name }}
                    </button>
                </div>
            </div>
            <div v-else>
                <LoaderC />
            </div>
        </div>
    </div>
</template>


<script>
// @ts-nocheck
import LoaderC from "../components/Loader.vue";
import store from "../store/store";

export default {
    name: "PlatesIndex",

    components: { LoaderC },

    data () {
        return {
            forLogin,
            plates: null,
            quantita: 1
        };
    },

    methods: {
        fetchPlates () {
            store.loading = true;
            axios.get( `/api/restaurants/${ this.$route.params.slug }` ).then( r => {
                this.plates = r.data.plates;
                store.loading = false;
            } );
        },

        addPlateLocalstorage ( nome ) {
            if ( localStorage.getItem( nome ) == null ) {
                this.quantita = 1;
                localStorage.setItem( nome, `${ nome }-${ this.quantita }` );
            } else {
                const t = localStorage.getItem( nome );
                let ar = t.split( '-' );
                this.quantita = Number( ar[ ar.length - 1 ] );
                localStorage.removeItem( nome );
                localStorage.setItem( nome, `${ nome }-${ ++this.quantita }` );
            }
        },


    },

    computed: {
        restaurants () {
            return store.restaurants;
        },
        hasPlates () {
            return store.hasPlates;
        },
        loading () {
            return store.loading;
        },
        restaurant_Id () {
            return this.$route.params.id;
        },
    },

    created () {
        this.fetchPlates();
    },
};
</script>


<style lang="scss">

</style>
