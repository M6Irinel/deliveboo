<template>
    <div>
        <header v-html="forLogin" />
        <main class="container">
            <div>
                <router-link :to="{ name: 'Home' }">Ristoranti</router-link>
            </div>

            <h1>Cart</h1>
            <ul>
              

                <li v-for="(value, key, index) in o" v-if="key!=value" :key="index">
                    <div >
                        {{ key }}: {{ value }}
                    </div>
                </li>

            </ul>
        </main>
    </div>
</template>


<script>
// @ts-nocheck

export default {
    name: 'CartVue',

    data() {
        return {
            forLogin,
            o: localStorage
        }
    },
}
</script>


<style lang="scss">

</style>
