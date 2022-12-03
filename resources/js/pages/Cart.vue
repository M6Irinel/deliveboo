<template>
    <div>
        <main class="container" :class="[tema ? 'text-dark' : 'text-light']">
            <div class="flex between i-center py-2">

                <ButtonsLeft />

                <h1 class="uppercase letter-spacing-3"><strong>Cesto <span v-if="!total">vuoto</span></strong></h1>

                <div class="flex i-center gap-5">
                    <button class="btn btn-danger px-3 py-1" v-if="total" @click="pulisciStorage()">
                        svuota cesto
                    </button>

                    <div class="btn-warning px-3 py-1 fs-3 rounded bold">
                        <font-awesome-icon icon="fa-solid fa-basket-shopping" />
                        <span v-if="total">
                            Totale Ordine:
                            {{ parseFloat(total).toFixed(2) }}€
                        </span>
                    </div>
                </div>
            </div>

            <div v-if="!loadingCart">
                <ul v-if="(plates && !orderSuccess)" class="list-style-none grid-12 grid-10-lg grid-12-xl gap-5">
                    <li class="card flex f-column g-col-6 g-col-4-sm g-col-3-md g-col-2-lg g-col-2-xl p-2"
                        :class="[tema ? 'bg-card-light' : 'bg-card-dark']" v-for="(plate, i) in plates" :key="i">

                        <div class="image_plate">
                            <img v-if="plate.plate_image" :src="'./storage/' + plate.plate_image" alt="" />
                            <img v-else :src="'./img/default/plate-empty.png'" alt="" />
                        </div>

                        <p class="bold">{{ plate.plate_name }}</p>

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
                            <button v-if="quantity(plate.plate_name)" class="btn px-3 py-1 bold"
                                :class="[tema ? 'bg-light text-dark' : 'bg-dark text-light']"
                                @click="removePlate(plate)">-</button>

                            <div v-if="quantity(plate.plate_name)" class="fs-4 bold">&Cross;{{
                                    quantity(plate.plate_name)
                            }}</div>

                            <button class="btn px-3 py-1 bold"
                                :class="[tema ? 'bg-light text-dark' : 'bg-dark text-light']"
                                @click="addPlate(plate)">+</button>
                        </div>
                    </li>
                </ul>
            </div>
            <Loader v-else />

            <div v-if="total">
                <div v-if="!orderSuccess" class="pt-3">
                    <div>
                        <input type="email" class="form-control mt-2 px-3" :class="{ 'is-invalid': errorEmail }"
                            v-model="datiUtente.email" placeholder="inserisci la tua mail *">
                        <div v-if="errorEmail" class="invalid-feedback">Errore: la email non è valida</div>
                    </div>
                    <div>
                        <input type="number" max="14" min="10" class="form-control mt-2 px-3"
                            :class="{ 'is-invalid': errorNumeroTelefono }" v-model="datiUtente.numeroTelefono"
                            placeholder="inserisci il tuo num di Telefono *">
                        <div v-if="errorNumeroTelefono" class="invalid-feedback">Errore: il numero di telefono non è
                            valido</div>
                    </div>
                    <div>
                        <input type="text" class="form-control mt-2 px-3" :class="{ 'is-invalid': errorIndirizzo }"
                            v-model="datiUtente.indirizzo" placeholder="inserisci il tuo indirizzo *">
                        <div v-if="errorIndirizzo" class="invalid-feedback">Errore: il campo dell'indirizzo è richiesto
                        </div>
                    </div>
                    <div>
                        <input type="text" class="form-control mt-2 px-3" :class="{ 'is-invalid': errorNome }"
                            v-model="datiUtente.nome" placeholder="inserisci il tuo Nome e Cognome *">
                        <div v-if="errorNome" class="invalid-feedback">Errore: il campo della Nome e Cognome è richiesto
                        </div>
                    </div>
                </div>

                <BraintreVue v-if="tokenApi" :authorization="tokenApi" @onSuccess="paymentOnSuccess"
                    @onError="paymentOnError" ref="PaymentRef" />

                <button v-if="tokenApi" :disabled="orderSuccess" @click.prevent="beforeBuy"
                    class="block w-100 btn btn-success py-2 my-2 uppercase">
                    <span v-if="orderSuccess">conferma pagamento in corso...</span>
                    <span v-else>compra</span>
                </button>
            </div>
        </main>
    </div>
</template>


<script>
// @ts-nocheck
import store from "../store/store";
import Loader from "../components/Loader.vue";
import BraintreVue from "../components/BraintreVue.vue";
import ButtonsLeft from "../components/ButtonsLeft.vue";
import App from "../views/App.vue";

export default {
    name: "CartVue",

    components: { Loader, BraintreVue, ButtonsLeft },

    data () {
        return {
            forLogin,
            total: localStorage.getItem( 'spesaTotale' ),
            tokenApi: null,
            datiUtente: {
                email: null,
                numeroTelefono: null,
                indirizzo: null,
                nome: null,
            },
            form: {
                token: null,
                amount: null
            },
            errorEmail: false,
            errorNumeroTelefono: false,
            errorIndirizzo: false,
            errorNome: false,
            orderSuccess: false,
            loadingCart: null,
        };
    },

    computed: {
        plates () {
            if ( store.plates )
                return store.plates.filter( ( e ) => localStorage[ e.plate_name ] );
            else return null;
        },

        prezzoTotale () {
            return store.prezzoTotaleDaPagare
        },

        tema () {
            return store.coloreTema;
        },
    },

    methods: {
        validationForm () {
            const letters = 'qwertyuiopè+asdfghjklòàù<zxcvbnm,.-[]{};:é*/|€$%&=\'"ì^@°#§'.split( '' );
            this.orderSuccess = false;
            this.errorEmail = false;
            this.errorNumeroTelefono = false;
            this.errorIndirizzo = false;
            this.errorNome = false;

            if ( this.datiUtente.email != null || undefined || '' ) {
                if ( this.datiUtente.email.length < 8 || !this.datiUtente.email.includes( '@', 2 ) || !this.datiUtente.email.includes( '.', this.datiUtente.email.indexOf( '@' ) + 2 ) || this.datiUtente.email.length < this.datiUtente.email.indexOf( '.' ) + 3 )
                    this.errorEmail = true;
            } else this.errorEmail = true;

            if ( this.datiUtente.numeroTelefono != null || undefined || '' ) {
                const r = this.datiUtente.numeroTelefono.toLowerCase();
                letters.forEach( e => {
                    if ( r.includes( e ) ) { this.errorNumeroTelefono = true; return; }
                } );
                if ( this.datiUtente.numeroTelefono.length < 10 || this.datiUtente.numeroTelefono.length > 14 )
                    this.errorNumeroTelefono = true;
            } else this.errorNumeroTelefono = true;

            if ( this.datiUtente.indirizzo != null || undefined || '' ) {
                if ( this.datiUtente.indirizzo.length < 5 )
                    this.errorIndirizzo = true;
            } else this.errorIndirizzo = true;

            if ( this.datiUtente.nome != null || undefined || '' ) {
                if ( this.datiUtente.nome.length < 4 )
                    this.errorNome = true;
            } else this.errorNome = true;

            if ( !this.errorEmail && !this.errorNumeroTelefono && !this.errorIndirizzo && !this.errorNome )
                return true;
            return false;
        },

        goEmail () {
            let lStorage = JSON.stringify( localStorage );
            let parseLStorage = JSON.parse( lStorage );
            axios.post( '/orders/store', [ parseLStorage, this.datiUtente, this.form.amount ] );
        },

        beforeBuy () {
            if ( this.validationForm() )
                this.$refs.PaymentRef.$refs.paymentBtnRef.click();
            else this.orderSuccess = false;
        },

        paymentOnSuccess ( nonce ) {
            this.orderSuccess = true;
            this.form.amount = this.prezzoTotale;
            this.form.token = nonce;
            axios.post( '/api/make/payment', { ...this.form } ).then( r => {
                this.goEmail();
                this.$router.push( { path: '/thankyou' } );
                this.orderSuccess = false;
                this.pulisciStorage();
            } );
        },

        paymentOnError ( error ) { },

        fetchPlates () {
            if ( !localStorage.resId ) return;

            this.loadingCart = true;
            axios.get( `/api/restaurants/${ localStorage.getItem( "resId" ) }` )
                .then( ( r ) => {
                    store.plates = r.data.plates;
                    this.loadingCart = false;
                    this.totalprice();
                } );
        },

        pulisciStorage () {
            App.methods.clearStorage();
            store.plates = null;
            this.total = 0;
            store.totalCart = null;
        },

        addPlate ( plate ) {
            if ( typeof ( Storage ) ) {
                if ( localStorage.resId ) {
                    if ( localStorage.getItem( "resId" ) == plate.restaurant_id ) {
                        this.plateLocalStore( plate );
                        return;
                    } else {
                        alert( 'non puoi ordinare da più ristoranti' );
                        return;
                    }
                }
                localStorage.setItem( "resId", plate.restaurant_id );
                this.plateLocalStore( plate );
            }
            else alert( 'hai il pc vecchio, vai a piedi' );
        },

        plateLocalStore ( plate ) {
            let plateCounter = plate.plate_name + '-counter';

            if ( localStorage.getItem( plate.plate_name ) == plate.id ) {
                let c = localStorage.getItem( plateCounter );
                localStorage.setItem( plateCounter, ++c );
            } else {
                localStorage.setItem( plate.plate_name, plate.id );
                localStorage.setItem( plateCounter, 1 );
            }
            this.totalprice();
        },

        removePlate ( plate ) {
            let plateCounter = plate.plate_name + '-counter';

            if ( typeof ( Storage ) ) {
                if ( localStorage.getItem( plate.plate_name ) == plate.id ) {
                    let c = localStorage.getItem( plateCounter );
                    localStorage.setItem( plateCounter, --c );
                    this.totalprice();
                    if ( c === 0 ) {
                        localStorage.removeItem( plateCounter );
                        localStorage.removeItem( plate.plate_name );
                        store.plates.splice( store.plates.indexOf( plate ), 1 );
                    }
                }
            }
            else alert( 'hai il pc vecchio, vai a piedi' );

            if ( localStorage.length <= 2 ) this.pulisciStorage();
        },

        totalprice () {
            let s = 0;

            if ( this.plates ) {

                this.plates.forEach( e => {
                    let q = localStorage.getItem( e.plate_name + '-counter' );
                    s += e.plate_price * q;
                    localStorage.setItem( "spesaTotale", s.toFixed( 2 ) );
                    store.prezzoTotaleDaPagare = s.toFixed( 2 );
                } )
            }
            this.total = localStorage.getItem( 'spesaTotale' );
            store.totalCart = this.total;
        },

        quantity ( v ) {
            return localStorage.getItem( v + '-counter' );
        },

        fetchToken () {
            this.disabledBuyButton = true;
            axios.get( '/api/generate' ).then( r => {
                this.tokenApi = r.data.token;
                this.disabledBuyButton = false;
            } )
        }
    },

    created () {
        this.fetchToken();
        this.fetchPlates();
    },
};
</script>


<style scoped lang="scss">
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
