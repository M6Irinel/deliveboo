<template>
    <div>
        <div v-html="forLogin" />
        <div class="container">
            <h1>Piatti</h1>
            <div v-if="!caricamento">
                <div v-if="vai">
                    <p v-for="(plate, i) in restaurants[restaurant_Id].plates" :key="i">{{ plate.plate_name }}</p>
                </div>
            </div>
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
    name: "PlatesIndex",
    data() {
        return {
            forLogin
        };
    },
    computed: {
        restaurants() { return store.restaurants; },
        vai() { return store.vai; },
        caricamento() { return store.caricamento; },
        restaurant_Id() { return this.$route.params.id; }
    },
    components: { LoadComp }
}
</script>


<style lang="scss">

</style>
