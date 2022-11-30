<template>

    <div>
        <h2>Oi qui si paga</h2>
        <form id="checkout" method="post" action="/checkout">
            <div id="payment-form"></div>
            <input type="submit" value="Pay $10">
        </form>
    </div>

</template>


<script>
export default {
    name: 'Braintree',
  

}
</script>


<style scoped lang="scss">

</style>
