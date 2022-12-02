<template>
    <ul class="mt-auto list-style-none flex center gap-12 py-3">
        <li :class="{
            'pointer bg-gray-3-H bg-gray-1 l': true,
            'bg-orange': page == currentPage,
        }" v-for="page in lastPage" :key="page" @click="newPage(page)">{{ page }}</li>
    </ul>
</template>


<script>
// @ts-nocheck
import store from '../../store/store';
import AppVue from '../../views/App.vue';

export default {
    name: 'SelectPaginate',

    computed: {
        currentPage () {
            return store.currentPage;
        },

        lastPage () {
            return store.lastPage;
        },
    },

    methods: {
        newPage ( page ) {
            AppVue.methods.fetchRestaurants( page );
        }
    }
}
</script>


<style lang="scss">
.l {
    width: 1.3rem;
    aspect-ratio: 1;
    border-radius: 50%;
    display: inline-block;
    text-align: center;
}
</style>
