<script setup lang="ts">


defineProps({
    navName : {require: true, type: String},
    navRoute:  {require:true, type:String},
    active:  {require:true, type:Boolean}
})
</script>

<template>
    <Link :href="navRoute" class="menu-link" :class="active">
        <slot></slot>
        {{navName}}
    </Link>
</template>

<style scoped>

</style>
