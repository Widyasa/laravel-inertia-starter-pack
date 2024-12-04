<script setup>
import {router} from "@inertiajs/vue3";

const props = defineProps([
    'tableHead' ,
    'totalItems',
    'pageInfo',
    'paginationData'
])

const emit = defineEmits(['getData'])
// const onClickHandler = (page:any) => {
//     console.log('tes handler')
//     currentPage.value = page
//     emit('getData')
// };
</script>

<template>
    <table class="w-full  border-opacity-[0.12]">
        <thead>
        <tr>
            <td class="p-[14px] text-[0.913rem] bg-opacity-[0.02]" v-for="head in tableHead" :key="head">{{head}}</td>
        </tr>
        </thead>
        <tbody>
        <slot></slot>
        </tbody>
    </table>
    <div class="mt-4 flex justify-center">
        <button
            v-for="link in props.paginationData"
            :key="link.label"
            :class="['px-3 py-1 mx-1', { 'text-gray-500 cursor-not-allowed': !link.url, 'font-bold text-blue-500': link.active }]"
            :disabled="!link.url"
            @click.prevent="link.url && router.get(link.url)"
            v-html="link.label"
        ></button>
    </div>
</template>

<style scoped>

</style>
