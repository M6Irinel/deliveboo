<template>
    <div>
        <main v-if="!loadingCart" class="container">
            <div class="flex between mt-2">

                <div class="mt-2">
                    <button class="btn btn-secondary px-1" @click="$router.go(-1)">←</button>
                    <router-link class="btn btn-primary px-1" :to="{ name: 'Home' }">Ristoranti</router-link>
                </div>

                <div>
                    <div class="badge badge-warning p-2 fs-3">
                        <font-awesome-icon icon="fa-solid fa-basket-shopping" />

                        <span v-if="total">
                            {{ parseFloat(total).toFixed(2) }}€
                        </span>
                    </div>
                </div>
            </div>

            <h1>Cart</h1>

            <div v-if="plates">
                <ul class="list-style-none grid-12 grid-10-lg grid-12-xl gap-5">
                    <li class="card flex f-column g-col-6 g-col-4-sm g-col-3-md g-col-2-lg g-col-2-xl p-2"
                        v-for="(plate, i) in plates" :key="i">

                        <div v-if="plate.plate_image">
                            <img class="img-fluid" :src="'./storage/' + plate.plate_image" alt="" />
                        </div>
                        <div v-else>
                            <img class="img-fluid" :src="'./img/default/plate-empty.png'" alt="" />
                        </div>

                        <div class="mt-auto">
                            <p>{{ plate.plate_name }}</p>
                            <div class="absolute badge badge-primary p-1 badge-n" v-if="quantity(plate.plate_name) > 1">
                                &Cross;
                                {{ quantity(plate.plate_name) }}
                            </div>
                        </div>

                        <p>Prezzo: {{ plate.plate_price }}€</p>

                        <div v-if="quantity(plate.plate_name) > 1">
                            <p>Quantità: {{ quantity(plate.plate_name) }}</p>
                            <p>
                                Totale del Piatto:
                                {{ parseFloat(plate.plate_price * quantity(plate.plate_name)).toFixed(2) }}
                                €
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
                    </li>
                </ul>
                <div class="flex between">
                    <h2>Totale di tutto: {{ totalF().toFixed(2) }} €</h2>
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
            total: localStorage.getItem( 'spesaTotale' )
        };
    },

    computed: {
        plates () {
            if ( store.plates )
                return store.plates.filter( ( e ) => localStorage[ e.plate_name ] );
            else return null;
        },

        loadingCart () {
            return store.loadingCart;
        },
    },

    methods: {
        fetchPlates () {
            if ( !localStorage.resId ) return;

            store.loadingCart = true;
            axios.get( `/api/restaurants/${ localStorage.getItem( "resId" ) }` )
                .then( ( r ) => {
                    store.plates = r.data.plates;
                    store.loadingCart = false;
                } );
        },

        pulisciStorage () {
            localStorage.clear();
            store.plates = null;
            this.total = 0;
            store.totalCart=null
        },

        totalF () {
            if ( !localStorage.resId ) return;

            let s = 0;
            this.plates.forEach( e => {
                let q = localStorage.getItem( e.plate_name + '-counter' );
                s += e.plate_price * q;
                localStorage.setItem( "spesaTotale", s );
            } )
            return s;
        },

        addPlate ( plate ) {
            if ( typeof ( Storage ) ) {
                if ( localStorage.resId ) {
                    if ( localStorage.getItem( "resId" ) == plate.restaurant_id ) {
                        this.plateLocalStore( plate );
                        return;
                    } else {
                        alert( 'non puoi ordinare da più ristoranti' );
                        return;
                    }
                }
                localStorage.setItem( "resId", plate.restaurant_id );
                this.plateLocalStore( plate );
            }
            else alert( 'hai il pc vecchio, vai a piedi' );
        },

        plateLocalStore ( plate ) {
            let plateCounter = plate.plate_name + '-counter';

            if ( localStorage.getItem( plate.plate_name ) == plate.id ) {
                let c = localStorage.getItem( plateCounter );
                localStorage.setItem( plateCounter, ++c );
            } else {
                localStorage.setItem( plate.plate_name, plate.id );
                localStorage.setItem( plateCounter, 1 );
            }
            this.totalprice();
        },

        removePlate ( plate ) {
            let plateCounter = plate.plate_name + '-counter';

            if ( typeof ( Storage ) ) {
                if ( localStorage.getItem( plate.plate_name ) == plate.id ) {
                    let c = localStorage.getItem( plateCounter );
                    localStorage.setItem( plateCounter, --c );
                    this.totalprice();
                    if ( c === 0 ) {
                        localStorage.removeItem( plateCounter );
                        localStorage.removeItem( plate.plate_name );
                        store.plates.splice( store.plates.indexOf( plate ), 1 );
                    }
                }
            }
            else alert( 'hai il pc vecchio, vai a piedi' );

            if ( localStorage.length <= 2 ) this.pulisciStorage();
        },

        totalprice () {
            let s = 0;
            this.plates.forEach( e => {
                let q = localStorage.getItem( e.plate_name + '-counter' );
                s += e.plate_price * q;
                localStorage.setItem( "spesaTotale", s.toFixed( 2 ) );
            } )
            this.total = localStorage.getItem( 'spesaTotale' );
            store.totalCart = this.total;
        },

        quantity ( v ) {
            return localStorage.getItem( v + '-counter' );
        },
    },

    created () {
        this.fetchPlates();
    },
};
</script>


<style lang="scss">

</style>
