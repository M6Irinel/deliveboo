<template>
    <div class="container mt-4">
        <h1 class="t-center">Grazie per aver acquistato da noi!</h1>
        <div class="mt-3 t-center">
            <router-link class="btn btn-success block py-1 px-5" :to="{name: 'Home'}">Torna ai ristoranti</router-link>
        </div>
    </div>
</template>


<script>
export default {
    name: 'ThankYou',
}
</script>


<style lang="scss">

</style>
