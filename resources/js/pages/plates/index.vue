<template>
    <div>
        <div v-html="forLogin" />
        <div class="container">
            <h1>Piatti</h1>
            <div>
                <p v-for="(plate, i) in restaurants[this.$route.params.id].plates" :key="i">{{ plate.plate_name }}</p>
            </div>
        </div>
    </div>
</template>


<script>
// @ts-nocheck
import store from '../../store/store';

export default {
    name: 'PlatesIndex',

    data () {
        return {
            forLogin
        }
    },

    computed: {
        restaurants () { return store.restaurants },
        // restaurant_Id () {
        //     store.restaurant_Id = this.$route.params.id;

        //     return parseInt( this.$route.params.id );
        // }
    },
}
</script>


<style lang="scss">

</style>
