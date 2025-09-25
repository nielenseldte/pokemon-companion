<script setup>
const props = defineProps({
    name: {
        type: String,
        required: true
    },
    type: {
        type: String,
        required: true
    }

})
</script>
<template>
    <input
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" :name="name"
        :id="name" :type="type" v-bind = "$attrs">
</template>