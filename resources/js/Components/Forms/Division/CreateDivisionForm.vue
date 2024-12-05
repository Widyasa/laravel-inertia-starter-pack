<script setup>
import {useForm} from "@inertiajs/vue3";
import BaseInput from "@/Components/BaseInput.vue";
const props = defineProps({
    errors: Object
})
const emit = defineEmits(['onSuccess', 'onError']);
const form = useForm({
    name: ''
})
const createData = () => {
    return form.post(route('division.store'), {
        onSuccess: () => emit('onSuccess'),
    })
}
</script>

<template>
    <form action="" @submit.prevent="createData">
        <BaseInput
            :error="errors.name"
            input-type="text"
            input-title="Name"
            input-name="name"
            input-placeholder="enter division name..."
            v-model="form.name"
        />
        <button class="btn btn-primary mt-8 w-full" type="submit">Submit</button>
    </form>
</template>

<style scoped>

</style>
