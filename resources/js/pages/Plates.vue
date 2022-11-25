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
        totalprice(){
          
            let s = 0
            this.plates.forEach(e=>{
                let q=(sessionStorage.getItem(e.plate_name + '-counter'))
                s+=(e.plate_price*q);
                sessionStorage.setItem("spesaTotale",s.toFixed(2));
            })
            return s
        },

        addPlate(plate) {
            if (typeof (Storage)) {
                if (sessionStorage.resId) {
                    if (sessionStorage.getItem("resId") == plate.restaurant_id) {
                        this.plateLocalStore( plate );
                      
                        return
                    } else {
                        alert( 'non puoi ordinare da più ristoranti' );
                        return
                    }
                } else {
                    sessionStorage.setItem("resId", plate.restaurant_id);
                }
                this.plateLocalStore( plate );
               
            }
            else {
                alert('hai il pc vecchio, vai a piedi')
            }

          
          
     
        },

        plateLocalStore(plate) {
            let plateCounter = plate.plate_name + '-counter'
          
      
            if (sessionStorage.getItem(plate.plate_name) == plate.id) {
                let c = sessionStorage.getItem(plateCounter);
                sessionStorage.setItem(plateCounter, ++c);
            } else {
                sessionStorage.setItem(plate.plate_name, plate.id);
                sessionStorage.setItem(plateCounter, 1);
            }
            this.totalprice()

        },

        removePlate(plate) {
            let plateCounter = plate.plate_name + '-counter'

            if (typeof (Storage)) {
                if (sessionStorage.getItem(plate.plate_name) == plate.id) {
                    let c = sessionStorage.getItem(plateCounter);
                    sessionStorage.setItem(plateCounter, --c);
                    this.totalprice();
                    

                    if (c === 0) {
                        sessionStorage.removeItem(plateCounter);
                        sessionStorage.removeItem(plate.plate_name);
                        
                    } 
                } 
            }
            else {
                alert('hai il pc vecchio, vai a piedi')
            }

            if(sessionStorage.length<=2){
                this.pulisciStorage()
            }
        },

        pulisciStorage() {
            sessionStorage.clear();
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
