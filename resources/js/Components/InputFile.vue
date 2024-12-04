<script setup>
import {imgPreview} from "@/utils/globalVariable";
import {previewImage} from "@/utils/imgPreview";
import {ref} from "vue";

const props = defineProps({
    inputTitle: String,
    inputName: String,
    modelValue: { type: [String, Number] },
    readOnly: Boolean,
    error: { type: String, default: null },
    src: { type: String, default: null },
});

const emit = defineEmits(['fileInput'])
const image = ref()
</script>

<template>
    <div class="mt-5">
        <p class="p-2">{{ props.inputTitle }}</p>
        <div class="img-upload-wrapper">
            <div class="absolute">
                <img
                    :src="props.src || imgPreview"
                    id="file-preview"
                    class="img-prev"
                    alt="Preview Image"
                />
            </div>
                <input
                    type="file"
                    class="w-full relative h-full opacity-0"
                    id="file-input"
                    :readonly="props.readOnly"
                    :name="props.inputName"
                    @input="emit('fileInput', $event)"
                />
        </div>
        <p class="text-red-500 text-[13px]" v-if="props.error">
            {{ props.error }}
        </p>
    </div>
</template>

<style scoped>
.img-upload-wrapper, .img-prev{
    width: 200px;
    height: 200px;
    aspect-ratio: 1/1;
    object-fit: cover;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 4px;
}
</style>
