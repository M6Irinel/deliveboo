<template>
    <div>
        <main v-if="!loadingCart" class="container" :class="[tema ? 'text-dark':'text-light']">
            <div class="flex between i-center py-2">

                <ButtonsLeft />

                <div class="flex i-center gap-5">
                    <button class="btn btn-danger px-3 py-1" v-if="total" @click="pulisciStorage()">
                        Svuota il Carello
                    </button>

                    <div class="btn-warning px-3 py-1 fs-3 rounded bold">
                        <font-awesome-icon icon="fa-solid fa-basket-shopping" />
                        <span v-if="total">
                            Totale del ordine:
                            {{ parseFloat(total).toFixed(2) }}€
                        </span>
                    </div>
                </div>
            </div>

            <h1>Carrello <span v-if="!total">vuoto</span></h1>

            <ul v-if="plates" class="list-style-none grid-12 grid-10-lg grid-12-xl gap-5">
                <li class="card flex f-column g-col-6 g-col-4-sm g-col-3-md g-col-2-lg g-col-2-xl p-2"
                    :class="[tema ? 'bg-card-light' : 'bg-card-dark']"
                    v-for="(plate, i) in plates" :key="i">

                    <div class="image_plate">
                        <img v-if="plate.plate_image" :src="'./storage/' + plate.plate_image" alt="" />
                        <img v-else :src="'./img/default/plate-empty.png'" alt="" />
                    </div>

                    <p>{{ plate.plate_name }}</p>

                    <p>Prezzo: {{ plate.plate_price }}€</p>

                    <div v-if="quantity(plate.plate_name) > 1">
                        <p>Quantità: {{ quantity(plate.plate_name) }}</p>
                        <p>
                            Totale Piatto:
                            {{ parseFloat(plate.plate_price * quantity(plate.plate_name)).toFixed(2) }}
                            €
                        </p>
                    </div>

                    <div :class="[
                        'flex mt-auto',
                        quantity(plate.plate_name) ? 'between' : 'j-flex-end'
                    ]">
                        <button v-if="quantity(plate.plate_name)" class="btn border px-3" :class="[tema ? 'text-dark' : 'text-light']"
                            @click="removePlate(plate)">-</button>

                        <div class="bold py-1 px-2 fs-3">&Cross;{{ quantity(plate.plate_name) }}</div>

                        <button class="btn border px-3" :class="[tema ? 'text-dark' : 'text-light']" @click="addPlate(plate)">+</button>
                    </div>
                </li>
            </ul>

            <button @click="prova()"> Proviamo la mail</button>

            <input type="email" v-model="datiUtente.email" placeholder="inserisci la tua mail">
            <input type="text" v-model="datiUtente.numeroTelefono" placeholder="inserisci il tuo num di Telefono">
            <input type="text" v-model="datiUtente.indirizzo" placeholder="inserisci il tuo indirizzo">
            <input type="text" v-model="datiUtente.nome" placeholder="inserisci il tuo Nome e Cognome ">

            <BraintreVue v-if="tokenApi" :authorization="tokenApi" @onSuccess="paymentOnSuccess"
                @onError="paymentOnError" ref="PaymentRef" />

            <button v-if="tokenApi" :disabled="disabledBuyButton" @click.prevent="beforeBuy"
                class="block w-100 btn btn-success py-2 my-2 uppercase">
                <span v-if="loadingBuyButton">conferma pagamento in corso...</span>
                <span v-else>compra</span>
            </button>
        </main>
        <Loader v-else />
    </div>
</template>


<script>
// @ts-nocheck
import store from "../store/store";
import Loader from "../components/Loader.vue";
import BraintreVue from "../components/BraintreVue.vue";
import ButtonsLeft from "../components/ButtonsLeft.vue";

export default {
    name: "CartVue",

    components: { Loader, BraintreVue, ButtonsLeft },

    data() {
        return {
            forLogin,
            total: localStorage.getItem('spesaTotale'),
            tokenApi: '',
            datiUtente: {
                email: '',
                numeroTelefono: '',
                indirizzo: '',
                nome: '',
            },
            form: {
                token: '',
                amount: ''
            },
            disabledBuyButton: true,
            loadingBuyButton: false,
        };
    },

    computed: {
        plates() {
            if (store.plates)
                return store.plates.filter((e) => localStorage[e.plate_name]);
            else return null;
        },

        loadingCart() {
            return store.loadingCart;
        },

        prezzoTotale() {
            return store.prezzoTotaleDaPagare
        },

        tema () {
            return store.coloreTema;
        }
    },

    methods: {
        prova() {
            let s = JSON.stringify(localStorage);
            let p = JSON.parse(s);
            axios.post('/orders/store', [p, this.datiUtente, this.prezzoTotale]);
        },

        paymentOnSuccess(nonce) {
            this.loadingBuyButton = true;
            this.form.token = nonce;
            this.buy();
        },

        paymentOnError(error) {},

        beforeBuy() {
            this.form.amount = localStorage.getItem('spesaTotale');
            this.$refs.PaymentRef.$refs.paymentBtnRef.click();
        },

        buy() {
            this.disabledBuyButton = true;
            axios.post('/api/make/payment', { ...this.form }).then(r => {
                this.prova()
                this.$router.push({ path: '/thankyou' });
                this.loadingBuyButton = false;
                this.pulisciStorage();
            });
        },

        fetchPlates() {
            if (!localStorage.resId) return;

            store.loadingCart = true;
            axios.get(`/api/restaurants/${localStorage.getItem("resId")}`)
                .then((r) => {
                    store.plates = r.data.plates;
                    store.loadingCart = false;
                    this.totalprice();
                });
        },

        pulisciStorage() {
            localStorage.clear();
            store.plates = null;
            this.total = 0;
            store.totalCart = null;
        },

        addPlate(plate) {
            if (typeof (Storage)) {
                if (localStorage.resId) {
                    if (localStorage.getItem("resId") == plate.restaurant_id) {
                        this.plateLocalStore(plate);
                        return;
                    } else {
                        alert('non puoi ordinare da più ristoranti');
                        return;
                    }
                }
                localStorage.setItem("resId", plate.restaurant_id);
                this.plateLocalStore(plate);
            }
            else alert('hai il pc vecchio, vai a piedi');
        },

        plateLocalStore(plate) {
            let plateCounter = plate.plate_name + '-counter';

            if (localStorage.getItem(plate.plate_name) == plate.id) {
                let c = localStorage.getItem(plateCounter);
                localStorage.setItem(plateCounter, ++c);
            } else {
                localStorage.setItem(plate.plate_name, plate.id);
                localStorage.setItem(plateCounter, 1);
            }
            this.totalprice();
        },

        removePlate(plate) {
            let plateCounter = plate.plate_name + '-counter';

            if (typeof (Storage)) {
                if (localStorage.getItem(plate.plate_name) == plate.id) {
                    let c = localStorage.getItem(plateCounter);
                    localStorage.setItem(plateCounter, --c);
                    this.totalprice();
                    if (c === 0) {
                        localStorage.removeItem(plateCounter);
                        localStorage.removeItem(plate.plate_name);
                        store.plates.splice(store.plates.indexOf(plate), 1);
                    }
                }
            }
            else alert('hai il pc vecchio, vai a piedi');

            if (localStorage.length <= 2) this.pulisciStorage();
        },

        totalprice() {
            let s = 0;

            if (this.plates) {

                this.plates.forEach(e => {
                    let q = localStorage.getItem(e.plate_name + '-counter');
                    s += e.plate_price * q;
                    localStorage.setItem("spesaTotale", s.toFixed(2));
                    store.prezzoTotaleDaPagare = s.toFixed(2);
                })
            }
            this.total = localStorage.getItem('spesaTotale');
            store.totalCart = this.total;
        },

        quantity(v) {
            return localStorage.getItem(v + '-counter');
        },

        fetchToken() {
            this.disabledBuyButton = true;
            axios.get('/api/generate').then(r => {
                this.tokenApi = r.data.token;
                this.disabledBuyButton = false;
            })
        }
    },

    created() {
        this.fetchToken();
        this.fetchPlates();
    },
};
</script>


<style lang="scss">
@import '../../sass/variabili.scss';

.bg-card-light {
    background-color: $bgCardLight;
}

.bg-card-dark {
    background-color: $bgCardDark;
}

.image_plate {
    height: 8rem;
    overflow: hidden;

    img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
}
</style>
