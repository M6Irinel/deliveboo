<template>
    <div>
        <div v-html="forLogin" />
        <div class="container">
            <h1>Ristoranti belli</h1>
            <ul>Tutte le tipologie:
                <li v-for="(t, i) in typologies" :key="i">
                    <input type="checkbox" :value="t.name" @click="prova(t.name)">
                     <strong> {{ t.name }} </strong>
                </li>
            </ul>
            
            <ul v-if="!caricamento">
                <router-link v-for="(restaurant, i) in restaurants" :key="i"
                    :to="{ name: 'Plates', params: { 'id': i } }">
                    <li>
                        <strong> Nome Ristorante:- {{ restaurant.user.name }} </strong>
                    </li>
                </router-link>
            </ul>
          
            <div v-else>
                <LoadComp />
            </div>
        </div>
    </div>
</template>


<script>
// @ts-nocheck
import LoadComp from '../../components/LoadComp.vue';
import store from '../../store/store';

export default {
    name: "RestaurantsIndex",
    data() {
        return {
            forLogin,
            type:""
        };
    },
    computed: {
        restaurants() { return store.restaurants; },
        typologies() { return store.typologies; },
        caricamento() { return store.caricamento; },
    },
    components: { LoadComp },
methods:{
    prova(t){
        console.log(t)
    }
}

}
</script>


<style lang="scss">

</style>
