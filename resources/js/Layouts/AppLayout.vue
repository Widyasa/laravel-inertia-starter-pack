<script setup>
import { Toast } from 'primevue';
import SidebarComponent from "@/Components/SidebarComponent.vue";
import Topbar from "@/Components/Topbar.vue";

const props = defineProps({
    page:String,
    auth: {
        user:Object
    }
})
</script>

<template>
    <p>{{auth}}</p>
    <div class="flex bg-[#F4F5FA] min-h-screen h-fit">
        <div class="max-w-[260px] w-full">
            <sidebar-component/>
        </div>
        <div class="w-full pb-[42px]">
            <topbar :page="page" />
            <div class="mt-[16px] md:mt-[42px] w-full">
                <Toast />
                <slot></slot>
            </div>
        </div>
    </div>
</template>
