<template>
    <main class="container flex f-column grow-1" :class="[tema ? 'text-dark' : 'text-light']">
        <div v-if="total" class="flex j-flex-end i-center pt-3 gap-10">
            <ButtonCart title="look cart preview" @modalCart="modalCart" :total="total" :status="visibilityCart" />

            <router-link class="btn btn-success px-2 py-1" :to="{ name: 'Cart' }">
                <font-awesome-icon icon="fa-solid fa-basket-shopping" />
                {{ parseFloat(total).toFixed(2) }}€
            </router-link>
        </div>

        <div class="flex j-flex-end grow-1 relative gap-5 i-flex-start pt-3">
            <div class="flex f-column gap-5 grow-1">
                <cart-modal v-if="visibilityCart" />

                <CardFrontEnd v-if="(!loadingRestaurant && restaurants)" :restaurants="restaurants" />
                <Loader v-else />

                <SelectPaginate />
            </div>

            <TypologyVue v-if="typologies" @emitTypes="emitTypes" :typologies="typologies" />
        </div>
    </main>
</template>


<script>
// @ts-nocheck
import store from '../store/store';
import CartModal from '../components/CartModal.vue';
import Loader from '../components/Loader.vue';
import ButtonCart from '../components/ButtonCart.vue';
import CardFrontEnd from '../components/Restaurant/CardFrontEnd.vue';
import TypologyVue from '../components/Restaurant/TypologyVue.vue';
import SelectPaginate from '../components/Restaurant/SelectPaginate.vue';

export default {
    name: "RestaurantsIndex",

    components: { Loader, CartModal, CardFrontEnd, TypologyVue, ButtonCart, SelectPaginate },

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

        emitTypes ( v ) {
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
        },
        tema () { return store.coloreTema; }
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
