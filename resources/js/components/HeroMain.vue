<template>
    <div class="relative">
        <div class="hero__main mb-4">
            <img v-if="tema" src="../../../storage/app/public/hero_main/MainHero.webp" alt="">
            <img v-else src="../../../storage/app/public/hero_main/dark_hero.jpg" alt="">
        </div>
        <div class="content-hero flex f-column i-center p-5 w-50 rounded-10 shadow"
            :class="[tema ? 'bg-hero-restaurants-light' : 'bg-hero-restaurants-dark']">
            <h1 :class="[tema ? 'text-dark' : 'text-light']">
                Ordina qui il tuo Pasto Preferito!!!
            </h1>
            <p class="fs-4">Ordina online dai tuoi ristoranti preferiti</p>
            <address class="fs-4 my-2 w-100 p-1 flex gap-10 between i-center border border-dark rounded-full">
                <h2 class="fs-4 p-2">Nome della città</h2>
                <div class="py-2 px-4 rounded-full"
                    :class="[tema ? 'bg-hero-button-restaurants-light' : 'bg-hero-button-restaurants-dark']">... consegna a TE</div>
            </address>
            <p><a href="/accedi">Accedi</a> per visualizare il tuo ristorante</p>
        </div>
    </div>
</template>


<script>
import store from '../store/store';
export default {
    name: 'HeroMain',

    computed: {
        tema () { return store.coloreTema; }
    }
}
</script>


<style scoped lang="scss">
@import '../../sass/variabili.scss';

.hero__main {
    height: 28rem;

    img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

}

.content-hero {
    position: absolute;
    bottom: -1.5rem;
    left: 50%;
    transform: translateX(-50%);

    h1 {
        text-align: center;
    }
}

.bg-hero-restaurants-light {
    background-color: $bgHeroRestaurantsLight;
}

.bg-hero-restaurants-dark {
    background-color: $bgHeroRestaurantsDark;
}

.bg-hero-button-restaurants-light {
    background-color: $bgHeroButtonRestaurantsLight;
}

.bg-hero-button-restaurants-dark {
    background-color: $bgHeroButtonRestaurantsDark;
}
</style>
