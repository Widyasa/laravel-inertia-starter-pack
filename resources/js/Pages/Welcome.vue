<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />
    <div class="h-screen w-full flex justify-center items-center">
        <div class="text-center">
            <h1 class="text-5xl font-semibold">Welcome to the File Management App</h1>
            <p class="mt-2 text-lg">Please Login to your user access to access the file</p>
            <div class="flex gap-3 justify-center mt-5">
                <Link :href="route('owner.login')" class="btn btn-primary">Login</Link>
            </div>
        </div>
    </div>
</template>

<style>

</style>
