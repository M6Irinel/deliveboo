<template>
    <header class="h-auto-sm bg-red-7 sticky top right left z-index-full transition-h duration-3"
        :class="{ 'h-100vh': (mobile && isOpenNavbar) }">
        <div class="container flex between-sm f-column f-row-sm i-center-sm">
            <div class="flex">
                <div class="t-center title">
                    <a class="py-2 white d-block d-inline-block-sm decoration-none-H black-H bold" href="/" title="home">deliveboo</a>
                </div>
                <div v-if="mobile">
                    <button @click="openClosedNavbar()" class="bg-transparent border-none white">
                        <font-awesome-icon icon="fa-solid fa-bars" />
                    </button>
                </div>
            </div>

            <div class="flex-sm j-flex-end grow-1 bg-red-7 gap-20-sm p-2 p-0-sm" :class="{ 'd-none': (mobile && !isOpenNavbar) }">
                <div>
                    <a class="white decoration-none-H d-block t-right black-H d-inline-block-sm" :class="{ 'bold': mobile }" href="/login" title="sign in">accedi</a>
                </div>
                <div>
                    <a class="white decoration-none-H d-block t-right black-H d-inline-block-sm" :class="{ 'bold': mobile }" href="/register"
                        title="new restaurant">registrati</a>
                </div>
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
.title {
    flex-grow: 1;
}

button {
    display: block;
    height: 100%;
    padding: 0 1.5rem;
}
</style>
