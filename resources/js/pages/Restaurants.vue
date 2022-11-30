<template>
    <main class="container flex f-column grow-1">
        <div class="flex between i-center py-1 sticky top left right">
            <h1>Ristoranti</h1>

            <ButtonCart title="look cart preview" @modalCart="modalCart" :total="total" />
        </div>

        <div class="flex j-flex-end relative gap-5 i-flex-start">
            <div class="flex f-column gap-5 grow-1">
                <cart-modal v-if="visibilityCart" />

                <CardFrontEnd v-if="(!loadingRestaurant && restaurants)" :restaurants="restaurants" />
                <LoaderC v-else />
            </div>

            <TypologyVue v-if="typologies" @emitTypes="emitTypes" :typologies="typologies" />
        </div>
    </main>
</template>


<script>
// @ts-nocheck
import store from '../store/store';
import CartModal from '../components/CartModal.vue';
import LoaderC from '../components/Loader.vue';
import ButtonCart from '../components/ButtonCart.vue';
import CardFrontEnd from '../components/Restaurant/CardFrontEnd.vue';
import TypologyVue from '../components/Restaurant/TypologyVue.vue';

export default {
    name: "RestaurantsIndex",

    components: { LoaderC, CartModal, CardFrontEnd, TypologyVue, ButtonCart },

    data () {
        return {
            forLogin,
            types: [],
            visibilityCart: false
        };
    },

    methods: {
        modalCart () {
            this.visibilityCart = !this.visibilityCart
        },

        emitTypes (v) {
            this.types = v;
        }
    },

    computed: {
        restaurants () {
            let r = store.restaurants;
            if ( !this.types.length ) return r;
            return r.filter( e => this.types.every( f => e.typologies.map( m => m.name ).includes( f ) ) );
        },
        typologies () { return store.typologies; },
        loadingRestaurant () { return store.loadingRestaurant; },
        total () {
            if ( !store.totalCart )
                return localStorage.getItem( 'spesaTotale' );
            return store.totalCart;
        }
    },
}
</script>

<style lang="scss">
.tag-distance {
    gap: 2rem;
}

.card__restaurant {
    overflow: hidden;

    img {
        border-radius: 20px;
        max-width: 90%;
    }

    &:hover {
        img {
            opacity: 0.5;
            scale: 1.1;
            border-radius: 150px;
        }
    }
}
</style>
