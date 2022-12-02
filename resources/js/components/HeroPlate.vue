<template>
    <div class="flex between hero mt-3 gap-30 overflow-hidden rounded"
        :class="[tema ? 'bg-hero-plate-light text-dark' : 'bg-hero-plate-dark text-light']">
        <div class="flex f-column pb-3 p-3 grow-1">
            <h1 class="flex between i-center">
                <span class="fs-7 bold">{{                                                                                            user.name                                                                                            }}</span>
                <span class="fs-3">{{                                                                                            user.restaurant.restaurant_phone_number                                                                                            }}</span>
            </h1>
            <h3 class="fs-3 mt-2">{{                                                                                            user.restaurant.restaurant_address                                                                                            }}</h3>
            <div>{{                                                                                            user.email                                                                                            }}</div>
            <a :href="user.restaurant.restaurant_website">{{                                                                                            user.restaurant.restaurant_website                                                                                            }}</a>
            <p class="mt-auto">{{                                                                                            user.restaurant.restaurant_description                                                                                            }}</p>
        </div>
        <img :src="'../storage/' + user.restaurant.restaurant_image" alt="">
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
        tema () {
            return store.coloreTema;
        }
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
        object-position: right;
    }
}

.bg-hero-plate-light {
    background-color: $bgHeroPlateLight;
}

.bg-hero-plate-dark {
    background-color: $bgHeroPlateDark;
}
</style>
