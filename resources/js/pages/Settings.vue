<template>
    <div class="container">
        <div class="mt-3 flex gap-30">
            <ButtonsLeft />

            <h3 :class="[tema ? 'text-dark':'text-light']">Impostazioni</h3>
        </div>

        <div class="flex gap-20 mt-3">
            <h3 :class="[tema ? 'text-dark':'text-light']">Tema</h3>
            <button class="btn btn-light border px-3 py-1" @click="light">light</button>
            <button class="btn btn-dark border px-3 py-1" @click="dark">dark</button>
        </div>
    </div>
</template>


<script>
// @ts-nocheck
import store from '../store/store';
import ButtonsLeft from '../components/ButtonsLeft.vue';

export default {
    name: 'SettingsVue',

    components: { ButtonsLeft },

    computed: {
        tema () {
            return store.coloreTema;
        }
    },

    methods: {
        light () {
            store.coloreTema = 1;
        },

        dark () {
            store.coloreTema = 0;
        },
    }
}
</script>


<style scoped lang="scss">

</style>
