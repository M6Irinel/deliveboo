<template>
    <div class="load_back">
        <div class="load_class">
            <font-awesome-icon icon="fa-regular fa-hourglass-half" />
        </div>
    </div>
</template>


<script>
export default {
    name: 'LoadComp',
}
</script>


<style scoped lang="scss">
.load_back {
    display: flex;
    justify-content: center;
    align-items: center;
    color: black;
    background-color: gray;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 99;

    .load_class {
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
