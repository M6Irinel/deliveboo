<template>
    <div @click="$emit('modalCart')" class="btn btn-success px-3 py-1">
        <div class="transition-transform duration-3 ease-in-out" :class="[status ? '' : 'rotate-180']">
            <font-awesome-icon icon="fa-solid fa-up-long" />
        </div>
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

<style scoped lang="scss">
</style>
