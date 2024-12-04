<script setup lang="ts">

</script>

<template>
    <span class="loader"></span>
</template>

<style scoped>
.loader {
    width: 12px;
    height: 12px;
    border: 3px solid #fff;
    border-bottom-color: transparent;
    border-radius: 50%;
    display: inline-block;
    box-sizing: border-box;
    animation: rotation 1s linear infinite;
}

@keyframes rotation {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>
