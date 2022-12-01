<template>
    <div @click="$emit('modalCart')" class="btn btn-success px-3 py-1">
        <font-awesome-icon v-if="status" icon="fa-solid fa-up-long" />
        <font-awesome-icon v-else icon="fa-solid fa-down-long" />
    </div>
</template>


<script>
export default {
    name: 'ButtonCart',

    props: {
        total: {
            required: false,
            type: String
        },

        status: {
            type: Boolean
        }
    }
}
</script>


<style lang="scss">

</style>
