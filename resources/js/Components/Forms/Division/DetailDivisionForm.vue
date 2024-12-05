<script setup>
import {useForm} from "@inertiajs/vue3";
import BaseInput from "@/Components/BaseInput.vue";
import {reactive, ref} from "vue";
const emit = defineEmits(['onSuccess', 'onError']);
const props = defineProps({
    division:Object
})

</script>

<template>
    <BaseInput
        v-if="props.division"
            input-type="text"
            input-title="Name"
            input-name="name"
            input-placeholder="enter division name..."
            v-model="props.division.name"
            read-only
        />
</template>

<style scoped>

</style>
