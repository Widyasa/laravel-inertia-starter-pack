<script setup>
import { MultiSelect } from "primevue";
import { computed } from "vue";

const props = defineProps({
    inputTitle: String,
    inputName: String,
    inputPlaceholder: String,
    modelValue: { type: Array, default: () => [] }, // Array of objects
    options: { type: Array, default: () => [] }, // List of options
    optionLabel: String,
    optionValue: String,
    disabled: Boolean,
    error: { type: String, default: null },
});

const emit = defineEmits(["update:modelValue"]);

const selectedValues = computed({
    get: () => {
        // Convert full objects in modelValue to their IDs
        return props.modelValue.map((item) =>
            typeof item === "object" ? item[props.optionValue] : item
        );
    },
    set: (value) => {
        // Map selected IDs back to full objects
        const mappedValues = value.map((id) => {
            const option = props.options.find(
                (opt) => opt[props.optionValue] === id
            );
            return option || { [props.optionValue]: id };
        });
        emit("update:modelValue", mappedValues);
    },
});
</script>

<template>
    <div class="flex flex-col gap-1 w-full">
        <label :for="props.inputName">{{ props.inputTitle }}</label>
        <MultiSelect
            v-model="selectedValues"
            :options="props.options"
            :option-label="props.optionLabel"
            :option-value="props.optionValue"
            filter
            :placeholder="props.inputPlaceholder"
            class="w-full input-text text-sm p-1"
            :disabled="props.disabled"
        />
        <p class="text-red-500 text-[13px]" v-if="props.error">
            {{ props.error }}
        </p>
    </div>
</template>
