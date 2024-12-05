<script setup>
import {useForm} from "@inertiajs/vue3";
import BaseInput from "@/Components/BaseInput.vue";
import {watch} from "vue";
const props = defineProps({
    errors: Object,
    division:Object
})
const emit = defineEmits(['onSuccess', 'onError']);
const form = useForm({
    name: ''
})
watch(() => props.division, async (newValue, oldValue) => {
    if (newValue) {
        form.name = newValue.name
    }
})
const updateData = () => {
    return form.put(route('division.update', props.division.id), {
        onSuccess: () => emit('onSuccess'),
    })
}
</script>

<template>
    <form action="" @submit.prevent="updateData" v-if="props.division">
        <BaseInput
            :error="errors?.name"
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
