<template>
    <div>
        <header v-html="forLogin" />
        <main class="container">
            <div class="flex j-flex-end">
                <router-link :to="{ name: 'Cart' }">Carello</router-link>
            </div>

            <h1>Ristoranti</h1>

            <div class="shadow p-2 mb-5">
                <h4>Filtra per tipologie</h4>
                <div class="list-style-none flex gap-3 wrap center">
                    <label class="px-2 py-1 border rounded-3 flex gap-6 pointer" v-for="(t, i) in typologies" :key="i">
                        <input type="checkbox" :value="t.name" v-model="types">
                        <div>{{ t.name }}</div>
                    </label>
                </div>
            </div>

            <ul class="list-style-none grid-12 gap-5" v-if="!loading">
                <router-link class="g-col-3 border border-azure p-2 rounded t-center shadow"
                    v-for="(restaurant, i) in restaurants" :key="i"
                    :to="{ name: 'Plates', params: { 'slug': restaurant.user.slug } }">
                    <li>
                        <strong>{{ restaurant.user.name }}</strong>
                    </li>
                </router-link>
            </ul>
            <div v-else>
                <LoaderC />
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

</style>
