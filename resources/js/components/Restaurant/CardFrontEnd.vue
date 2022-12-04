<template>
    <div class="grid-12 gap-5 grow-1">
        <router-link class="
            my-card
            relative
            g-col-12
            g-col-6-md
            p-2
            rounded-3
            t-right
            shadow
            decoration-none-H
            overflow-hidden
            hover_text_custom"
            :class="[restaurant.restaurant_image ? 'white bg-brown': 'black']" v-for="(restaurant, i) in restaurants" :key="i" :to="{
                name: 'Plates',
                params: {
                    'slug': restaurant.user.slug
                }
            }">

            <div class="my-card-img" v-if="restaurant.restaurant_image">
                <img :src="'./storage/' + restaurant.restaurant_image" alt="">
            </div>

            <div class="my-card-body flex f-column h-100">
                <h3><em>{{ restaurant.user.name }}</em></h3>
                <address>{{ restaurant.restaurant_address }}</address>
                <div class="mt-auto w-60 ml-auto">
                    <p class="inline-block px-1" v-for="(typology, e) in restaurant.typologies" :key="e">
                        {{ typology.name }}
                    </p>
                </div>
            </div>
        </router-link>
    </div>
</template>


<script>
// @ts-nocheck
import App from '../../views/App.vue';
import store from '../../store/store';

export default {
    name: 'CardFrontEnd',

    props: {
        restaurants: {
            required: true,
            type: Array
        }
    },

    created () {
        store.typolo = [];
        App.methods.fetchRestaurants();
    }
}
</script>


<style scoped lang="scss">
.hover_text_custom:hover{
    color: #fbffa8;
}
.my-card {
    height: 10rem;
    border: 3px solid #8f5221;
    padding: 0;
    &:hover{
        img{
            scale: 1.1;
        }
    }
}

.bg-brown {
    background-color:  #8f5221;
}

.my-card::before {
    content: '';
    display: block;
    background: linear-gradient(to left, #000000, #ffffff00);
    z-index: 1;
}

.my-card-img, .my-card::before {
    position: absolute;
    inset: 0;
}

.my-card-img > img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    transition: all 1s ease-in-out;
}

.my-card-body {
    position: relative;
    z-index: 2;
}
</style>
