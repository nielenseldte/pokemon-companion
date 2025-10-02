<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

defineProps({
    time: {
        type: String
    }
});

const page = usePage();
const username = computed(() => {
    return page.props.auth.user?.username;
});

</script>

<template>
        <h1>Hello from the home page, {{ username }}</h1>
        
</template>