<template>
    <div>
        <div v-html="forLogin"/>
        <div class="container">
            <h1>Piatti</h1>
        </div>
    </div>
</template>


<script>
// @ts-nocheck

export default {
    name: 'PlatesIndex',

    data() {
        return {
            forLogin
        }
    },
}
</script>


<style lang="scss">

</style>
