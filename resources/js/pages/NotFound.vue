<template>
    <div :class="[tema ? 'text-dark' : 'text-light']">
        <h1>Pagina non trovata</h1>
    </div>
</template>


<script>
import store from '../store/store';
export default {
    name: 'NotFound',

    computed: {
        tema () {
            return store.coloreTema;
        }
    }
}
</script>


<style lang="scss">

</style>
