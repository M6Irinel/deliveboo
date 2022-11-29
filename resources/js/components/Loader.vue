<template>
    <div class="grow-1 bg-gray-1 grid">
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
.grow-1 {
    flex-grow: 1;
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
