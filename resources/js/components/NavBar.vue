<template>
    <header class="sticky top right left z-index-full"
        :class="{ 'h-100vh': (mobile && isOpenNavbar), 'primaria': !mobile, 'bg-bottom-version-mobile': mobile }">
        <div class="container flex between-sm f-column f-row-sm">
            <div class="flex" :class="{ 'primaria shadow-1-light': mobile }">
                <div class="grow-1">
                    <a class="t-shadow header-height bg-hover-button-header bg-active-button-header flex center i-center white decoration-none-H black-H bold"
                        :class="{ 'pl-15': mobile }" href="/" title="home">deliveboo</a>
                </div>

                <div>
                    <button v-if="mobile" @click="openClosedNavbar()"
                        class="bg-transparent border-none white bg-hover-button-header bg-active-button-header">
                        <font-awesome-icon icon="fa-solid fa-bars" />
                    </button>
                </div>
            </div>

            <div class="flex f-column f-row-sm i-stretch grow-1 j-flex-end"
                :class="{ 'd-none': (mobile && !isOpenNavbar) }">

                <a class="header-height bold border-color bg-hover-button-header bg-active-button-header flex i-center j-flex-end border-b border-t border-none-sm px-3 decoration-none-H block black-H d-inline-block-sm"
                    :class="{ 'bg-button-header text-button': mobile, 'white t-shadow': !mobile }" href="/login"
                    title="sign in">accedi</a>

                <a class="header-height bold border-color bg-hover-button-header bg-active-button-header flex i-center j-flex-end border-b border-none-sm px-3 decoration-none-H block black-H d-inline-block-sm"
                    :class="{ 'bg-button-header text-button': mobile, 'white t-shadow': !mobile }" href="/register"
                    title="new restaurant">registrati</a>
            </div>
        </div>
    </header>
</template>


<script>
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
            return this.widthSizeX < 576;
        },
    },

    methods: {
        openClosedNavbar () {
            this.isOpenNavbar = !this.isOpenNavbar;
        },

        getDimensions () {
            this.widthSizeX = window.innerWidth;
            if ( !this.mobile )
                this.isOpenNavbar = false;
        }
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

.text-button {
    color: $textButton;
}

.border-color {
    border-color: $borderColorHeader;
}

.bg-button-header {
    background-color: $bgButtonHeader;
}

.bg-bottom-version-mobile {
    background-color: $bgBottomVersionMobile;
}

.bg-hover-button-header:hover {
    background-color: $bgHoverButtonHeader !important;
}

.bg-active-button-header:active {
    background-color: $bgActiveButtonHeader !important;
}

.primaria {
    background-color: $primaria;
    min-height: $headerHeight;
}

.title {
    flex-grow: 1;
}

button {
    display: block;
    height: 100%;
    padding: 0 1.5rem;
}
</style>
