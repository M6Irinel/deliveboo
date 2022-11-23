<template>
    <div class="load__back">
        <div class="load__class">
            <!-- <font-awesome-icon icon="fa-regular fa-hourglass-half" /> -->
            Arriviamo
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped lang="scss">
.load__back {
    color: black;
    background-color: gray;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 99;

    display: flex;
    justify-content: center;
    align-items: center;

    .load__class {


        border-radius: 50%;
        font-size: 5rem;


        animation: spin 3s linear infinite;

        @keyframes spin {
            100% {
                transform: rotate(1turn);
            }
        }

    }


}
</style>