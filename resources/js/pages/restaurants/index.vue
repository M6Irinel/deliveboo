<template>
    <div>
        <div v-html="forLogin" />
        <h1>Ristoranti belli</h1>
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
