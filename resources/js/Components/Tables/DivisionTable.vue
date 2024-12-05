<script setup>
import TableComponent from "@/Components/TableComponent.vue";

const emit = defineEmits(['getId', 'viewDetail', 'viewUpdate', 'viewDelete', ])
const props = defineProps(['data', 'user'])
const thead = ['Name', 'Action']
</script>

<template>
    <table-component :table-head="thead">
        <tr v-for="(item, index) in props.data" :key="index" v-if="props.data.length > 0">
            <td class="p-[12px] text-[0.913rem]">{{ item.name }}</td>
            <td class="flex gap-2 p-[12px]">
                <button  @click="emit('viewDetail'); emit('getId', item.id)" class="bg-[#FAF8F6] w-[32px] h-[32px] flex justify-center items-center rounded-full hover:bg-opacity-15">
                    <i class="fa-regular fa-eye text-[#048ED6]"></i>
                </button>
                <button @click="emit('viewUpdate'); emit('getId', item.id)" class="bg-[#FAF8F6] w-[32px] h-[32px] flex justify-center items-center rounded-full hover:bg-opacity-15">
                    <i class="fa-regular fa-pen-to-square text-[#F6C46A]"></i>
                </button>
                <button @click="emit('viewDelete'); emit('getId', item.id)" class="bg-[#FAF8F6] w-[32px] h-[32px] flex justify-center items-center rounded-full hover:bg-opacity-15">
                    <i class="fa-regular fa-trash-can text-[#D55051]"></i>
                </button>
            </td>
        </tr>
        <tr v-else>
            <td class="text-center" colspan="6">Data Empty</td>
        </tr>
    </table-component>
</template>

<style scoped>

</style>
