<template>
    <div>
        <v-braintree :authorization="authorization" @success="onSuccess" @error="onError" locale="it_IT">
            <template #button="slotProps">
                <button class="d-none" ref="paymentBtnRef" @click="slotProps.submit" />
            </template>
        </v-braintree>
        <div>
            <p v-if="error" class="red bold">
                {{ error }}
            </p>
        </div>
    </div>
</template>


<script>
// @ts-nocheck
export default {
    name: 'BraintreeVue',

    props: {
        authorization: {
            required: true,
            type: String
        }
    },

    data () {
        return {
            error: ''
        }
    },

    methods: {
        onSuccess ( payload ) {
            let nonce = payload.nonce;

            this.$emit( 'onSuccess', nonce );

        },

        onError ( error ) {
            let message = error.message;

            if ( message == 'No payment method is available.' ) {
                this.error = 'Seleziona un metodo di Pagamento'
            } else {
                this.error = message
            }
            this.$emit( 'onError', message );
        },
    }
}
</script>


<style lang="scss">

</style>
