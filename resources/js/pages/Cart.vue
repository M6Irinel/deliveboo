<template>
    <div>
        <header v-html="forLogin" />
        <main class="container">
            <div>
                <router-link :to="{ name: 'Home' }">Ristoranti</router-link>
            </div>

            <h1>Cart</h1>
        </main>
    </div>
</template>


<script>
// @ts-nocheck

export default {
    name: 'CartVue',

    data() {
        return {
            forLogin
        }
    },
}
</script>


<style lang="scss">

</style>
