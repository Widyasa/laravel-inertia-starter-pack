import {ref} from "vue";
import {imgPreview} from "/globalVariable";

export const file = ref()
export const previewImage = (e) => {
    file.value = e.target.files[0];
    if (!file.value) return; // Handle no file selected case
    const reader = new FileReader();
    console.log(file.value.name)
    reader.onload = () => {
        if (typeof reader.result === "string") {
            imgPreview.value = reader.result
        }
        e.target.value = ""
    };
    reader.readAsDataURL(file.value);
}
