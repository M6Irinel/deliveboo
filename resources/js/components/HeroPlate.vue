<template>
    <div :class="[tema ? 'bg-hero-plate-light text-dark' : 'bg-hero-plate-dark text-light']">
        <div class="container">
            <div class="flex between hero gap-10 overflow-hidden">
                <div class="flex f-column pb-3 p-3 grow-1">
                    <h1 class="flex between i-center flex-sm f-column-sm j-flex-start-sm i-flex-start-sm f-row-md flex-md between-md i-center-md">
                        <span class="fs-7 bold">{{ user.name }}</span>
                        <a :href="'tel:' + removeSpace(user.restaurant.restaurant_phone_number)" class="fs-3 bold black"
                            :class="[tema ? 'text-dark' : 'text-light']">
                            Tel : {{ user.restaurant.restaurant_phone_number }}
                        </a>
                    </h1>
                    <h3 class="fs-3 mt-2">{{ user.restaurant.restaurant_address }}</h3>
                    <div class="fs-3">Email : {{ user.email }}</div>
                    <div>
                        <a class="black fs-3" :href="user.restaurant.restaurant_website"
                            :class="[tema ? 'text-dark' : 'text-light']">
                            Website : {{ user.restaurant.restaurant_website }}
                        </a>
                    </div>
                    <div class="grow-1" :class="[mobile ? 'flex gap-10' : '']">
                        <p class="fs-3">{{ user.restaurant.restaurant_description }}</p>
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
    height: 16rem;

    img {
        height: 100%;
        width: 50%;
        object-fit: cover;
    }
}

.img-mobile {
    height: 6rem;
}

.bg-hero-plate-light {
    background-color: $bgHeroPlateLight;
}

.bg-hero-plate-dark {
    background-color: $bgHeroPlateDark;
}
</style>
