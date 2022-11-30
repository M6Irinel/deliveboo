<template>
    <div @click="$emit('modalCart')" class="btn btn-success px-1">
        <font-awesome-icon icon="fa-solid fa-basket-shopping" />
        <span v-if="total">{{ parseFloat(total).toFixed(2) }}€</span>
    </div>
</template>


<script>
export default {
    name: 'ButtonCart',

    props: {
        total: {
            required: false,
            type: String
        }
    }
}
</script>


<style lang="scss">
</style>
