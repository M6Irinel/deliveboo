<template>
    <div>
        <main class="container">
            <div class="flex between pt-3">

                <ButtonsLeft />

                <div>
                    <button class="btn btn-danger px-3 py-1" v-if="total" @click="pulisciStorage()">
                        svuota cesto
                    </button>

                    <router-link class="btn btn-success px-3 py-1" :to="{ name: 'Cart' }">
                        <font-awesome-icon icon="fa-solid fa-basket-shopping" />
                        <span v-if="total">
                            {{ parseFloat(total).toFixed(2) }}€
                        </span>
                    </router-link>
                </div>
            </div>

            <HeroPlate v-if="user" :user="user" />

            <div v-if="!loadingPlates" class="grid-12 grid-10-lg grid-12-xl gap-5 pt-3">
                <div class="card flex f-column g-col-6 g-col-4-sm g-col-3-md g-col-2-lg g-col-2-xl p-2"
                    :class="[tema ? 'bg-card-light text-dark' : 'bg-card-dark text-light']"
                    v-for="(plate, i) in plates" :key="i">

                    <div class="image_plate">
                        <img v-if="plate.plate_image" :src="'../storage/' + plate.plate_image" alt="" />
                        <img v-else :src="'../img/default/plate-empty.png'" alt="" />
                    </div>

                    <div>
                        <p class="t-center bold">{{ plate.plate_name }}</p>

                        <p class="ingredients">
                            <strong>Ingredienti: </strong>
                            <span>{{ plate.ingredients }}</span>
                        </p>

                        <p class="flex between">
                            <strong>Prezzo: </strong>
                            <span>
                                {{ parseFloat(plate.plate_price).toFixed(2) }}€
                            </span>
                        </p>
                    </div>

                    <div :class="[
                        'flex mt-auto',
                        quantity(plate.plate_name) ? 'between' : 'j-flex-end'
                    ]">
                        <button v-if="quantity(plate.plate_name)" class="btn px-3 py-1 bold" :class="[tema ? 'bg-light' : 'bg-dark']"
                            @click="removePlate(plate)">-</button>

                        <div v-if="quantity(plate.plate_name)" class="fs-4 bold">&Cross;{{ quantity(plate.plate_name) }}</div>

                        <button class="btn px-3 py-1 bold" :class="[tema ? 'bg-light' : 'bg-dark']" @click="addPlate(plate)">+</button>
                    </div>
                </div>
            </div>
            <LoaderC v-else />
        </main>
    </div>
</template>


<script>
// @ts-nocheck
import LoaderC from "../components/Loader.vue";
import ButtonsLeft from "../components/ButtonsLeft.vue";
import HeroPlate from "../components/HeroPlate.vue";
import store from "../store/store";

export default {
    name: "PlatesIndex",

    components: { LoaderC, ButtonsLeft, HeroPlate },

    data () {
        return {
            forLogin,
            plates: null,
            user: null,
            total: localStorage.getItem( 'spesaTotale' )
        };
    },

    methods: {
        fetchPlates () {
            store.loadingPlates = true;
            axios.get( `/api/restaurants/${ this.$route.params.slug }` ).then( r => {
                console.log(r);
                this.user = r.data.user;
                this.plates = r.data.plates.filter( e => e.visibility );
                store.loadingPlates = false;
            } );
        },

        totalprice () {
            let s = 0;
            this.plates.forEach( e => {
                let q = localStorage.getItem( e.plate_name + '-counter' );
                s += e.plate_price * q;
                localStorage.setItem( "spesaTotale", s.toFixed( 2 ) );
                store.prezzoTotaleDaPagare = s.toFixed( 2 );
            } )
            this.total = localStorage.getItem( 'spesaTotale' );
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
                    }
                }
            }
            else alert( 'hai il pc vecchio, vai a piedi' );

            if ( localStorage.length <= 2 ) this.pulisciStorage();
        },

        pulisciStorage () {
            localStorage.clear();
            this.total = 0;
        },

        quantity ( v ) {
            return localStorage.getItem( v + '-counter' );
        },
    },

    computed: {
        restaurants () {
            return store.restaurants;
        },

        loadingPlates () {
            return store.loadingPlates;
        },

        restaurant_Id () {
            return this.$route.params.id;
        },

        tema () {
            return store.coloreTema;
        }
    },

    created () {
        this.fetchPlates();
        this.total = localStorage.getItem( 'spesaTotale' );
    },

};
</script>


<style lang="scss">
@import '../../sass/variabili.scss';

.bg-card-light {
    background-color: $bgCardLight;
}

.bg-card-dark {
    background-color: $bgCardDark;
}

.image_plate {
    height: 10rem;
    overflow: hidden;

    img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
}

.ingredients {
    height: 3rem;
    overflow-y: auto;
}
</style>
