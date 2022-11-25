<template>
    <div>
        <header v-html="forLogin" />
        <main class="container">
            <div class="flex between mt-2">
                <div>
                    <button class="btn btn-secondary px-1" @click="$router.go(-1)">←</button>
                    <router-link class="btn btn-primary px-1" :to="{ name: 'Home' }">Ristoranti</router-link>
                </div>
                <div>
                    <router-link class="btn btn-success px-1" :to="{ name: 'Cart' }">
                        <font-awesome-icon icon="fa-solid fa-basket-shopping" /> <span v-if="total">{{
                                parseFloat(total).toFixed(2)
                        }}€</span>
                    </router-link>
                </div>
            </div>

            <h1>Piatti</h1>

            <div v-if="!loading">
                <div class="grid-12 grid-10-lg grid-12-xl gap-5" v-if="hasPlates">
                    <div class="card flex f-column g-col-6 g-col-4-sm g-col-3-md g-col-2-lg g-col-2-xl p-2" v-for="(plate, i) in plates" :key="i">

                        <div v-if="plate.plate_image">
                            <img class="img-fluid" :src="'./storage/' + plate.plate_image" alt="" />
                        </div>
                        <div v-else>
                            <img class="img-fluid" :src="'./img/default/plate-empty.png'" alt="" />
                        </div>

                        <div>
                            <p class="t-center">{{ plate.plate_name }}</p>

                            <p>
                                <strong>Ingredienti: </strong>
                                <span>{{ plate.ingredients }}</span>
                            </p>

                            <p class="flex between">
                                <strong>Prezzo: </strong>
                                <span>{{ parseFloat(plate.plate_price).toFixed(2) }}€</span>
                            </p>
                        </div>

                        <div :class="[
                            'flex mt-auto',
                            quantity(plate.plate_name) ? 'between' : 'j-flex-end'
                        ]">
                            <button v-if="quantity(plate.plate_name)" class="btn btn-danger px-3"
                                @click="removePlate(plate)">-</button>

                            <div class="badge badge-primary badge-n py-1 px-2">{{ quantity(plate.plate_name) }}</div>

                            <button class="btn btn-success px-3" @click="addPlate(plate)">+</button>
                        </div>
                    </div>
                </div>

                <div class="flex j-flex-end">
                    <button class="btn btn-danger px-1" @click="pulisciStorage()">Svuota il Carrello </button>
                </div>
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

    data () {
        return {
            forLogin,
            plates: null,
            total: sessionStorage.getItem( 'spesaTotale' )
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

        totalprice () {
            let s = 0
            this.plates.forEach( e => {
                let q = ( sessionStorage.getItem( e.plate_name + '-counter' ) );
                s += ( e.plate_price * q );
                sessionStorage.setItem( "spesaTotale", s.toFixed( 2 ) );
            } )
            this.total = sessionStorage.getItem( 'spesaTotale' );
        },

        addPlate ( plate ) {
            if ( typeof ( Storage ) ) {
                if ( sessionStorage.resId ) {
                    if ( sessionStorage.getItem( "resId" ) == plate.restaurant_id ) {
                        this.plateLocalStore( plate );
                        return;
                    } else {
                        alert( 'non puoi ordinare da più ristoranti' );
                        return;
                    }
                }
                sessionStorage.setItem( "resId", plate.restaurant_id );
                this.plateLocalStore( plate );
            }
            else {
                alert( 'hai il pc vecchio, vai a piedi' );
            }
        },

        plateLocalStore ( plate ) {
            let plateCounter = plate.plate_name + '-counter'

            if ( sessionStorage.getItem( plate.plate_name ) == plate.id ) {
                let c = sessionStorage.getItem( plateCounter );
                sessionStorage.setItem( plateCounter, ++c );
            } else {
                sessionStorage.setItem( plate.plate_name, plate.id );
                sessionStorage.setItem( plateCounter, 1 );
            }
            this.totalprice();
        },

        removePlate ( plate ) {
            let plateCounter = plate.plate_name + '-counter';

            if ( typeof ( Storage ) ) {
                if ( sessionStorage.getItem( plate.plate_name ) == plate.id ) {
                    let c = sessionStorage.getItem( plateCounter );
                    sessionStorage.setItem( plateCounter, --c );
                    this.totalprice();
                    if ( c === 0 ) {
                        sessionStorage.removeItem( plateCounter );
                        sessionStorage.removeItem( plate.plate_name );
                    }
                }
            }
            else {
                alert( 'hai il pc vecchio, vai a piedi' )
            }

            if ( sessionStorage.length <= 2 ) {
                this.pulisciStorage();
            }
        },

        pulisciStorage () {
            sessionStorage.clear();
            this.total = 0;
        },

        quantity ( v ) {
            return sessionStorage.getItem( v + '-counter' );
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
        }
    },

    created () {
        this.fetchPlates();
        this.total = sessionStorage.getItem( 'spesaTotale' );
    },

};
</script>


<style lang="scss">

</style>
