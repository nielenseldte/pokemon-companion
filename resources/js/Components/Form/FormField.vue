<script setup>
const props = defineProps({
    label: String,
    for: {
        type: String,
        required: true
    }, 
    error: {
        type: String,
    }
})

</script>
<template>
    <div>
        <label :for="for" class="text-blue dark:text-yellow block mb-2 text-sm sm:text-lg font-medium">
            {{ label }}
        </label>
        <slot />
        <div v-if="error" class="text-sm text-red-500 mt-2">{{ error }}</div>
    </div>
</template>