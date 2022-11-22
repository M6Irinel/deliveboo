<template>
    <div>
        <div v-html="forLogin" />
        <h1>Ristoranti belli</h1>
        <router-link :to="{name: 'Plates'}">piatti</router-link>
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
