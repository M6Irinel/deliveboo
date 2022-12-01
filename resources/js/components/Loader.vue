<template>
    <div class="grow-1 grid place-items">
        <div class="load_class">
            <font-awesome-icon icon="fa-regular fa-hourglass-half" />
        </div>
    </div>
</template>


<script>
export default {
    name: 'Load',
}
</script>


<style scoped lang="scss">
.place-items {
    place-items: center;
}

.load_class {
    font-size: 4rem;
    animation: spin 4s linear infinite;

    @keyframes spin {
        100% {
            transform: rotate(1turn);
        }
    }
}
</style>
