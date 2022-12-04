<template>
    <div class="relative mb-5" :class="[tema ? 'text-dark' : 'text-light']">
        <div class="hero__main mb-4">
            <img v-if="tema" src="../../../storage/app/public/hero_main/MainHero.webp" alt="">
            <img v-else src="../../../storage/app/public/hero_main/dark_hero.jpg" alt="">
        </div>
        <div class="t-center content-hero flex f-column i-center p-5 rounded-10 shadow w-80 w-50-md" :class="[
            tema ? 'bg-hero-restaurants-light' : 'bg-hero-restaurants-dark',
        ]">
            <h2 class="fs-5 fs-8-md">Ordina qui il tuo Piatto Preferito!</h2>
            <p class="fs-3">
                <span :class="[tema ? 'green-6' : 'green-3']">
                    <strong>online</strong>
                </span>
                dai tuoi ristoranti preferiti della città
            </p>
            <address class="fs-4 my-2 w-100 p-1 f-column f-row-xl rounded flex gap-10 between i-center-xl border-2"
                :class="[tema ? 'border-gray-9' : 'border-gray-1']">
                <h2 class="fs-4 p-2">Sant' Antioco</h2>
                <div class="py-2 px-4 rounded fs-4"
                    :class="[tema ? 'bg-hero-button-restaurants-light' : 'bg-hero-button-restaurants-dark']">
                    <h1 class="fs-4 inline-block">Deliveboo</h1>
                    <span>te lo consegna!</span>
                </div>
            </address>
            <p>
                <a href="/accedi">Accedi</a>
                <span>per visualizare il tuo ristorante</span>
            </p>
        </div>
    </div>
</template>


<script>
import store from '../store/store';
export default {
    name: 'HeroMain',

    computed: {
        tema () { return store.coloreTema; },

        mobile () { return store.mobile; }
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
