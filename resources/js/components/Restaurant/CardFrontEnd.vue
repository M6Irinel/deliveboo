<template>
    <div class="grid-12 gap-5">
        <router-link class="
            my-card
            relative
            g-col-12
            g-col-6-md
            p-2
            rounded-3
            t-right
            orange-H
            shadow
            decoration-none-H
            overflow-hidden"
            :class="[restaurant.restaurant_image ? 'white bg-brown': 'black']" v-for="(restaurant, i) in restaurants" :key="i" :to="{
                name: 'Plates',
                params: {
                    'slug': restaurant.user.slug
                }
            }">
            <div class="my-card-img" v-if="restaurant.restaurant_image">
                <img class="w-100" :src="'./storage/' + restaurant.restaurant_image" alt="">
            </div>

            <div class="my-card-body flex f-column h-100">
                <h3>{{ restaurant.user.name }}</h3>
                <address>{{ restaurant.restaurant_address }}</address>
                <div class="mt-auto">
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
export default {
    name: 'CardFrontEnd',

    props: {
        restaurants: {
            required: true,
            type: Array
        }
    }
}
</script>


<style scoped lang="scss">
.my-card {
    height: 200px;
    border: 3px solid #8f5221;
    padding: 0;
}

.bg-brown {
    background-color:  #8f5221;
}

.my-card:hover::before {
    content: '';
    display: block;
    background: linear-gradient(to left, #000000a1, #ffffff00);
    z-index: 1;
}

.my-card-img, .my-card::before {
    position: absolute;
    inset: 0;
}

.my-card-img {
    transform: translateY(-50%);
}

.my-card-body {
    position: relative;
    z-index: 2;
}
</style>
