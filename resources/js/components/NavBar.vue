<template>
    <header class="fixed top right left z-index-full"
        :class="[(mobile && isOpenNavbar) ? 'h-100vh' : '', mobile ? tema ? 'bg-bottom-version-mobile-light light' : 'bg-bottom-version-mobile-light dark' : tema ? 'light' : 'dark']">
        <div class="container h-100 flex between-sm f-column f-row-sm">
            <div class="flex"
                :class="[mobile ? tema ? 'light shadow-1-light' : 'dark shadow-1-dark' : tema ? 'light' : 'dark']">
                <a class="grow-1 header-height flex center i-center decoration-none-H bold"
                    :class="[mobile ? 'pl-15' : '', tema ? 'bg-active-button-header-light bg-hover-button-header-light text-button-light text-hover-button-light' : 'bg-active-button-header-dark bg-hover-button-header-dark text-button-dark text-hover-button-dark']"
                    href="/" title="home">Deliveboo</a>

                <div>
                    <button v-if="mobile" @click="openClosedNavbar()" class="bg-transparent border-none"
                        :class="[tema ? 'bg-active-button-header-light bg-hover-button-header-light text-button-light text-hover-button-light' : 'bg-active-button-header-dark bg-hover-button-header-dark text-button-dark text-hover-button-dark']">
                        <font-awesome-icon v-if="isOpenNavbar" class="fs-7" icon="fa-solid fa-xmark" />
                        <font-awesome-icon v-else class="fs-5" icon="fa-solid fa-bars" />
                    </button>
                </div>
            </div>

            <div class="body-navbar flex f-column f-row-sm i-stretch grow-1 j-flex-end-sm transition-height duration-5"
                :class="[(mobile && !isOpenNavbar) ? 'd-none' : '']">

                <a class="header-height bold flex i-center j-flex-end border-b border-t border-none-sm px-3 decoration-none-H block black-H d-inline-block-sm"
                    :class="[mobile ? tema ? 'border-color-light bg-button-header-light text-button-light bg-hover-button-header-light bg-active-button-header-light text-hover-button-light' : 'border-color-dark bg-button-header-dark text-button-dark bg-hover-button-header-dark bg-active-button-header-dark text-hover-button-dark' : tema ? 'bg-hover-button-header-light text-button-light text-hover-button-light' : 'bg-hover-button-header-dark text-button-dark text-hover-button-dark']"
                    href="/login" title="sign in" @click="closeNavbar">
                    accedi
                </a>

                <a class="header-height bold flex i-center j-flex-end border-b border-none-sm px-3 decoration-none-H block black-H d-inline-block-sm"
                    :class="[mobile ? tema ? 'bg-button-header-light text-button-light border-color-light bg-hover-button-header-light bg-active-button-header-light text-hover-button-light' : 'bg-button-header-dark text-button-dark border-color-dark bg-hover-button-header-dark bg-active-button-header-dark text-hover-button-dark' : tema ? 'bg-hover-button-header-light text-button-light text-hover-button-light' : 'bg-hover-button-header-dark text-button-dark text-hover-button-dark']"
                    href="/register" title="new restaurant" @click="closeNavbar">
                    registrati
                </a>

                <div @click="closeNavbar">
                    <router-link :to="{ name: 'Settings' }"
                        class="header-height bold flex i-center j-flex-end border-b border-none-sm px-3 decoration-none-H block black-H d-inline-block-sm"
                        :class="[mobile ? tema ? 'bg-button-header-light text-button-light border-color-light bg-hover-button-header-light bg-active-button-header-light text-hover-button-light' : 'bg-button-header-dark text-button-dark border-color-dark bg-hover-button-header-dark bg-active-button-header-dark text-hover-button-dark' : tema ? 'bg-hover-button-header-light text-button-light text-hover-button-light' : 'bg-hover-button-header-dark text-button-dark text-hover-button-dark']"
                        title="new restaurant">
                        <span v-if="mobile">impostazioni</span>
                        <font-awesome-icon v-else icon="fa-solid fa-gear" />
                    </router-link>
                </div>
            </div>
        </div>
    </header>
</template>


<script>
// @ts-nocheck
import store from '../store/store';

export default {
    name: 'NavBar',

    data () {
        return {
            isOpenNavbar: false,
            widthSizeX: window.innerWidth
        }
    },

    computed: {
        mobile () {
            store.mobile = this.widthSizeX < 576;
            return store.mobile;
        },

        tema () {
            return store.coloreTema;
        },
    },

    methods: {
        openClosedNavbar () {
            store.closeTypology = true;
            this.isOpenNavbar = !this.isOpenNavbar;
        },

        getDimensions () {
            this.widthSizeX = window.innerWidth;
            if ( !this.mobile )
                this.isOpenNavbar = false;
        },

        closeNavbar () { this.isOpenNavbar = false }
    },

    mounted () {
        window.addEventListener( 'resize', this.getDimensions );
    },
    unmounted () {
        window.removeEventListener( 'resize', this.getDimensions );
    },
}
</script>


<style scoped lang="scss">
@import '../../sass/variabili.scss';

.header-height {
    height: $headerHeight;
}

.text-button-light {
    color: $textButtonLight;
}

.text-button-dark {
    color: $textButtonDark;
}

.text-hover-button-light:hover {
    color: $textHoverButtonLight;
}

.text-hover-button-dark:hover {
    color: $textHoverButtonDark;
}

.border-color-light {
    border-color: $borderColorHeaderLight;
}

.border-color-dark {
    border-color: $borderColorHeaderDark;
}

.bg-button-header-light {
    background-color: $bgButtonHeaderLight;
}

.bg-button-header-dark {
    background-color: $bgButtonHeaderDark;
}

.bg-bottom-version-mobile-light {
    background-color: $bgBottomVersionMobileLight;
}

.bg-bottom-version-mobile-dark {
    background-color: $bgBottomVersionMobileDark;
}

.bg-hover-button-header-light:hover {
    background-color: $bgHoverButtonHeaderLight !important;
}

.bg-hover-button-header-dark:hover {
    background-color: $bgHoverButtonHeaderDark !important;
}

.bg-active-button-header-light:active {
    background-color: $bgActiveButtonHeaderLight !important;
}

.bg-active-button-header-dark:active {
    background-color: $bgActiveButtonHeaderDark !important;
}

.light {
    background-color: $light;
    min-height: $headerHeight;
}

.dark {
    background-color: $dark;
    min-height: $headerHeight;
}

button {
    display: block;
    height: 100%;
    padding: 0 1.5rem;
}
</style>
