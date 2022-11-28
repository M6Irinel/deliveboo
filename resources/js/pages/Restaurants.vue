<template>
    <main class="container flex f-column">
        <div class="flex between i-center py-1">
            <h1>Ristoranti</h1>

            <div>
                <div @click="modalCart()" class="btn btn-success px-1">
                    <font-awesome-icon icon="fa-solid fa-basket-shopping" />
                    <span v-if="total">{{ parseFloat(total).toFixed(2) }}€</span>
                </div>
            </div>
        </div>

        <div v-if="!loading">
            <div class="flex j-flex-end relative gap-5">
                <div class="flex f-column">
                    <div class="grid-12 gap-5">
                        <router-link
                            class="g-col-3 border border-azure p-2 rounded t-center shadow btn bg-gray-1-H red-H"
                            v-for="(restaurant, i) in restaurants" :key="i"
                            :to="{ name: 'Plates', params: { 'slug': restaurant.user.slug } }">

                            <h4>{{ restaurant.user.name }}</h4>
                            <address>{{ restaurant.restaurant_address }}</address>
                            <p v-for="(t, i) in restaurant.typologies" :key="i">
                                {{ t.name }}
                            </p>
                        </router-link>
                    </div>

                    <div v-if="visibilityCart">
                        <CartModal />
                    </div>
                </div>

                <div class="sticky right top z-index-full bg-white shadow p-2 tag-wrapper t-center">
                    <div>Filtra per tipologie</div>

                    <ul class="list-style-none flex gap-5 f-column center">
                        <li v-for="(t, i) in typologies" :key="i">

                            <input class="d-none checkTrue" type="checkbox" :id="'typology-' + i" :value="t.name"
                                v-model="types">

                            <label :for="'typology-' + i"
                                class="d-block rounded-3 border pointer px-2 py-1 red-H bg-gray-1-H">
                                {{ t.name }}
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div v-else>
            <LoaderC />
        </div>
    </main>
</template>


<script>
// @ts-nocheck
import CartModal from '../components/CartModal.vue';
import LoaderC from '../components/Loader.vue';
import store from '../store/store';

export default {
    name: "RestaurantsIndex",

    components: { LoaderC, CartModal },

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
        }
    },

    computed: {
        restaurants () {
            let r = store.restaurants;
            if ( !this.types.length ) return r;
            return r.filter( e => this.types.every( f => e.typologies.map( m => m.name ).includes( f ) ) );
        },
        typologies () { return store.typologies; },
        loading () { return store.loading; },
        total () {
            if ( !store.totalCart )
                return sessionStorage.getItem( 'spesaTotale' );
            return store.totalCart;
        }
    },

}
</script>

<style lang="scss">
main {
    flex-grow: 1;
}

.tag-wrapper {
    flex-basis: 15%;
}

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

.checkTrue:checked + label {
    background-color: #ac7676;
}
</style>
