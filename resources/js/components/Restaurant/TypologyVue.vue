<template>
    <div class="z-index-3 shadow tag-wrapper2 t-center" :class="[
        (stateTypologies && mobile) ? 'left-70' : 'left-100',
        mobile ? 'fixed right top-50 translate-Y-50 transition-all duration-4 ease-in-out' :
        'sticky top-height-navbar right'
    ]">
        <button v-if="mobile" @click="open_close"
            class="openTab bg-white py-8 absolute top-50 right-100 translate-Y-50 z-full transition-transform duration-5 ease-in-out">
            <div class="transition-transform duration-4 ease-in-out overflow-visible fs-3"
                :class="[stateTypologies ? 'rotate-0' : 'rotate-180']">►</div>
        </button>

        <ul class="list-style-none flex f-column overflow-hidden" :class="[mobile ? 'rounded-tl-4 rounded-bl-4' : '']">
            <li v-for="(typology, i) in typologies" :key="i">
                <input @input.prevent="emita" class="d-none"
                    :class="[tema ? 'bg-active-button-light' : 'bg-active-button-dark']" type="checkbox"
                    :id="'typology-' + i" :value="typology.name" v-model="types">

                <label :for="'typology-' + i" :class="[
                    mobile ? 'px-3' : '',
                    tema ? 'bg-button-light bg-hover-button-light text-active-button-light' :
                        'bg-button-dark bg-hover-button-dark text-active-button-dark'
                ]" class="d-block pointer p-2 bold  transition-bg-color duration-3 ease-in-out">
                    {{ typology.name }}
                </label>
            </li>
        </ul>
    </div>
</template>


<script>
// @ts-nocheck
import App from '../../views/App.vue';
import store from '../../store/store';

export default {
    name: 'TypologyVue',

    props: {
        typologies: {
            required: true,
            type: Array
        }
    },

    data () {
        return {
            types: [],
            stateTypologies: false,
        }
    },

    computed: {
        mobile () { return store.mobile; },

        tema () { return store.coloreTema },

        closeTypology () { return store.closeTypology; }
    },

    watch: {
        mobile () { if ( !this.mobile ) this.stateTypologies = false; },

        closeTypology () {
            store.closeTypology = this.stateTypologies = false;
        }
    },

    methods: {
        emita () {
            setTimeout( () => {
                this.$emit( 'emitTypes', this.types );
                store.typolo = this.types;
                App.methods.fetchRestaurants();
                if ( this.mobile ) this.$emit( 'close' );
            }, 0 );
        },

        open_close () {
            this.stateTypologies = !this.stateTypologies;
        },
    }
}
</script>


<style scoped lang="scss">
@import '../../../sass/variabili.scss';
.button {
  background: none;
  border: 2px solid;
  font: inherit;
  line-height: 1;
  margin: 0.5em;
  padding: 1em 2em;
}
.slide:hover,
.slide:focus {
  box-shadow: inset 6.5em 0 0 0 var(--hover);
}

.tag-wrapper2 {
    flex-basis: 20%;

    .openTab {
        border: none;
        border-radius: 5px 0 0 5px;
    }

    ul {
        background-color: gray;
        gap: 2px;
    }
}

.top-height-navbar {
    top: calc($headerHeight + 1rem);
}

.bg-button-light {
    background-color: $bgButtonTypologyLight;
}

.bg-button-dark {
    background-color: $bgButtonTypologyDark;
}

.bg-hover-button-light:hover {
    background-color: $bgHoverButtonTypologyLight;
}

.bg-hover-button-dark:hover {
    background-color: $bgHoverButtonTypologyDark;
}

.bg-active-button-light:checked + label {
    background-color: $bgActiveButtonTypologyLight;
}

.bg-active-button-dark:checked + label {
    background-color: $bgActiveButtonTypologyDark;
}

.text-active-button-light {
    color: $textButtonTypologyLight;
}

.text-active-button-dark {
    color: $textButtonTypologyDark;
}
</style>
