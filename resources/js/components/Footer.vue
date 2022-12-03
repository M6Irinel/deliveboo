<template>
    <footer :class="[tema ? 'bg-footer-light' : 'bg-footer-dark']">
        <div class="container">
            footer
        </div>
    </footer>
</template>


<script>
import store from '../store/store';
export default {
    name: 'FooterVue',

    computed: {
        tema () { return store.coloreTema; }
    }
}
</script>


<style scoped lang="scss">
@import '../../sass/variabili.scss';

.bg-footer-light {
    background-color: $bgFooterLight;
}

.bg-footer-dark {
    background-color: $bgFooterDark;
}
</style>
