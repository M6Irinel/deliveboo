<template>
    <div>
        <header v-html="forLogin" />
        <main class="container">
            <div class="flex between">
                <router-link :to="{ name: 'Home' }">Ristoranti</router-link>
                <router-link :to="{ name: 'Cart' }">Carello</router-link>
            </div>

            <h1>Piatti</h1>

            <div v-if="!loading">
                <div v-if="hasPlates">
                    <div v-for="(plate, i) in plates" :key="i">
                        <button @click="addPlate(plate)">
                            {{ plate.plate_name }}
                        </button>
                        <button @click="removePlate(plate)">Togli 1</button>
                    </div>
                </div>

                <button @click="pulisciStorage()">Svuota il Carello</button>
            </div>
            <div v-else>
                <LoaderC />
            </div>
        </main>
    </div>
</template>


<script>
// @ts-nocheck
import LoaderC from "../components/Loader.vue";
import store from "../store/store";

export default {
    name: "PlatesIndex",

    components: { LoaderC },

    data() {
        return {
            forLogin,
            plates: null,
        };
    },

    methods: {
        fetchPlates() {
            store.loading = true;
            axios.get( `/api/restaurants/${ this.$route.params.slug }` ).then( r => {
                this.plates = r.data.plates;
                store.loading = false;
            });
        },

        addPlate(plate) {
            if (typeof (Storage)) {
                if (localStorage.resId) {
                    if (localStorage.getItem("resId") == plate.restaurant_id) {
                        this.plateLocalStore( plate );
                        return
                    } else {
                        alert( 'non puoi ordinare da più ristoranti' );
                        return
                    }
                } else {
                    localStorage.setItem("resId", plate.restaurant_id);
                }
                this.plateLocalStore( plate );
            }
            else {
                alert('hai il pc vecchio, vai a piedi')
            }
        },

        plateLocalStore(plate) {
            let plateCounter = plate.plate_name + '-counter'
            if (localStorage.getItem(plate.plate_name) == plate.id) {
                let c = localStorage.getItem(plateCounter);
                localStorage.setItem(plateCounter, ++c);
            } else {
                localStorage.setItem(plate.plate_name, plate.id);
                localStorage.setItem(plateCounter, 1);
            }

        },

        removePlate(plate) {
            let plateCounter = plate.plate_name + '-counter'

            if (typeof (Storage)) {
                if (localStorage.getItem(plate.plate_name) == plate.id) {
                    let c = localStorage.getItem(plateCounter);
                    localStorage.setItem(plateCounter, --c);

                    if (c === 0) {
                        localStorage.removeItem(plateCounter);
                        localStorage.removeItem(plate.plate_name);
                    }
                }
            }
            else {
                alert('hai il pc vecchio, vai a piedi')
            }

            if(localStorage.length<=1){
                this.pulisciStorage()
            }
        },

        pulisciStorage() {
            localStorage.clear();
        }
    },

    computed: {
        restaurants() {
            return store.restaurants;
        },
        hasPlates() {
            return store.hasPlates;
        },
        loading() {
            return store.loading;
        },
        restaurant_Id() {
            return this.$route.params.id;
        },
    },

    created() {
        this.fetchPlates();
    },

};
</script>


<style lang="scss">

</style>
