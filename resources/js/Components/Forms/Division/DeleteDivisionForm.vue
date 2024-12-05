<script setup>
import {router} from "@inertiajs/vue3";
import DeleteText from "@/Components/DeleteText.vue";
const props = defineProps(['id'])
const emit = defineEmits(["onSuccess", 'onError']);
const deleteData = () => {
    router.delete(route('division.destroy', props.id), {
        preserveScroll: true,
        onSuccess: () => emit('onSuccess'),
        onError: () => emit('onError'),

});
};
</script>

<template>
    <delete-text module="division" />
    <div class="flex justify-end gap-2 w-full mt-3">
        <button class="btn btn-primary"  @click="deleteData">Delete Division</button>
    </div>
</template>

<style scoped>

</style>
