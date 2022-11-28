<template>
    <div>
        <div>
            <main v-if="!loading" class="container">


                <h1>Cart Modal</h1>
                <div>
                    <router-link class="btn btn-success px-1" :to="{ name: 'Cart' }">
                        <font-awesome-icon icon="fa-solid fa-basket-shopping" />
                        <span v-if="total">{{ parseFloat(total).toFixed(2) }}€</span>
                    </router-link>
                </div>

                <div v-if="plates">
                    <ul class="list-style-none grid-12 grid-10-lg grid-12-xl gap-5">
                        <li class="card flex f-column g-col-6 g-col-4-sm g-col-3-md g-col-2-lg g-col-2-xl p-2"
                            v-for="(plate, i) in plates" :key="i">



                            <div class="mt-auto">
                                <p>{{ plate.plate_name }}</p>
                                <div class="absolute badge badge-primary p-1 badge-n"
                                    v-if="quantity(plate.plate_name) > 1">
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

                                <div class="badge badge-primary badge-n py-1 px-2">{{ quantity(plate.plate_name) }}
                                </div>

                                <button class="btn btn-success px-3" @click="addPlate(plate)">+</button>
                            </div>
                        </li>
                    </ul>
                    <div class="flex between">
                        <h2>Totale di tutto: {{ totalF().toFixed(2) }} €</h2>
                        <button class="btn btn-danger" @click="pulisciStorage()">Svuota il Carello</button>
                    </div>

                </div>
                <div v-else>
                    <p>carrello vuoto</p>
                </div>

            </main>
            <div v-else>
                <LoaderC />
            </div>
        </div>


    </div>


</template>

<script>
// @ts-nocheck
import store from "../store/store";
import LoaderC from "../components/Loader.vue";


export default {
    name: "CartVue",

    components: { LoaderC },

    data() {
        return {
            forLogin,
            total: sessionStorage.getItem('spesaTotale')
        };
    },

    computed: {
        plates() {
            if (store.plates)
                return store.plates.filter((e) => sessionStorage[e.plate_name]);
            else return null;
        },
        loading() {
            return store.loading;
        },
    },

    methods: {
        fetchPlates() {
            if (!sessionStorage.resId) return;

            store.loading = true;
            axios.get(`/api/restaurants/${sessionStorage.getItem("resId")}`)
                .then((r) => {
                    store.plates = r.data.plates;
                    store.loading = false;
                });
        },

        pulisciStorage() {
            sessionStorage.clear();
            store.plates = null;
            this.total = 0;
            store.totalCart = null
        },

        totalF() {
            if (!sessionStorage.resId) return;

            let s = 0;
            this.plates.forEach(e => {
                let q = sessionStorage.getItem(e.plate_name + '-counter');
                s += e.plate_price * q;
                sessionStorage.setItem("spesaTotale", s);
            })
            return s;
        },

        addPlate(plate) {
            if (typeof (Storage)) {
                if (sessionStorage.resId) {
                    if (sessionStorage.getItem("resId") == plate.restaurant_id) {
                        this.plateLocalStore(plate);
                        return;
                    } else {
                        alert('non puoi ordinare da più ristoranti');
                        return;
                    }
                }
                sessionStorage.setItem("resId", plate.restaurant_id);
                this.plateLocalStore(plate);
            }
            else alert('hai il pc vecchio, vai a piedi');
        },

        plateLocalStore(plate) {
            let plateCounter = plate.plate_name + '-counter';

            if (sessionStorage.getItem(plate.plate_name) == plate.id) {
                let c = sessionStorage.getItem(plateCounter);
                sessionStorage.setItem(plateCounter, ++c);
            } else {
                sessionStorage.setItem(plate.plate_name, plate.id);
                sessionStorage.setItem(plateCounter, 1);
            }
            this.totalprice();

        },

        removePlate(plate) {
            let plateCounter = plate.plate_name + '-counter';

            if (typeof (Storage)) {
                if (sessionStorage.getItem(plate.plate_name) == plate.id) {
                    let c = sessionStorage.getItem(plateCounter);
                    sessionStorage.setItem(plateCounter, --c);
                    this.totalprice();
                    if (c === 0) {
                        sessionStorage.removeItem(plateCounter);
                        sessionStorage.removeItem(plate.plate_name);
                        store.plates.splice(store.plates.indexOf(plate), 1);
                    }
                }
            }
            else alert('hai il pc vecchio, vai a piedi');

            if (sessionStorage.length <= 2) this.pulisciStorage();
        },

        totalprice() {
            let s = 0;
            this.plates.forEach(e => {
                let q = sessionStorage.getItem(e.plate_name + '-counter');
                s += e.plate_price * q;
                sessionStorage.setItem("spesaTotale", s.toFixed(2));
            })
            this.total = sessionStorage.getItem('spesaTotale');
            store.totalCart = this.total
        },

        quantity(v) {
            return sessionStorage.getItem(v + '-counter');
        },
    },

    created() {
        this.fetchPlates();
    },
};
</script>

  
<style scoped lang="scss">

</style>