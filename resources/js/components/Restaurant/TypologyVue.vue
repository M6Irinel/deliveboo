<template>
    <div class="sticky right top z-index-3 shadow tag-wrapper t-center overflow-hidden">
        <ul class="list-style-none flex f-column">
            <li v-for="(typology, i) in typologies" :key="i">
                <input @input.prevent="emita" class="d-none checkTrue" type="checkbox" :id="'typology-' + i" :value="typology.name" v-model="types">

                <label :for="'typology-' + i" class="d-block pointer p-2 bg-red-1 bg-gray-1-H bold">
                    {{ typology.name }}
                </label>
            </li>
        </ul>
    </div>
</template>


<script>
// @ts-nocheck
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
            types: []
        }
    },

    methods: {
        emita () {
            setTimeout( () => { this.$emit( 'emitTypes', this.types ); }, 0 );
        }
    }
}
</script>


<style scoped lang="scss">
.tag-wrapper {
    flex-basis: 15%;
    border-radius: 4px 0 0 4px;
    background-color: gray;
}

ul {
    gap: 1px;
}

.checkTrue:checked + label {
    background-color: #ac7676;
    color: white;
}
</style>
