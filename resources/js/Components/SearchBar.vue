<script setup>

import {ref} from "vue";
const props = defineProps([ 'getFunction'])
const emit = defineEmits(['searchData'])
const keyword = ref('')
</script>

<template>
    <div class="search-wrapper relative w-96 z-10">
        <div class="absolute z-10 left-[18px] top-[50%]" style="transform: translateY(-50%)">
            <i class="fa-solid fa-magnifying-glass text-[#8BA3CB] text-[0.85rem] "></i>
        </div>
        <div class="relative w-full">
            <input type="text" v-model="keyword" @keyup="emit('searchData', keyword)" @change="props.getFunction" class="pl-[40px] border-none rounded-lg input-text" placeholder="Search here..."/>
        </div>
    </div>
</template>

<style scoped>

</style>
