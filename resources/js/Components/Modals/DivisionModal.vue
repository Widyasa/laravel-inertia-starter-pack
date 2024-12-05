<script setup>

import {ref, watch} from "vue";
import CreateDivisionForm from "@/Components/Forms/Division/CreateDivisionForm.vue";
import DeleteDivisionForm from "@/Components/Forms/Division/DeleteDivisionForm.vue";
import DetailDivisionForm from "@/Components/Forms/Division/DetailDivisionForm.vue";
import UpdateDivisionForm from "@/Components/Forms/Division/UpdateDivisionForm.vue";
import {Dialog} from "primevue";

const emit = defineEmits(['actionSuccess', 'actionFailed'])
const props = defineProps(['modalAction', 'id', 'inputError'])
const data = ref()
const processLoad = ref(true)
watch(() => props.id, async (newValue, oldValue) => {
    if (newValue) {
        processLoad.value = true
        const res = await axios.get(route('division.show', props.id))
        data.value = res.data
        processLoad.value = false
    }
})
</script>

<template>
    <Dialog modal :header=" props.modalAction + ' Division'" class="w-[600px] capitalize" :draggable=false>
        <div v-if="modalAction === 'create'">
            <create-division-form :errors="inputError" @onSuccess="emit('action-success')" @onError="emit('actionFailed')"/>
        </div>
        <div v-if="modalAction === 'detail'">
            <detail-division-form :division="data" :is-loading="processLoad"/>
        </div>
        <div v-if="modalAction === 'update'">
            <update-division-form :errors="inputError" :division="data" @actionSuccess="emit('action-success')" @onSuccess="emit('action-success')" @onError="emit('actionFailed')"/>
        </div>
        <div v-if="modalAction === 'delete'">
            <delete-division-form @onSuccess="emit('action-success')" :id="id"/>
        </div>
    </Dialog>
</template>

<style scoped>

</style>
