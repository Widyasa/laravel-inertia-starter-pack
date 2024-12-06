<script setup>

import BaseInput from "@/Components/BaseInput.vue";
import {ref} from "vue";
import {useForm} from "@inertiajs/vue3";
import {useToast} from "primevue";
import {Toast} from "primevue";
import {Head} from "@inertiajs/vue3";
const props = defineProps()
const inputType = ref('password')
const changeInputType = (value) => {
    inputType.value = value;
}
const form = useForm({
    email: '',
    password: '',
});
const toast = useToast()
const errorToast = () => {
    return toast.add({ severity: 'error', summary: 'Failed to Login', detail: 'Check your email and password', life: 3000 });
}
const login = () => {
    form.post(route('division_lead.login'), {
        onFinish: () => [form.reset('password'), form.reset('email')],
        onError: errorToast,
    })
}
</script>

<template>
    <Head title="Login"/>
    <Toast />
    <div class="w-full h-screen flex justify-center items-center bg-gray-100">
        <div class="card-auth">
            <h2 class="text-center text-2xl font-semibold">Login</h2>
            <form action="" @submit.prevent="login">
                <BaseInput
                    v-model="form.email"
                    input-placeholder="enter your email"
                    input-name="email"
                    input-title="Email"
                    input-type="email"
                />
                <div class="mt-4">
                    <div class="relative">
                        <div class="relative">
                            <BaseInput v-model="form.password" input-name="password" input-placeholder="enter your password" input-title="Password" :input-type="inputType" required :error="form.errors.password"/>
                        </div>
                        <div class="absolute z-10 top-[55%] right-4">
                            <button type="button" @click="changeInputType('password')" v-if="inputType ==='text'">
                                <i class="fa-regular fa-eye text-primary"></i>
                            </button>
                            <button type="button" @click="changeInputType('text')" v-else>
                                <i class="fa-regular fa-eye-slash text-primary "></i>
                            </button>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-8 w-full">Submit</button>
            </form>
        </div>
    </div>
</template>

<style scoped>

</style>
