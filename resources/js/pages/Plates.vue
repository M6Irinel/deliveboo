<template>
    <div>
        <div v-html="forLogin" />
        <div class="container">
            <router-link :to="{ name: 'Home' }">Ristoranti</router-link>

            <h1>Piatti</h1>

            <div v-if="!loading">
                <div v-if="hasPlates">
                    <button @click="addPlateLocalstorage(plate.plate_name)"
                        v-for="(plate, i) in plates" :key="i">
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
            nome: '',
            i: 1
        };
    },

    watch: {
        nome ( newName ) { localStorage.name = newName }
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
            if ( !localStorage.name ) {
                nome = localStorage.name
                this.i = 1;
            }
            localStorage.setItem( nome, nome );
            localStorage.setItem( ( nome + ' ' + this.i ), this.i++ );
        },


    },

    mounted () {
        if ( localStorage.name ) {
            this.nome = localStorage.name;
        }
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
