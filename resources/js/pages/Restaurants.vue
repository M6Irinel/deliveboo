<template>
    <div>
        <!-- <header v-html="forLogin" /> -->
        <main class="container">
            <div class="flex between align-items-center py-3 mt-2">
                <h1>Ristoranti</h1>
                <div>
                    <router-link class="btn btn-success px-1" :to="{ name: 'Cart' }">
                        <font-awesome-icon icon="fa-solid fa-basket-shopping" /> <span v-if="total">{{
                                parseFloat(total).toFixed(2)
                        }}€</span>
                    </router-link>
                </div>
            </div>

            <div class="d-flex gap-5">

                <div class="shadow p-2 mb-5 tag-wrapper">
                    <h4>Filtra per tipologie</h4>
                    <div class="list-style-none flex-column center">
                        <label class="px-2 py-1 border rounded-3 flex gap-6 pointer card__typology"
                            v-for="(t, i) in typologies" :key="i">
                            <input type="checkbox" :value="t.name" v-model="types">
                            <div>{{ t.name }}</div>
                        </label>
                    </div>
                </div>

                <ul class="list-style-none grid-12 gap-5" v-if="!loading">
                    <router-link class="g-col-3 border border-azure p-2 rounded t-center shadow  card__restaurant "
                        v-for="(restaurant, i) in restaurants" :key="i"
                        :to="{ name: 'Plates', params: { 'slug': restaurant.user.slug } }">
                        <li>
                            <strong>{{ restaurant.user.name }}</strong>
                        </li>
                        <li>
                            {{ restaurant.restaurant_address }}
                        </li>
                        <li>
                            <div v-if="restaurant.restaurant_image">
                                <img class="img-fluid" :src="'../storage/' + restaurant.restaurant_image" alt="" />
                            </div>
                        </li>
                    </router-link>
                </ul>
                <div v-else>
                    <LoaderC />

                </div>
            </div>
        </main>
    </div>
</template>


<script>
// @ts-nocheck
import LoaderC from '../components/Loader.vue';
import store from '../store/store';

export default {
    // props: ['slug'],
    name: "RestaurantsIndex",

    components: { LoaderC },

    data() {
        return {
            forLogin,
            types: [],
            total: sessionStorage.getItem('spesaTotale')
        };
    },

    computed: {
        restaurants() {
            let r = store.restaurants;
            if (!this.types.length) return r;
            return r.filter(e => this.types.every(f => e.typologies.map(m => m.name).includes(f)));
        },
        typologies() { return store.typologies; },
        loading() { return store.loading; },
    },
}
</script>

<style lang="scss">
.tag-wrapper {
    flex-basis: 15%;
}

.tag-distance {
    gap: 2rem;
}

.card__typology {
    &:hover {
        background-color: rgb(249, 242, 242);
        color: red;

    }
   }

.card__restaurant {
    background-color: rgb(249, 242, 242);

    img {
        border-radius: 50px;
        overflow: hidden;
        max-width: 90%;
    }

    &:hover {
        color: red;

        img {
            opacity: 0.5;
            scale: 1.1;
            border-radius: 150px;
        }
    }
}
</style>
