<template>
    <div class="flex i-center gap-5">
        <button class="btn btn-secondary px-3 py-1" @click="$router.go(-1)">
            <font-awesome-icon icon="fa-solid fa-left-long" />
        </button>
        <router-link class="btn btn-primary px-3 py-1" :to="{ name: 'Home' }">Ristoranti</router-link>
    </div>
</template>


<script>
export default {
    name: 'ButtonsLeft',
}
</script>


<style lang="scss">

</style>
