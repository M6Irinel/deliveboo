<template>
    <div class="container mt-4" :class="[tema ? 'text-dark' : 'text-light']">
        <h1 class="t-center">Grazie per aver acquistato da noi!</h1>
        <div class="mt-4 t-center">
            <router-link class="btn btn-success block py-1 px-5" :to="{name: 'Home'}">Torna ai ristoranti</router-link>
        </div>
    </div>
</template>


<script>
import store from '../store/store';
export default {
    name: 'ThankYou',

    computed: {
        tema () {
            return store.coloreTema;
        }
    }
}
</script>


<style scoped lang="scss">

</style>
