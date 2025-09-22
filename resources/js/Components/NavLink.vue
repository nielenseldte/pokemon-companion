<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    href :{
        type: String,
        required: true
    }
});
</script>

<template>
    <Link :href="href" class="hover:scale-110 hover:text-purple transition-all duration-150 hover:font-bold">
        <slot />
    </Link>
</template>