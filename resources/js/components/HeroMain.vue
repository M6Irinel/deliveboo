<template>
    <div class="hero__main">
       <img src="../../../storage/app/public/hero_main/MainHero.webp" alt="">
       <!-- <img src="../../../storage/app/public/hero_main/dark_hero.jpg" alt=""> -->
       <div><h1 :class="[tema ? 'text-dark' : 'text-light']">Ordina qui il tuo Pasto Preferito!!!</h1></div>
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



.hero__main{
    padding-bottom: 1rem;
    width: 100vw;
    height: 750px;
    img{
        width: 100%;
        height: 100%;
        object-fit: cover;
     
    }
    h1{
        text-align: center;
        font-size: 3rem;
        margin-top: -15px;
    }
}
</style>
