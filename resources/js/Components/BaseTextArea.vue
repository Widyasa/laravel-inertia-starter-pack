<script setup>
const props = defineProps({
    'inputTitle' : String,
    'inputName' : String,
    'inputStep' : String,
    'inputPlaceholder' : String,
    'inputType' : String,
    'modelValue' : [String, Number],
    'customClass': [String],
    'readOnly' : Boolean,
    'required' : Boolean,
    'error': {type: String, default: null}
})

function preventScrollChange(event) {
    event.preventDefault();
}


</script>

<template>
    <div class="flex flex-col gap-1 w-full">
        <label :for="props.inputName">{{props.inputTitle}}</label>
        <textarea :step="inputStep" @wheel="preventScrollChange" :required="props.required" :readonly="props.readOnly" :class="props.customClass" :name="props.inputName" :type="props.inputType" class="input-text" :placeholder="props.inputPlaceholder" :value="props.modelValue" @input="$emit('update:modelValue', $event.target?.value)" style="height: 140px;"></textarea>
        <p class="text-red-500 text-[13px]" v-if="props.error">
            {{ props.error }}
        </p>
    </div>
</template>

<style scoped>

</style>
