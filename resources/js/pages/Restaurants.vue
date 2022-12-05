<template>
    <div class="flex f-column min-h-100vh">
        <main>
            <HeroMain />

            <div class="container flex f-column grow-1" :class="[tema ? 'text-dark' : 'text-light']">
                <div v-if="total" class="flex j-flex-end i-center pt-3 gap-10" :class="{ 'px-2': mobile }">
                    <ButtonCart title="look cart preview" @modalCart="modalCart" :total="total"
                        :status="visibilityCart" />

                    <router-link class="btn btn-success px-2 py-1" :to="{ name: 'Cart' }">
                        <font-awesome-icon icon="fa-solid fa-basket-shopping" />
                        {{ parseFloat(total).toFixed(2) }}€
                    </router-link>
                </div>

                <div class="flex j-flex-end grow-1 relative gap-5 i-flex-start pt-3">
                    <div class="flex f-column gap-5 grow-1" :class="{ 'px-2': mobile }">
                        <cart-modal v-if="visibilityCart" />

                        <CardFrontEnd v-if="restaurants" :restaurants="restaurants" />
                        <Loader v-else />

                        <SelectPaginate v-if="minPage" />
                    </div>

                    <TypologyVue v-if="typologies" @emitTypes="emitTypes" @close="close" :typologies="typologies" />
                    <Loader v-else />
                </div>
            </div>
        </main>

        <FooterVue />
    </div>
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
import HeroMain from '../components/HeroMain.vue';
import FooterVue from "../components/Footer.vue";

export default {
    name: "RestaurantsIndex",

    components: { Loader, CartModal, CardFrontEnd, TypologyVue, ButtonCart, SelectPaginate, HeroMain, FooterVue },

    data () {
        return {
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
        },

        close () { this.visibilityCart = false; },
    },

    computed: {
        minPage () { return store.lastPage > 1; },

        typologies () { return store.typologies; },

        tema () { return store.coloreTema; },

        mobile () { return store.mobile; },

        restaurants () {
            let r = store.restaurants;
            if ( !this.types.length ) return r;
            return r.filter( e => this.types.every( f => e.typologies.map( m => m.name ).includes( f ) ) );
        },

        total () {
            if ( !store.totalCart )
                return localStorage.getItem( 'spesaTotale' );
            return store.totalCart;
        },
    },
}
</script>

<style scoped lang="scss">
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
