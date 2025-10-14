<script setup>
const props = defineProps({
    type: {
        type: String,
        default: 'submit'
    }
})
</script>
<template>
    <button
        class="disabled:bg-gray-300 w-full cursor-pointer bg-blue dark:bg-yellow dark:text-black hover:scale-105 transition-all duration-150 font-medium rounded-lg text-sm px-5 py-2.5 text-center text-white"
        :type="type" v-bind="$attrs">
        <slot />
    </button>
</template>