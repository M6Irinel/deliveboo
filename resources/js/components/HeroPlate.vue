<template>
    <div :class="[tema ? 'bg-hero-plate-light' : 'bg-hero-plate-dark']">
        <div class="container">
            <div class="flex between hero gap-10 overflow-hidden">
                <div class="flex f-column pb-3 p-3 grow-1">
                    <h1 class="flex between i-center">
                        <span class="fs-7 bold">{{ user.name }}</span>
                        <a :href="'tel:' + removeSpace(user.restaurant.restaurant_phone_number)"
                            class="fs-3 bold black">
                            Tel : {{ user.restaurant.restaurant_phone_number }}
                        </a>
                    </h1>
                    <h3 class="fs-3 mt-2">{{ user.restaurant.restaurant_address }}</h3>
                    <div class="fs-3">Email : {{ user.email }}</div>
                    <div>
                        <a class="black fs-3" :href="user.restaurant.restaurant_website">
                            Website : {{ user.restaurant.restaurant_website }}
                        </a>
                    </div>
                    <div class="grow-1" :class="[mobile ? 'flex gap-10' : '']">
                        <p class="auto-y fs-3">{{ user.restaurant.restaurant_description }}</p>
                        <div v-if="(user.restaurant.restaurant_image && mobile)" class="img-mobile f-col-6">
                            <img class="h-100 w-100 obj-cover" :src="'../storage/' + user.restaurant.restaurant_image"
                                alt="">
                        </div>
                    </div>
                </div>
                <img v-if="(user.restaurant.restaurant_image && !mobile)"
                    :src="'../storage/' + user.restaurant.restaurant_image" alt="">
            </div>
        </div>
    </div>
</template>


<script>
import store from '../store/store';

export default {
    name: 'HeroPlate',

    props: {
        user: {
            required: true,
            type: Object
        }
    },

    computed: {
        tema () { return store.coloreTema; },

        mobile () { return store.mobile; }
    },

    methods: {
        removeSpace ( v ) { return v.replace( ' ', '' ); }
    }
}
</script>


<style scoped lang="scss">
@import '../../sass/variabili.scss';

.hero {
    height: 15rem;

    img {
        height: 100%;
        width: 50%;
        object-fit: cover;
    }
}

.img-mobile {
    height: 5rem;
}

.bg-hero-plate-light {
    background-color: $bgHeroPlateLight;
}

.bg-hero-plate-dark {
    background-color: $bgHeroPlateDark;
}
</style>
