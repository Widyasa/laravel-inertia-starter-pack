<script setup>
import {Select} from "primevue";
const props = defineProps({
    'inputTitle' : String,
    'inputName' : String,
    'inputPlaceholder' : String,
    'inputType' : String,
    'modelValue' :  { type : [String, Number], default: undefined},
    'customClass': [String],
    'options' : {default:[]},
    'optionLabel': String,
    'optionValue': [String, Number],
    'disabled' : Boolean,
    'error': {type: String, default: null}
})
let selectValue
if (props.modelValue !== undefined) {
    selectValue = props.modelValue
}
</script>

<template>
    <div class="flex flex-col gap-1 w-full" v-if="props.modelValue != undefined">
        <label :for="props.inputName">{{props.inputTitle}}</label>
        <Select
            :model-value="props.modelValue"
            :options="props.options"
            :option-label="props.optionLabel"
            :option-value="props.optionValue"
            filter
            :placeholder="props.inputPlaceholder"
            class="w-full input-text text-sm p-1"
            @change="$emit('update:modelValue', $event.value);"
            @input="$emit('update:modelValue', $event.value);"
        />
        <p class="text-red-500 text-[13px]" v-if="props.error">
            {{ props.error }}
        </p>
    </div>
</template>

<style scoped>

</style>
