<script setup>
const props = defineProps({
    label: String,
    for: {
        type: String,
        required: true
    }, 
})

</script>
<template>
    <div>
        <label :for="for" class="dark:text-yellow block mb-2 text-sm sm:text-lg font-medium">
            {{ label }}
        </label>
        <slot />
    </div>
</template>