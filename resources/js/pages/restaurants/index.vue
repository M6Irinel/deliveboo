<template>
    <div>
        <div v-html="forLogin" />
        <div class="container">
            <h1>Ristoranti belli</h1>
            <router-link :to="{name: 'Plates'}">piatti</router-link>
        </div>
    </div>
</template>


<script>
// @ts-nocheck

export default {
    name: 'RestaurantsIndex',

    data() {
        return {
            forLogin
        }
    },
}
</script>


<style lang="scss">

</style>
