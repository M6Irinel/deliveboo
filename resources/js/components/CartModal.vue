<template>
    <div>
        <main v-if="!loadingCart" class="container">
            <div class="none" v-if="total" />

            <div v-if="plates">
                <ul class="list-style-none grid-12 grid-10-lg grid-12-xl gap-5">
                    <li class="card flex f-column g-col-6 g-col-4-sm g-col-3-md g-col-2-lg g-col-2-xl p-2"
                        :class="[tema ? 'bg-card-light' : 'bg-card-dark']"
                        v-for="(plate, i) in plates" :key="i">

                        <p class="mb-auto bold">{{ plate.plate_name }}</p>

                        <p>Prezzo: <strong>{{ plate.plate_price }}€</strong></p>

                        <div v-if="quantity(plate.plate_name) > 1">
                            <p>
                                Totale Piatto:
                                <strong>
                                    {{ parseFloat(plate.plate_price * quantity(plate.plate_name)).toFixed(2) }}
                                    €
                                </strong>
                            </p>
                        </div>

                        <div :class="[
                            'flex mt-auto',
                            quantity(plate.plate_name) ? 'between' : 'j-flex-end'
                        ]">
                            <button v-if="quantity(plate.plate_name)" class="btn border px-3 bold"
                                @click="removePlate(plate)">-</button>

                            <strong class="fs-4">
                                &#215;{{ quantity(plate.plate_name) }}
                            </strong>

                            <button class="btn border px-3 bold" @click="addPlate(plate)">+</button>
                        </div>
                    </li>
                </ul>
            </div>
        </main>
        <Load v-else />
    </div>
</template>


<script>
// @ts-nocheck
import store from "../store/store";
import Load from "../components/Loader.vue";

export default {
    name: "CartVue",

    components: { Load },

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

        tema () {
            return store.coloreTema;
        }
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
            store.totalCart = null
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
                store.prezzoTotaleDaPagare = s.toFixed(2);
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


<style scoped lang="scss">
@import '../../sass/variabili.scss';

.bg-card-light {
    background-color: $bgCardLight;
}

.bg-card-dark {
    background-color: $bgCardDark;
}
</style>
