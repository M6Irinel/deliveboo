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
                        <button @click="addPlate(plate.plate_name)">
                            {{ plate.plate_name }}
                        </button>
                        <button @click="removePlate(plate.plate_name)">Togli 1</button>
                    </div>
                </div>

                <button @click="pulisciStorage()">pulisci tutto Storage</button>
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
            axios.get(`/api/restaurants/${this.$route.params.slug}`).then(r => {
                this.plates = r.data.plates;
                store.loading = false;
            });
        },

        addPlate(plate_name) {
            let plateCounter = plate_name + '-counter'

            if (typeof (Storage)) {

                //controllo se id rest è presente, se non lo è lo salvo, se lo è lo paragono, se diverso alert, se uguale vai avanti
               
                if (localStorage.rId) {
                    console.log('qui')
                    console.log(localStorage.getItem("rId"))
                }else{
                    console.log('id vuoto')
                }

                
                if (localStorage.getItem(plate_name) == plate_name) {
                    let c = localStorage.getItem(plateCounter);
                    localStorage.setItem(plateCounter, ++c);
                } else {
                    localStorage.setItem(plate_name, plate_name);
                    localStorage.setItem(plateCounter, 1);
                }
            }
            else {
                alert('hai il pc vecchio, vai a piedi')
            }
        },

        removePlate(plate_name) {
            let plateCounter = plate_name + '-counter'

            if (typeof (Storage)) {
                if (localStorage.getItem(plate_name) == plate_name) {
                    let c = localStorage.getItem(plateCounter);
                    localStorage.setItem(plateCounter, --c);

                    if (c === 0) {
                        localStorage.removeItem(plateCounter);
                        localStorage.removeItem(plate_name);
                    }
                }
            }
            else {
                alert('hai il pc vecchio, vai a piedi')
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
