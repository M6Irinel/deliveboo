<template>
  <footer :class="[tema ? 'bg-footer-light' : 'bg-footer-dark']">
    <div class="footer_container">
      <div class="container footer_container_top">
        <div class="about_us sub_footer_top">
          <ul>
            About Us
            <li>
              <a href="https://www.linkedin.com/in/adamo-carangi/">Adamo</a>
            </li>
            <li>
              <a href="https://www.linkedin.com/in/irinel-momoloaca/">Irinel</a>
            </li>
            <li>
              <a href="https://www.linkedin.com/in/jacopo-marini/">Jacopo</a>
            </li>
            <li><a href="https://www.linkedin.com/in/lucaponzoni/">Luca</a></li>
          </ul>
        </div>
        <div class="lavora_con_noi sub_footer_top">
          <ul>
            Lavora con noi
            <li><a href="">Diventa un Driver</a></li>
            <li><a href="">Hai un'Attività?</a></li>
            <li><a href="">Entra nel Team</a></li>
          </ul>
        </div>
        <div class="note_legali sub_footer_top">
          <ul>
            Note Legali
            <li><a href="">Termini e Condizioni</a></li>
            <li><a href="">Privacy Policy</a></li>
            <li><a href="">Cookie Policy</a></li>
            <li><a href="">Preferenze Cookies</a></li>
          </ul>
        </div>
        <div class="download sub_footer_top">
          <a href="http://"
            ><img :src="`/storage/site_img/appbuttondef.png`" alt=""
          /></a>
          <a href="http://"
            ><img
              :src="`/storage/site_img/get-it-on-google-play-store-button.png`"
              alt=""
          /></a>
        </div>
        
      </div>
      <div class="container footer_container_bot">
            <div class="icons_container">
                <a href=""> <font-awesome-icon icon="fa-brands fa-facebook" /></a>
                <a href=""> <font-awesome-icon icon="fa-brands fa-instagram" /></a>
                <a href=""> <font-awesome-icon icon="fa-brands fa-linkedin" /></a>
                <a href=""> <font-awesome-icon icon="fa-brands fa-twitter" /></a>
                <a href=""> <font-awesome-icon icon="fa-brands fa-telegram" /></a>
            </div>

        </div>
    </div>
  </footer>
</template>


<script>
import store from "../store/store";
export default {
  name: "FooterVue",

  computed: {
    tema() {
      return store.coloreTema;
    },
  },
};
</script>


<style scoped lang="scss">
@import "../../sass/variabili.scss";
.footer_container{
    margin: 0 auto;
}
.footer_container{
    display: flex;
    flex-direction: column;
}

.footer_container_top {
  display: flex;
  justify-content: space-between;
  height: 350px;
  padding-top: 75px;
}
.sub_footer {
  background-color: rgb(161, 118, 118);
}
ul {
  list-style: none;

  li {
    margin-top: 23px;
    a {
      color: inherit;
      text-decoration: none;
    }
  }
}
.download {
  display: flex;
  flex-direction: row;
  img {
    max-height: 40px;
  }
}
.footer_container_bot{
    padding-bottom: 50px;
}
.icons_container{
    display: flex;
    justify-content: center;
    *{
        height: 50px;
        margin-inline: 20px;
        color: inherit;
    }
}

.bg-footer-light {
  background-color: $bgFooterLight;
  color: $textButtonLight;
}

.bg-footer-dark {
  background-color: $bgFooterDark;
  color: $textButtonDark;
}

// Responsive !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
@media screen and (max-width:767px){
    .footer_container_top {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 100%;
  ul{
    margin-top: 50px;
  }
}

}
</style>
