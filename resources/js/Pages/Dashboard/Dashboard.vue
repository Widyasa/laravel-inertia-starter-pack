<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import {Head} from "@inertiajs/vue3";
const props = defineProps({
    auth: {
        user: Object
    }
})
</script>

<template>
    <Head title="Dashboard" />
    <AppLayout page="Dashboard">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome :user-data="auth.user.name"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
