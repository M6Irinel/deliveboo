<template>
    <div>
        <main v-if="!loadingCart" class="container">
            <div class="flex between i-center py-2">

                <ButtonsLeft />

                <div class="flex i-center gap-5">
                    <button class="btn btn-danger px-1" v-if="total" @click="pulisciStorage()">Svuota il
                        Carello</button>
                    <div class="badge badge-warning p-1 fs-3">
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
                    v-for="(plate, i) in plates" :key="i">

                    <div v-if="plate.plate_image">
                        <img class="img-fluid" :src="'./storage/' + plate.plate_image" alt="" />
                    </div>
                    <div v-else>
                        <img class="img-fluid" :src="'./img/default/plate-empty.png'" alt="" />
                    </div>

                    <div class="mt-auto">
                        <p>{{ plate.plate_name }}</p>
                        <div class="absolute badge badge-primary p-1 badge-n" v-if="quantity(plate.plate_name) > 1">
                            &Cross;
                            {{ quantity(plate.plate_name) }}
                        </div>
                    </div>

                    <p>Prezzo: {{ plate.plate_price }}€</p>

                    <div v-if="quantity(plate.plate_name) > 1">
                        <p>Quantità: {{ quantity(plate.plate_name) }}</p>
                        <p>
                            Totale del Piatto:
                            {{ parseFloat(plate.plate_price * quantity(plate.plate_name)).toFixed(2) }}
                            €
                        </p>
                    </div>

                    <div :class="[
                        'flex mt-auto',
                        quantity(plate.plate_name) ? 'between' : 'j-flex-end'
                    ]">
                        <button v-if="quantity(plate.plate_name)" class="btn btn-danger px-3"
                            @click="removePlate(plate)">-</button>

                        <div class="badge badge-primary badge-n py-1 px-2">{{ quantity(plate.plate_name) }}</div>

                        <button class="btn btn-success px-3" @click="addPlate(plate)">+</button>
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
        <LoaderC v-else />
    </div>
</template>


<script>
// @ts-nocheck
import store from "../store/store";
import LoaderC from "../components/Loader.vue";
import BraintreVue from "../components/BraintreVue.vue";
import ButtonsLeft from "../components/ButtonsLeft.vue";

export default {
    name: "CartVue",

    components: { LoaderC, BraintreVue, ButtonsLeft },

    data() {
        return {
            forLogin,
            tornaMail: 'we we we',
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
        }
    },

    methods: {


        prova() {
            let s = JSON.stringify(localStorage)
            let p = JSON.parse(s)
            // let n= p.filter(l=>{
            //     let q = localStorage.getItem(l.plate_name + '-counter');
            //     return
            // })
            // console.log(this.datiUtente)
            // console.log(this.prezzoTotale)
            axios.post('/orders/store', [p, this.datiUtente, this.prezzoTotale]).then(r => {
                console.log(r)
                // this.$router.push({ path: '/thankyou' });



            });

        },
        paymentOnSuccess(nonce) {
            this.loadingBuyButton = true;
            this.form.token = nonce;
            this.buy();

        },

        paymentOnError(error) {

        },

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

        totalF() {
            if (!localStorage.resId) return;

            let s = 0;
            this.plates.forEach(e => {
                let q = localStorage.getItem(e.plate_name + '-counter');
                s += e.plate_price * q;
                localStorage.setItem("spesaTotale", s);
            })
            return s;
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
    
    mounted(){
      
       
    }
};
</script>


<style lang="scss">

</style>
