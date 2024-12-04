<script setup>

import {onMounted, ref} from "vue";
import {router} from "@inertiajs/vue3";
const props = defineProps(['page'])
const emit = defineEmits(['click-sidebar'])
const isActiveTopbar = ref(false)
const toggleActiveTopbar = () => {
    isActiveTopbar.value = !isActiveTopbar.value
}
</script>

<template>

    <div class="bg-white px-[16px] md:px-[42px] h-[86px] flex gap-5 items-center border-b border-dark border-opacity-[0.12]">
        <div class="flex justify-between w-full items-center">
            <h2 class="capitalize font-urbanistSemibold text-2xl ">{{props.page}} Page</h2>
            <div class="lg:hidden flex items-center justify-center rounded-full relative z-50 cursor-pointer w-[42px] h-[42px] border border-dark border-opacity-[0.12] ms-auto md:me-4 group" @click="emit('click-sidebar')" >
                <i class="fa-solid fa-bars text-dark text-md group-hover:text-primary dark:text-white"></i>
            </div>
<!--            <button type="button" class="hidden md:flex items-center gap-2 relative ps-4 border-s border-dark border-opacity-[0.12] group" @click="toggleActiveTopbar()">-->
<!--                <img src="~/public/img/profiles/profile-not-found.svg" alt="Profile Image" :class="{ 'outline-dark/10': isActiveTopbar }" class="w-[42px] aspect-square rounded-full object-cover outline outline-offset-0 outline-transparent group-hover:outline-dark/10 relative"/>-->
<!--                <i class="fa-solid fa-angle-down text-[0.913rem] text-opacity-[0.62] relative"></i>-->
<!--                <div :class="isActiveTopbar ? 'flex' : 'hidden'" class="flex flex-col py-1.5 bg-white rounded border border-dark border-opacity-[0.12] absolute z-20 top-[120%] right-0 w-[200px]">-->
<!--                    <NuxtLink :to="{path: '/dashboard/profile/' + authStore.loginOutput.role}" class="flex items-center gap-2 py-1.5 px-4 border-b border-dark border-opacity-[0.12] text-[0.9rem] text-opacity-[0.62] text-start opacity-[0.62] hover:opacity-100 hover:text-primary group/profile">-->
<!--                        <i class="fa-solid fa-circle-user text-sm group-hover/profile:text-primary"></i>-->
<!--                        Profile-->
<!--                        <i class="fa-solid fa-arrow-right-long ms-auto text-[0.85rem] group-hover/profile:text-primary group-hover/profile:translate-x-1"></i>-->
<!--                    </NuxtLink>-->
<!--                    <button type="button" class="flex items-center gap-2 py-1.5 px-4 text-[0.9rem] text-opacity-[0.62] text-start opacity-[0.62] hover:opacity-100 hover:text-primary group/logout" @click="logout()">-->
<!--                        <i class="fa-solid fa-right-from-bracket text-sm group-hover/logout:text-primary"></i>-->
<!--                        Logout-->
<!--                        <i class="fa-solid fa-arrow-right-long ms-auto text-[0.85rem] group-hover/logout:text-primary group-hover/logout:translate-x-1"></i>-->
<!--                    </button>-->
<!--                </div>-->
<!--            </button>-->
        </div>
    </div>
    <!--  <logout v-model:visible = "visible" @close-modal="visible = false"/>-->
</template>

<style scoped>

</style>
