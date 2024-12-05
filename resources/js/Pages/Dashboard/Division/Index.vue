<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import SearchBar from "@/Components/SearchBar.vue";
import DivisionTable from "@/Components/Tables/DivisionTable.vue";
import {router} from "@inertiajs/vue3";
import {ref} from "vue";
import DivisionModal from "@/Components/Modals/DivisionModal.vue";
import {Head} from "@inertiajs/vue3";
import {Toast, useToast} from "primevue";
const props = defineProps({
    division: Object,
    errors:Object,
    status: {
        success: String,
        error: String
    },
    auth : {
        user: Object
    }
})
const id = ref('')
const keyword = ref('')
const modalAction = ref('')
const visibleModal = ref(false)
const toast = useToast()
const handleKeyword = (data) => {
  keyword.value = data
}
const searchData = () => {
    router.get(route('division.index'), { search: keyword.value }, { preserveState: true });
}
const getId = (theId) => {
    id.value = theId
}
const viewModal =  (modalType) => {
    modalAction.value = modalType
    visibleModal.value = true
}
const modalActionSuccess = () => {
    visibleModal.value = false
    return toast.add({ severity: 'success', summary: 'Action Success', detail: props.status.success, life: 3000 });
}
const modalActionFailed = () => {
    return toast.add({ severity: 'error', summary: 'Action Failed', detail: props.status.error, life: 3000 });
}

</script>

<template>
    <Toast />
    <Head title="Division" />
  <AppLayout page="Division">
      <div class="dashboard-content">
          <div class="content-card">
              <div class="flex justify-between gap-3 items-center mb-8">
                  <SearchBar @searchData="handleKeyword" :get-function="searchData"/>
                  <button @click="viewModal('create')" class="btn btn-primary flex items-center justify-center gap-2">
                      <i class="fa-solid fa-plus text-white"></i>
                      <span class=" text-white">Add New</span>
                  </button>
              </div>
              <DivisionTable
                  :data="division.data"
                  @view-delete="viewModal('delete')"
                  @view-detail="viewModal('detail')"
                  @view-update="viewModal('update')"
                  @get-id="getId"
              />
              <!-- Pagination Links -->
              <div class="mt-4 flex justify-center">
                  <button
                      v-for="link in division?.links"
                      :key="link.label"
                      :class="['px-3 py-1 mx-1', { 'text-gray-500 cursor-not-allowed': !link.url, 'font-bold text-blue-500': link.active }]"
                      :disabled="!link.url"
                      @click.prevent="link.url && router.get(link.url)"
                      v-html="link.label"
                  ></button>
              </div>
          </div>
      </div>
  </AppLayout>
    <DivisionModal :input-error="errors" v-model:visible="visibleModal" :modalAction="modalAction" @actionSuccess="modalActionSuccess" :id="id" @actionFailed="modalActionFailed"/>
</template>

<style scoped>

</style>
